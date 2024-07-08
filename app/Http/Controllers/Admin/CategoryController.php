<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryFormRequest;
use App\Models\Category;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File ;
use Illuminate\Support\Str;


class CategoryController extends Controller
{
    public function index(){
        return view('admin.category.index');
    }
    public function create(){
        return view('admin.category.create');

    }
    public function store(CategoryFormRequest $request){
        /*
        if($request->has('image')){
            /*
            $image=$request->photo;
            $file_extension=strtolower($image->extension());//get lowercase .png .jpg .jpeg
            $file_name=time().'.'.$file_extension;
            $path='images/post';
            $image->move($path,$file_name);
          $file_name=$this->savephoto(path:'images/post',image:$request->image);
        } 
              //insert to database
            Category::create(['image'=>$file_name,
            'name'=>$request->name,
           'slug'=>$request->slug,
           'description'=>$request->description,
            'meta_title'=>$request->meta_title,
            'meta_keyword'=>$request->meta_keyword,
            'meta_description'=>$request->meta_description,
            'status'=> $request->status== true?'1':'0'  ]);
            return redirect()->back()->with(['success'=>'successfully store']);  */
      $validatedData = $request->validated();
      $category = new Category;
      $category->name = $validatedData['name'];
      $category->slug =Str::slug( $validatedData['slug']);
      $category->description = $validatedData['description'];
      $category->meta_title= $validatedData['meta_title'];
      if($request->hasFile('image')){
        $file = $request->file('image');
        $ext=$file->getClientOriginalExtension();
        $filename =time().'.'.$ext;
        $file->move('uploads/category/',$filename);
        $category->image = $filename;

     }
      $category->meta_keyword = $validatedData['meta_keyword'];
      $category->meta_description = $validatedData['meta_description'];
      $category->status = $request->status ==true?'1':'0';
      $category->save();
      return redirect('admin/category')->with('message','Category Add Successfully');
             

    }
    public function edit(Category $category){
      return view('admin.category.edit',compact('category'));
    }
    public function update(CategoryFormRequest $request ,$category){
      $validatedData = $request->validated();
      $category =Category::findOrFail($category); 
    
      $category->name = $validatedData['name'];
      $category->slug =Str::slug( $validatedData['slug']);
      $category->description = $validatedData['description'];
      $category->meta_title= $validatedData['meta_title'];
      if($request->hasFile('image')){
        
        $path = 'uploads/category/'.$category->image;
        if(File::exists($path)){
          File::delete($path);
       }
        $file = $request->file('image');
        $ext=$file->getClientOriginalExtension();
        $filename =time().'.'.$ext;
        $file->move('uploads/category/',$filename);
        $category->image = $filename;

     }
      $category->meta_keyword = $validatedData['meta_keyword'];
      $category->meta_description = $validatedData['meta_description'];
      $category->status = $request->status ==true?'1':'0';
   
      $category->update();
      return redirect('admin/category')->with('message','Category Updated Successfully'); 

    }
}
