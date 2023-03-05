<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;

class FrontController extends Controller
{
    public function index()
    {
        $sliders      = Slider::active()->get();
        $products     = Product::active()->latest()->get();
        $categorys    = Category::where('parent_id', 0)->active()->get();
        $subCategorys = Category::where('parent_id', '>', 0)->active()->get();

        return view('front.index', compact('sliders', 'products', 'categorys', 'subCategorys'));

    }//end of fun

    public function changeLang($lang)
    {
        session()->put('dir', $lang == 'ar' ? 'RTL' : 'LTR');
        session()->put('lang', $lang);

        return redirect()->back();

    }//end of fun
    
}//emd of controller