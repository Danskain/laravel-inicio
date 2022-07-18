<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index() {
        
        //$products = DB::table('products')->get();
        $products = Product::all();


        dd($products[0]->id); 
        return view('products.index');
    }

    public function create() {
        return 'este es el formulario para crear un productos FROM CONTROLLER'; 
    }

    public function store() {
        return 'este es el formulario de crear un productoproductos'; 
    }

    public function show($product) {
        
        //$product = DB::table('products')->where('id', $product)->first();
        //$product = DB::table('products')->find($product);
        //$product = Product::find($product);
        
        $product = Product::findOrFail($product);

        //dd($product);
        return view('products.show')->with(['product' => $product]);
    }

    public function edit($products) {
        return "producro con id para modificar existente {$products}";
    }

    public function update($products) {
        return "producro con id para modificar existente {$products}";
    }
    public function destroy($products) { 
        return "producro con id para modificar existente {$products}";
    }

}