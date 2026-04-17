<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class PageController extends Controller
{
    public function home()
    {
        $featuredProducts = Product::where('is_active', true)
            ->orderBy('sort_order')
            ->take(6)
            ->get();
        return view('home', compact('featuredProducts'));
    }

    public function products()
    {
        $products = Product::where('is_active', true)
            ->orderBy('sort_order')
            ->get();
        return view('products', compact('products'));
    }

    public function about()
    {
        return view('about-us');
    }

    public function contact()
    {
        return view('contact-us');
    }

    public function setLocale(Request $request, string $locale)
    {
        if (in_array($locale, ['ar', 'en'])) {
            session(['locale' => $locale]);
        }
        return redirect()->back();
    }
}
