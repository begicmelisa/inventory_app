<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Support\Facades\Session;

use App\Post;
use App\Purchase;
use App\Sale;
use Illuminate\Http\Request;

class SalesController extends Controller
{

    public function index()
    {
        $sales = Sale::with('post')->paginate(8);
        return view('admin.sales.index')->with('sales',$sales);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sales = Sale::with('post')->paginate(1);

        return view('admin.sales.create')->with('sales',$sales);

    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'quantity_new'=>'required',
            'post_id'=>'required',
            'price'=>'required',
            'barcode'=>'required',
            'postUser'=>'required',
            'postTitle'=>'required',

        ]);

        $id=$request->post_id;
        $post=Post::find($id);

        if($post->quantity>=$request->quantity_new) {

            $sale= Sale::create([
                'quantity_new'=>$request->quantity_new,
                'post_id'=>$request->post_id,
                'user_id'=>$request->user_id,
                'price'=>$request->price,
                'barcode'=>$request->barcode,
                'postUser'=>$request->postUser,
                'postTitle'=>$request->postTitle,
            ]);

            $post->quantity = $post->quantity - $sale->quantity_new;
            $post->save();


            Session::flash('success','successfully.');

        }
        else {
            Session::flash('error', 'NNNNNNNNN!');
        }
        return redirect()->route('sales');
    }

    public function destroy($id)
    {
       $sale=Sale::find($id);
        $postId=$sale->post_id;

        $post=Post::find($postId);

        if($post==null)
        {
            Session::flash('warning','Updated successfully.');
            return back();
        }

            $post->quantity = $post->quantity + $sale->quantity_new;
            $post->save();

            Sale::destroy($id);

            Session::flash('success', 'successfully.');

            return redirect()->route('sales');

    }

    public function searchBarcode(Request $request){
        $search=$request->get('search');
        $sales=Post::with('Category')->where('barcode', 'like', '%'.$search.'%')->paginate(8);

        return view('admin.sales.create')->with('sales',$sales);
    }

    public function search(Request $request){
        $search=$request->get('search');
        $sales=Sale::with('post')->where('barcode', 'like', '%'.$search.'%')
            ->orWhere('quantity_new', 'like', '%'.$search.'%')
            ->orWhere('postTitle', 'like', '%'.$search.'%')
            ->orWhere('postUser', 'like', '%'.$search.'%')
            ->orWhere('price', 'like', '%'.$search.'%')->paginate(8);

        return view('admin.sales.index')->with('sales',$sales);
    }


    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sale=Sale::find($id);

        return view('admin.sales.edit')->with('sale',$sale);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'barcode'=>'required',
            'quantity_new'=>'required',
        ]);

        $sale=Sale::with('post')->find($id);



        $sale->quantity_new=$request->quantity_new;
        $sale->barcode=$request->barcode;

        $sale->price=$request->price;
        $sale->post_id=$request->post_id;
        $sale->postUser=$request->postUser;
        $sale->postTitle=$request->postTitle;

        $sale->save();

        Session::flash('success','Updated successfully.');
        return redirect()->route('sales')->with('post',Post::all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


}
