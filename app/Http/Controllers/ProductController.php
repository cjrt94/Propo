<?php

namespace Propo\Http\Controllers;

use Illuminate\Http\Request;
use Propo\Category;
use Propo\Product;

class ProductController extends Controller
{
    public function index() {

        $products = Product::orderBy('created_at', 'desc')->limit(15)->get();
        return view('products.app', ['products' =>$products]);
    }

    public function new() {
        $categories =  Category::all();
        return view('products.new', ['categories' => $categories]);
    }

    public function store(Request $request){

        Product::create($request->all());

        return redirect()->route('indexProduct');

    }

    public function edit(Product $product) {
        $categories =  Category::all();
        return view('products.edit', ['categories' => $categories, 'product' => $product]);
    }

    public function update(Product $product,Request $request) {



        $product->description= $request->input('description');
        $product->sku= $request->input('sku');
        $product->category= $request->input('category');
        $product->save();

        return redirect()->route('indexProduct');
    }


}
