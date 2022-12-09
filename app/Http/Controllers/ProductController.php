<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create(Request $request)
    {
        $product = new Product;
        $product->name = 'parle g';
        $product->price = 20;

        $product->save();

        $category = Category::find([1, 2]);
        $product->categories()->attach($category,['stock_left' => 2]);

        return 'Success';
    }

    public function syncProductWithCategory($productId)
    {
        $category = Category::find([1,2]);
        $product = Product::query()->find($productId);
        $product->categories()->sync($category);
        return 'Success';
    }

    public function show($productId)
    {
        $product = Product::withSum('categories','category_product.stock_left')->find($productId);
//        dd($product);
        return view('product.show', compact('product'));    }

    public function removeCategory($productId)
    {
        $category = Category::find(1);
        $product = Product::query()->find($productId);

        $product->categories()->detach($category);

        return 'Success';
    }

    public function categoryShow($categoryId)
    {
        $category = Category::withCount('products')->find($categoryId);
        return view('category.show', compact('category'));
    }
}
