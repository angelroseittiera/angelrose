<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use Hash;
use Session;
use DataTables;


class ProductController extends Controller
{
    public function addproduct(){
        return view('addproduct');
    }
    public function createproduct(Request $request){
        $request->validate([
            
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'pname' => 'required',
            'desc' => 'required',
            'price' => 'required|numeric|min:0',
            'qty' => 'required|integer|min:0',
        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('products', 'public'); // Store the image in the 'public/products' directory
        }    
        $product = new Product;
        $product->url = $imagePath; // Store the image path
        $product->pname = $request->pname;
        $product->desc = $request->desc;
        $product->price = $request->price;
        $product->qty = $request->qty;
        $product->save();
        return redirect("adminhome");
    }
    public function viewproduct(Request $request){
        $data = Product::getproducts();
        return view('viewproduct')->with('data',$data);      
    }
    public function edit($id){
        $data = Product::getproductsId($id);
        return view('editproduct')->with('data',$data);
    }
    public function editproduct(Request $request){
        if ($request) {
            $request->validate([
                'id' => 'required|exists:products,id',
                'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Image validation removed from required
                'pname' => 'required',
                'desc' => 'required',
                'price' => 'required|numeric|min:0',
                'qty' => 'required|integer|min:0',
            ]);
        
            $d = Product::findOrFail($request->id); // Use findOrFail instead of get to retrieve a single model instance
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imagePath = $image->store('products', 'public'); 
                $d->url = $imagePath; 
            }
            $d->pname = $request->pname;
            $d->desc = $request->desc;
            $d->price = $request->price;
            $d->qty = $request->qty;
            $d->save();
            $data = Product::getproducts();
            return view('viewproduct')->with('data',$data);  
        }
        
    }
    public function deleteproduct($id)
    {
        $dt = Product::find($id);
        $dt->delete();
        return redirect('viewproduct');
    }
    public function store(Request $request){
        $data = Product::getproducts();
        return view('store')->with('data',$data);      
    }
    
}

