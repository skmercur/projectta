<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Http\Resources\Product as ProductResource;

class ProductsController extends Controller
{
    public function index (){
        $products = Product::orderBy('created_at', 'desc')->paginate(5);


        return ProductResource::collection($products);
    }
}
