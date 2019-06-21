<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Session;
use DB;

class PostsController extends Controller
{

    public function index()
    {
        return view('admin.posts.index')->with('posts',Post::all());
    }


    public function create()
    {
        $categories =Category::all();
        $tags =Tag::all();

        if($categories->count()== 0 ){

            Session::flash('info','You must have some categories before attempting to create a post.');
            return view('admin.categories.create');
        }

        if( $tags->count()== 0)
        {
            Session::flash('info','You must have some tages before attempting to create a post.');
            return view('admin.tags.create');
        }
        return view('admin.posts.create')->with('categories',$categories)
                                               ->with('tags', Tag::all());
    }


    public function searchPost(Request $request){
        $search=$request->get('search');
        $posts=DB::table('posts')->where('title', 'like', '%'.$search.'%')
        ->orWhere('content', 'like', '%'.$search.'%')->paginate(5);

        return view('admin.posts.index',['posts'=>$posts]);
    }


    public function searchPostTrashed(Request $request){
        $search=$request->get('search');
       // $posts=Post::find('name'==1)->all();
        $posts=DB::table('posts')->where('title', 'like', '%'.$search.'%')
            ->orWhere('content', 'like', '%'.$search.'%')->paginate(5);

        return view('admin.posts.index',['posts'=>$posts]);
    }


    public function store(Request $request)
    {

        $this->validate($request,[
            'title'=>'required|max:50',
            'content'=>'required',
            'featured'=>'required|image',
            'category_id'=>'required',
            'tags'=>'required'
        ]);

        $featured = $request->featured;
        $featured_new_name = time().$featured->getClientOriginalName();
        $featured->move('uploads/posts', $featured_new_name);
        $post= Post::create([
            'title'=>$request->title,
            'content'=>$request->content,
            'featured'=>'uploads/posts/' . $featured_new_name,
            'category_id'=>$request->category_id,
            'slug'=>str_slug($request->title)
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
            'content'=>'required',
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
        $post->delete();

        Session::flash('success','The post was just trashed.');
        return redirect()->route('posts');
    }


    public function trashed()
    {
        $posts =Post::onlyTrashed()->get();
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
        $post->restore();

        Session::flash('success','Post restored successfully.');
        return redirect()->route('posts.trashed');
    }
}
