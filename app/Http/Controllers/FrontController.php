<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
            ->limit(8)->get();
        $data['latestProducts'] = $latestProducts;

        $categoriesp = Category::where('showHome', 'Yes')
            ->orderByDesc('id')
            ->where('status', 1)->get();
        $data['categoriesProduct'] = $categoriesp;


        return view('front.home', $data);
    }
}
