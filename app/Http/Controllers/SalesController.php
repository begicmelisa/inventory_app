<?php

namespace App\Http\Controllers;

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
            'quantity'=>'required',
            'post_id'=>'required',
            'price'=>'required',
            'barcode'=>'required',

        ]);

        $id=$request->post_id;
        $post=Post::find($id);

        if($post->quantity>=$request->quantity) {

            $sale= Sale::create([
                'quantity'=>$request->quantity,
                'post_id'=>$request->post_id,
                'user_id'=>$request->user_id,
                'price'=>$request->price,
                'barcode'=>$request->barcode,
            ]);

            $post->quantity = $post->quantity - $sale->quantity;
            $post->save();


            Session::flash('success','successfully.');

        }
        else {
            Session::flash('error', 'You can not delete!');
        }
        return redirect()->route('sales');
    }

    public function searchBarcode(Request $request){
        $search=$request->get('search');
        $sales=Post::with('Category')->where('barcode', 'like', '%'.$search.'%')->paginate(8);

        return view('admin.sales.create')->with('sales',$sales);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
