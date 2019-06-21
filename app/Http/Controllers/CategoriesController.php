<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Session;
use DB;
class CategoriesController extends Controller
{

    public function index()
    {
        return view('admin.categories.index')->with('categories',Category::all());
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function searchCat(Request $request){
        $search=$request->get('search');
        $categories=DB::table('categories')->where('name', 'like', '%'.$search.'%')->paginate(5);

        return view('admin.categories.index',['categories'=>$categories]);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required'
            ]);

        $category = new Category;
        $category->name=$request->name;
        $category->save();

        Session::flash('success','You succesfully created a category.');

        return redirect()->route('categories');

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $category=Category::find($id);

        return view('admin.categories.edit')->with('category',$category);
    }

    public function update(Request $request, $id)
    {
        $category=Category::find($id);

        $category->name=$request->name;
        $category->save();

        Session::flash('success','You successfully updated the category.');


        return redirect()->route('categories');
    }

    public function destroy($id)
    {
        $category=Category::find($id);


        foreach ($category->posts as $post) {
            $post->forceDelete();
        }
        $category->delete();

        Session::flash('success','You successfully deleted the category.');


        return redirect()->route('categories');
    }
}
