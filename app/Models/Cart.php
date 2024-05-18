<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'userid',
        'productid',
        'amount',
        'qty',
        'status',   
       ];
       protected $table = 'carts';
       public static function getcart($id){
        $data = Cart::select('carts.id', 'carts.userid', 'carts.productid', 'carts.amount', 'carts.qty', 'carts.status', 'products.pname', 'products.url')
        ->join('products', 'carts.productid', '=', 'products.id') 
        ->where('carts.userid', '=', $id)
        ->get();
        return $data;
       
        }
        public static function getcartId($id){
            $data = Cart::select('carts.id','carts.userid','carts.productid','carts.amount','carts.qty','carts.status')
            ->where('carts.id','=',$id)
            ->get();
            return $data;
        }
}
