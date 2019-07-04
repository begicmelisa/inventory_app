<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Tag;
use Session;
use DB;

class TagsController extends Controller
{
    public function index()
    {
        $tags=DB::table('tags')->paginate(10);
        return view('admin.tags.index')->with('tags', $tags);
    }


    public function searchTag(Request $request){
        $search=$request->get('search');
        $tags=DB::table('tags')->where('tag', 'like', '%'.$search.'%')->paginate(10);

        return view('admin.tags.index',['tags'=>$tags]);
    }


    public function create()
    {
        return view('admin.tags.create');
    }


    public function store(Request $request)
    {
        $this->validate($request,[
            'tag'=>'required|unique:tags|max:30'
        ]);

        Tag::create([
           'tag'=>$request->tag
        ]);

        return back();
    }


    public function edit($id)
    {
        $tag =Tag::find($id);
        return view('admin.tags.edit')->with('tag',$tag);
    }


    public function update(Request $request)
    {
        $tag = Tag::findOrFail($request->id);

        $tag->update($request->all());

        Session::flash('success','Tag updated successfully.');


        return back();
    }


    public function destroy($id)
    {
        Tag::destroy($id);

        Session::flash('success','Tag deleted successfully.');
        return redirect()->back();
    }
}
