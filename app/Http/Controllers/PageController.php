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

    public function contactPage()
    {
        return view('contact');
    }

    public function categoryProductPage(String $name)
    {
        $sliders = HeroSlider::all();
        $categories = Category::all();
        $category = Category::where(['name' => $name])->first();
        $products = Product::where(['category_id' => $category->id])->get();

        return view('category',compact('sliders','categories','products','category'));
    }

    public function search_product(Request $request)
    {
        $sliders = HeroSlider::all();
        $categories = Category::all();

        $query = $request->get('search');

        $products = Product::where('name', 'like', '%' . $query . '%')
                    ->orWhereHas('category', function($q) use ($query) {
                        $q->where('name','like', '%' . $query . '%')
                            ->orwhere('display','like', '%' . $query . '%');
                    })->get();
                    
        return view('home',compact('sliders','categories','products','query'));
    }

}
