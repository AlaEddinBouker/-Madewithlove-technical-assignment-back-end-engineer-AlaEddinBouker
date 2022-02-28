<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
   public function index()
   {
       $products = json_decode(file_get_contents(storage_path().'/products.json'));
       return view('welcome',compact('products'));
   }
}
