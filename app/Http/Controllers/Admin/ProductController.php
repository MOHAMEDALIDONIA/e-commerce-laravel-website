<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Brand;
use App\Http\Requests\ProductFormRequest;
use App\Models\Product;
use App\Models\Color;
use App\Models\ProductColor;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File ;
use Livewire\Request as LivewireRequest;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('admin.products.index' , compact('products'));

    }
    public function create(){
        $categories= Category::all();
        $brands=Brand::all();
        $colors = Color::where('status','0')->get();
        return view('admin.products.create' ,compact('categories','brands','colors'));

    }
    public function store(ProductFormRequest $request){
        $validateData = $request->validated();
        $category = Category::findOrfail($validateData['category_id']);
        $product =  $category->products()->create([
            'category_id'=>$validateData['category_id'],
            'name'=>$validateData['name'],
            'slug'=>Str::slug($validateData['slug']),
            'brands'=>$validateData['brand'],
            'small_description'=>$validateData['small_description'],
            'description'=>$validateData['description'],
            'original_price'=>$validateData['original_price'],
            'selling_price'=>$validateData['selling_price'],
            'quantity'=>$validateData['quantity'],
            'tranding'=>$request->tranding == true ?'1':'0',
            'featured'=>$request->featured == true ? '1':'0',
            'status'=>$request->status == true ?'1':'0',
            'meta_title'=>$validateData['meta_title'],
            'meta_description'=>$validateData['meta_description'],
            'meta_keyword'=>$validateData['meta_keyword'],

        ]);
        if($request->hasFile('image')){
        
            $uploadpath = 'uploads/products/';
            $i=1;
           foreach($request->file('image') as $imageFile){
            $ext=$imageFile->getClientOriginalExtension();
            $filename =time().$i++.'.'.$ext;
            $imageFile->move($uploadpath,$filename);
            $finalImagePatName = $uploadpath.$filename ;
            $product->productImages()->create([
                'product_id'=>$product->id,
                'image'=>$finalImagePatName,
            ]);

           }
       
    
        }
        if($request->colors){
            foreach($request->colors as $key =>$color){
                $product->productColors()->create([
                    'product_id'=>$product->id,
                    'color_id'=>$color,
                    'quantity'=> $request->colorquantity[$key] ??0

                ]);
         } 
        }

      return redirect('admin/products')->with(['message'=>'Product Add Successfully']);
      

    }
    public function edit(int $product_id){
        $categories= Category::all();
        $brands=Brand::all();
        $product = Product::findOrfail($product_id);
     
       $product_color= $product->productColors->pluck('color_id')->toArray();
       $colors= Color::whereNotIn('id',$product_color)->get();
        return view('admin.products.edit' ,compact('brands','categories','product' ,'colors'));
    }
    public function update(ProductFormRequest $request, int $product_id ){
        $validateData = $request->validated();
        $category = Category::findOrfail($validateData['category_id']);
        $product = Product::where('id',$product_id);
    
        if($product){
            $product->update([
                'category_id'=>$validateData['category_id'],
                'name'=>$validateData['name'],
                'slug'=>Str::slug($validateData['slug']),
                'brands'=>$validateData['brand'],
                'small_description'=>$validateData['small_description'],
                'description'=>$validateData['description'],
                'original_price'=>$validateData['original_price'],
                'selling_price'=>$validateData['selling_price'],
                'quantity'=>$validateData['quantity'],
                'tranding'=>$request->tranding == true ?'1':'0',
                'featured'=>$request->featured == true ? '1':'0',
                'status'=>$request->status == true ?'1':'0',
                'meta_title'=>$validateData['meta_title'],
                'meta_description'=>$validateData['meta_description'],
                'meta_keyword'=>$validateData['meta_keyword'],

            ]);
            if($request->hasFile('image')){
        
                $uploadpath = 'uploads/products/';
                $i=1;
               foreach($request->file('image') as $imageFile){
                $ext=$imageFile->getClientOriginalExtension();
                $filename =time().$i++.'.'.$ext;
                $imageFile->move($uploadpath,$filename);
                $finalImagePatName = $uploadpath.$filename ;
                $product->productImages()->create([
                    'product_id'=>$product->id,
                    'image'=>$finalImagePatName,
                ]);
    
               }
           
        
            }
            if($request->colors){
                foreach($request->colors as $key =>$color){
                    $product->productColors()->create([
                        'product_id'=>$product->id,
                        'color_id'=>$color,
                        'quantity'=> $request->colorquantity[$key] ??0
    
                    ]);
             } 
            }
             return redirect('admin/products')->with(['message'=>'Product Updated Successfully']);

        }else{
            return redirect('admin/products')->with('message','No such Product Id Found');
        }

    }
    public function destoryImage(int $product_image_id){
        $productImage= ProductImage::findOrfail($product_image_id);
        if(File::exists($productImage->image)){
            File::delete($productImage->image);

        }
        $productImage->delete();
        return redirect()->back()->with(['message'=>'Product Image Deleted Successfully']);



    }
    public function destory(int $product_id){
        $product = Product::findOrfail($product_id);
        if($product->productImages()){
            foreach($product->productImages() as $image){
                if(File::exists($image->image)){
                    File::delete($image->image);
        
                }

            }
        }
        $product->delete();
        return redirect('admin/products')->with(['message'=>'Product Deleted with images Successfully']);
    }
    public function updateProdColorQty(Request $request,$prod_color_id){
         
        $productColorData= Product::findOrfail($request->product_id)
                            ->productColors()->where('id',$prod_color_id)->first();
        $productColorData->update([
            'quantity'=> $request->qty
        ]);  
        return response()->json(['message'=>'Product Color Qty Updated']) ;               

    }
    public function deleteProdColor($prod_color_id){

        $prodColor= ProductColor::findOrfail($prod_color_id);
        $prodColor->delete();
        return response()->json(['message'=>'Product Color deleted']) ; 
    }
}
