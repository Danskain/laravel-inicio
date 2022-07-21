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

        $rules = [
            'title' => ['required', 'max:255'],
            'description' => ['required', 'max:100'],
            'price' => ['required', 'min:1'],
            'stock' => ['required', 'min:0'],
            'status' => ['required', 'in:available,unavailable'],
        ];

        request()->validate($rules);

        if (request()->status == 'available' && request()->stock == 0) {
            //session()->put('error', 'If available must have stock');
            //session()->flash('error', 'If available must have stock');
            
            return redirect()
                        ->back()
                        ->withInput(request()->all())
                        ->withErrors('no puede ser 0 el stock');
        }
        
        //session()->forgete('error');
        
        $product = Product::create(request()->all());
        
        //session()->flash('error', "nuevo productocon id => {$product->id} fue creado");
        //return redirect()->back();
        //return redirect()->action('homeController@index');
        return redirect()
                    ->route('products.index')
                    ->withSuccess("el productocon id => {$product->id} fue creado");
                    //->with(['success' => "nuevo productocon id => {$product->id} fue creado"])
    }

    public function show($product) {
        
        //$product = DB::table('products')->where('id', $product)->first();
        //$product = DB::table('products')->find($product);
        //$product = Product::find($product);

        $product = Product::findOrFail($product);

        //dd($product);
        return view('products.show')->with(['product' => $product]);
    }

    public function edit($product) {
        
        $product = Product::findOrFail($product);
        return view('products.edit')->with(['product' => $product]);
    }

    public function update($product) {

        $rules = [
            'title' => ['required', 'max:255'],
            'description' => ['required', 'max:100'],
            'price' => ['required', 'min:1'],
            'stock' => ['required', 'min:0'],
            'status' => ['required', 'in:available,unavailable'],
        ];

        request()->validate($rules);

        if (request()->status == 'available' && request()->stock == 0) {
            //session()->put('error', 'If available must have stock');
            session()->flash('error', 'If available must have stock');
            
            return redirect()->back()->withInput(request()->all());
        }

        $product = Product::findOrFail($product);
        $product->update(request()->all());
        return redirect()
                    ->route('products.index')
                    ->withSuccess("el productocon id => {$product->id} fue editado");
    }
    public function destroy($product) {
        //dd($product);
        
        $product = Product::findOrFail($product);
        $product->delete();
        return redirect()
                    ->route('products.index')
                    ->withSuccess("el productocon id => {$product->id} fue eliminado");
    }

}