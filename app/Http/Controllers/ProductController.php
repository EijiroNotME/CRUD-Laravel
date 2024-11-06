<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    Public function index(){
        $products = Product::all();
        return view('product.index', ['products' => $products]);
    }

    Public function create(){
        return view('product.create');
    }

    Public function store(Request $req){
       $data = $req->validate([
        'name' => 'required',
        'qty' => 'required|numeric',
        'price' => 'required|decimal:0,2',
        'description' => 'nullable'
       ]);

       $newProduct = Product::create($data);
       return redirect(route(('product.index')));
    }

    Public function edit(Product $product){
        return view('product.edit', ['product' => $product]);
    }

    Public function update(Product $product, Request $req){
        $data = $req->validate([
            'name' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|decimal:0,2',
            'description' => 'nullable'
           ]);
        
        $product->update($data);
        return redirect(route(('product.index')))->with('success', 'Product Updated Successfully!');
    
    }

    Public function destroy(Product $product){
        $product->delete();
        return redirect(route(('product.index')))->with('success', 'Product Deleted Successfully!');
    }
}
