<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category; 
use App\Models\Slider; 
use App\Models\Product; 

class WelcomController extends Controller
{
    
    public function index()
    {
        $sliderCount   = Slider::count();
        $categoryCount = Category::count();
        $productCount  = Product::count();

        return view('dashboard.home', compact('sliderCount', 'categoryCount', 'productCount'));

    }//end of index

}//end of controller