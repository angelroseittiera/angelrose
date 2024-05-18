<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
     'id',
     'pname',
     'url',
     'desc',
     'price',
     'qty',   
    ];
    protected $table = 'products';
    public static function getproducts(){
        $data = Product::select('products.id','products.url','products.pname','products.desc','products.price','products.qty')
        ->get();
        return $data;
    }
    public static function getproductsId($id){
        $data = Product::select('products.id','products.url','products.pname','products.desc','products.price','products.qty')
        ->where('products.id','=',$id)
        ->get();
        return $data;
    }
}
