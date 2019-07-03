<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use App\User;
use Illuminate\Http\Request;
use Session;
use DB;
use Illuminate\Support\Facades\Input;

class PostsController extends Controller
{

    public function index()
    {

        $posts = Post::with('category')->paginate(8);
        return view('admin.posts.index')->with('posts',$posts);
    }

    public function info($id)
    {
        $post=Post::find($id);

        return view('admin.posts.info')->with('post',$post)
            ->with('categories',Category::all())
            ->with('tags',Tag::all());

    }

    public function displayposts()
    {
        $posts = Post::with('category')->paginate(4);
        return view('admin.posts.displayposts')->with('posts',$posts) ;
    }

    public function create()
    {
        $categories =Category::all();
        $tags =Tag::all();

        if($categories->count()== 0 ){
            Session::flash('info','You must have some categories before attempting to create a post.');
        }
        if( $tags->count()== 0){
            Session::flash('info','You must have some tags before attempting to create a post.');
        }

        if( $tags->count()== 0 && $categories->count()== 0) {

            Session::flash('info','You must have some categories and tags before attempting to create a post');

        }

            return view('admin.posts.create')->with('categories',$categories)
                                               ->with('tags', Tag::all());
    }

    public function searchPost(Request $request){
        $search=$request->get('search');
        $posts=Post::with('Category')->where('title', 'like', '%'.$search.'%')
            ->orWhere('barcode', 'like', '%'.$search.'%')
            ->orWhere('quantity', 'like', '%'.$search.'%')
            ->orWhere('purchasePrice', 'like', '%'.$search.'%')
        ->orWhere('price', 'like', '%'.$search.'%')->paginate(8);

        return view('admin.posts.index')->with('posts',$posts);
    }

    public function searchTrashedPost(Request $request){
        $search=$request->get('search');

           $posts = Post::onlyTrashed()->where('title', 'like', '%' . $search . '%')->paginate(8);


        return view('admin.posts.trashed')->with('posts',$posts);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required|max:25',
            'featured'=>'required|image',
            'category_id'=>'required',
            'price'=>'required',
            'purchasePrice'=>'required',
            'tags'=>'required',
            'quantity'=>'required',
            'barcode'=>'required|unique:posts',

        ]);

        $featured = $request->featured;
        $featured_new_name = time().$featured->getClientOriginalName();
        $featured->move('uploads/posts', $featured_new_name);
        $post= Post::create([
            'title'=>$request->title,
            'content'=>$request->content,
            'author'=>'',
            'price'=>$request->price,
            'purchasePrice'=>$request->purchasePrice,
            'featured'=>'uploads/posts/' . $featured_new_name,
            'category_id'=>$request->category_id,
            'quantity'=>$request->quantity,
            'barcode'=>$request->barcode,
        ]);
        $post->tags()->attach($request->tags);
        Session::flash('success','Post created succesfully.');

        return redirect()->route('posts');
    }


    public function edit($id)
    {
        $post=Post::find($id);

        return view('admin.posts.edit')->with('post',$post)
                                             ->with('categories',Category::all())
                                             ->with('tags',Tag::all());
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title'=>'required',
            'barcode'=>'required',
            'quantity'=>'required',
            'price'=>'required',
            'purchasePrice'=>'required',
            'category_id'=>'required'
        ]);

        $post=Post::find($id);

        if($request->hasFile('featured')){
            $featured =$request->featured;
            $featured_new_name = time() . $featured->getClientOriginalName();
            $featured->move('uploads/posts', $featured_new_name);
            $post->featured = 'uploads/posts/'.$featured_new_name;
        }

        $post->title=$request->title;
        $post->barcode=$request->barcode;
        $post->quantity=$request->quantity;
        $post->price=$request->price;
        $post->purchasePrice=$request->purchasePrice;
        $post->content=$request->content;
        $post->category_id=$request->category_id;

        $post->save();
        $post->tags()->sync($request->tags);

        Session::flash('success','Post updated successfully.');
        return redirect()->route('posts');
    }

    public function destroy($id)
    {
        $post=Post::find($id);
        $post->isTrashed=1;
        $post->save();
        $post->delete();

        Session::flash('success','The post was just trashed.');
        return redirect()->route('posts');
    }

    public function trashed()
    {

        $posts =Post::with('category')->onlyTrashed()->paginate(10);

        return view('admin.posts.trashed')->with('posts',$posts);
    }

    public function kill($id)
    {
        Post::where('id', $id)->forceDelete();
        Session::flash('success','Post deleted permanently.');

        return redirect()->route('posts.trashed');
    }

    public function restore($id)
    {
        $post =Post::withTrashed()->where('id',$id)->first();
        $post->isTrashed=0;
        $post->save();
        $post->restore();

        Session::flash('success','Post restored successfully.');
        return redirect()->route('posts.trashed');
    }
}
