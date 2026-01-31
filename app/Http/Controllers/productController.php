<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class productController extends Controller
{
    public function index(){
        $product=DB::table('product')->get();
        return view('product',compact('product'));
    }
}
