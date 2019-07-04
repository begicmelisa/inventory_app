<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Category;
use Session;
use DB;
use Illuminate\Database\Eloquent\Model;


class CategoriesController extends Controller
{

    public function index()
    {
        $categories=DB::table('categories')->paginate(10);
        return view('admin.categories.index')->with('categories',$categories);
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function searchCat(Request $request){
        $search=$request->get('search');
        $categories=DB::table('categories')->where('title', 'like', '%'.$search.'%')->paginate(8);

        return view('admin.categories.index',['categories'=>$categories]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title'      =>  'required|unique:categories|max:30'
        ]);

        if ($validator->fails()) {
            Session::flash('error', $validator->messages()->first());

        }
        else {

            $category = new Category;
            $category->title = $request->title;
            $category->save();


        }
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

    public function update(Request $request)
    {

        $category = Category::findOrFail($request->id);

        $category->update($request->all());

        Session::flash('success','You successfully updated the category.');

        // dd($request->all());

        return back();

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
