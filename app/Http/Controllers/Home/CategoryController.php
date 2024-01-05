<?php

namespace App\Http\Controllers\Home;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function show(Request $request,Category $category)
    {
        // dd($request->all());

        $attributes = $category->attributes()->where('is_filter' , 1)->with('values')->get();
        $variation = $category->attributes()->where('is_variation' , 1)->with('variationValues')->first();

        $products = $category->products()->filter()->search()->paginate(1);
        // dd($products);

        return view('home.categories.show' , compact('category' , 'attributes' , 'variation' , 'products'));
    }
}
