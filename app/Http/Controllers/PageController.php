<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\HeroSlider;
use App\Models\Product;
use Illuminate\Http\Request;

class PageController extends Controller
{

    public function landingPage()
    {
        $sliders = HeroSlider::all();
        $categories = Category::all();
        $products = Product::orderby('created_at','asc')->get()->take(20);
        return view('home',compact('sliders','categories','products'));
    }

    public function viewSingleProduct(String $slug)
    {
        $product = Product::where(['slug' => $slug])->first();
        return view('product-single',compact('product'));
    }
    
    public function adminDashboard()
    {
        return view('admin.dashboard');
    }

    public function registerPage()
    {
        return view('auth.register');
    }

    public function loginPage()
    {
        return view('auth.login');
    }

    public function adminChangePassword()
    {
        return view('admin.change-password');
    }

}
