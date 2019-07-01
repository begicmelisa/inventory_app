<?php

namespace App\Http\Controllers;

use App\Post;
use App\Purchase;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class PurchasesController extends Controller
{

    public function index()
    {
        $purchases = Purchase::with('post')->paginate(8);
        return view('admin.purchases.index')->with('purchases',$purchases);
    }

    public function create()
    {
        $purchases = Purchase::with('post')->paginate(1);

        return view('admin.purchases.create')->with('purchases',$purchases);

    }

    public function searchBarcode(Request $request){
        $search=$request->get('search');
        $purchases=Post::with('Category')->where('barcode', 'like', '%'.$search.'%')->paginate(8);

        return view('admin.purchases.create')->with('purchases',$purchases);
    }

    public function search(Request $request){
        $search=$request->get('search');
        $purchases=Purchase::with('post')->where('barcode', 'like', '%'.$search.'%')
            ->orWhere('quantity_new', 'like', '%'.$search.'%')
            ->orWhere('price', 'like', '%'.$search.'%')->paginate(8);

        return view('admin.purchases.index')->with('purchases',$purchases);
    }



    public function store(Request $request)
    {
        $this->validate($request,[
            'quantity_new'=>'required',
            'post_id'=>'required',

            'price'=>'required',
            'barcode'=>'required',

        ]);

        $purchase= Purchase::create([
            'quantity_new'=>$request->quantity_new,
            'post_id'=>$request->post_id,
            'user_id'=>$request->user_id,
            'price'=>$request->price,
            'barcode'=>$request->barcode,
        ]);

        $id=$purchase->post_id;

        $post=Post::find($id);
        $post->quantity=$post->quantity+$purchase->quantity_new;
        $post->save();



        return redirect()->route('purchases');

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $purchase=Purchase::find($id);

        return view('admin.purchases.edit')->with('purchase',$purchase)
            ->with('post',Post::all());

    }

    public function update_quantity(Request $request,$id)
    {
        $post=Post::find($id);
        $post->quantity=$post->quantity+$post->quantity_new;
        $post->save();

dd($post->quantity);
    }


    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'barcode'=>'required',
            'quantity_new'=>'required',
        ]);

        $purchase=Purchase::with('post')->find($id);



        $purchase->quantity_new=$request->quantity_new;
        $purchase->barcode=$request->barcode;

        $purchase->price=$request->price;
        $purchase->post_id=$request->post_id;

        $purchase->save();

        Session::flash('success','Purchase updated successfully.');
        return redirect()->route('purchases');
    }

    public function destroy($id)
    {
        $purchase=Purchase::find($id);

        $idPost=$purchase->post_id;

        $post=Post::all()->find($idPost);
        if($purchase->quantity_new<=$post->quantity){
            $post->quantity=$post->quantity-$purchase->quantity_new;
            $post->save();

            $purchase->delete();
            Session::flash('success','You successfully deleted the category.');

        }
        else {
            Session::flash('error', 'You can not delete!');
        }


        return redirect()->route('purchases');
    }
}
