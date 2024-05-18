<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart;
use Hash;
use Session;
use DataTables;
class CartController extends Controller
{
    public function addcart($id){
        $data = Product::getproductsId($id);
        return view('addcart')->with('data',$data);
    }
    public function addtocart(Request $request){
        $userid=Auth::user()->id;
        $request->validate([
            'id' => 'required',
            'price' => 'required|numeric|min:0',
            'qty' => 'required|integer|min:0',
        ]);
        $total = $request->price * $request->qty;
        $cart = new Cart;
        $cart->userid = $userid;
        $cart->productid = $request->id;
        $cart->amount = $total; 
        $cart->qty = $request->qty;
        $cart->status = "notpaid"; 
        $cart->save();
        $data = Product::getproducts();
        $d = Product::findOrFail($request->id);
        $d->qty = $d->qty-$request->qty;
        $d->save();
        return view('store')->with('data',$data);
    }
    public function cart(Request $request){
        $id=Auth::user()->id;
        $data = Cart::getcart($id);
        return view('cart')->with('data',$data);
    }
    public function buy($id){
        $uid=Auth::user()->id;
        $data =User::getdetails($uid);
        $d = Cart::findOrFail($id); // Use findOrFail instead of get to retrieve a single model instance
        $d->status = "paid";
        $d->save();
        $data = Cart::getcart($id);
        return redirect('cart')->with('data',$data);
    }

}
