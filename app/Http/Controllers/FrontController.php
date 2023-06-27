<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

use function App\Helpers\getCategories;

class FrontController extends Controller
{
    public function index()
    {
        $products = Product::where('is_featured', 'Yes')
            ->orderByDesc('id')
            ->where('status', 1)->get();
        $data['featuredProducts'] = $products;


        $latestProducts = Product::orderByDesc('id', 'DESC')
            ->where('status', 1)
            ->take(8)->get();
        $data['latestProducts'] = $latestProducts;

        return view('front.home', $data);
    }
}
