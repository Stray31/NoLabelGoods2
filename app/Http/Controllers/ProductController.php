<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $route = $request->route()->getName();
        $category = null;
        if ($route === 'edibles') {
            $category = 'edibles';
        } elseif ($route === 'toys') {
            $category = 'toys';
        } elseif ($route === 'problemsolvers') {
            $category = 'problemsolvers';
        } elseif ($route === 'legalfriends') {
            $category = 'legalfriends';
        }
        $products = $category
            ? Product::where('category', $category)->get()
            : Product::all();
        $view = match($route) {
            'edibles' => 'edibles',
            'toys' => 'toys',
            'problemsolvers' => 'problemsolvers',
            'legalfriends' => 'legalfriends',
            default => 'main',
        };
        return view($view, compact('products'));
    }

    public function show(Request $request)
    {
        $id = $request->query('id');
        $product = Product::findOrFail($id);
        $related = Product::where('category', $product->category)
            ->where('id', '!=', $product->id)
            ->get();
        return view('productdetails', compact('product', 'related'));
    }
}
