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


        //dd($products[0]->id); 
        return view('products.index')->with([
            'products' => $products,
        ]);
    }

    public function create() {
        return view('products.create'); 
    }

    public function store() {
        /*
        $create = Product::create([
            'title' => request()->title,
            'description' => request()->description,
            'price' => request()->price,
            'stock' => request()->stock,
            'status' => request()->status,
        ]);*/
        
        $product = Product::create(request()->all());
        return $product;
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