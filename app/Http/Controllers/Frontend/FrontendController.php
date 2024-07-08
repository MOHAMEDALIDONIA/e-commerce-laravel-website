<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Slider;

class FrontendController extends Controller
{
    public function index(){
        $sliders=Slider::where('status','0')->get();
        $trandingProducts = Product::where('tranding','1')->latest()->take(15)->get();
        return view('frontend.index',compact('sliders','trandingProducts'));
    }
    public function NewArrival(){
        $newArrivalProducts =  Product::latest()->take(16)->get();
        return view('frontend.pages.new-arrival',compact('newArrivalProducts'));
    }
    public function FeaturedProducts(){
        $FeaturedProducts =  Product::where('featured','1')->latest()->get();
        return view('frontend.pages.featured-products',compact('FeaturedProducts'));

    }
    public function categories(){
        $categories = Category::where('status','0')->get();
        return view('frontend.collections.category.index',compact('categories'));
    }
    public function products($category_slug){
        $category = Category::where('slug',$category_slug)->first();
        if($category){
         
         return view('frontend.collections.products.index',compact('category'));

        }else{
            return redirect()->back();

        }

    }
    public function productView(string $category_slug,string $product_slug){
        $category = Category::where('slug',$category_slug)->first();
        if($category){
            $products = $category->products()->where('slug',$product_slug)->where('status','0')->first();
            if($products){
                return view('frontend.collections.products.view',compact('products','category'));

            }else{
                return redirect()->back();
    
            }
         
         

        }else{
            return redirect()->back();

        }

    }
    public function thankyou(){
        return view('frontend.thank-you');
    }
    public function searchProduct(Request $request){
        if ($request->search) {
            $searchProducts = Product::where('name','LIKE','%'.$request->search.'%')->latest()->paginate(15);
            return view('frontend.pages.search',compact('searchProducts'));
        }else{
            return redirect()->back()->with('message','Empty Search');

        }
    }
}
