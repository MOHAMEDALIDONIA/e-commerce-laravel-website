<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderFormRequest;
use App\Models\Slider;
use Illuminate\Support\Facades\File ;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index(){
        $sliders = Slider::all();
        return view('admin.slider.index' ,compact('sliders'));
    }
    public function create(){
        return view('admin.slider.create');
    }
    public function store(SliderFormRequest $request){
        $validatedData = $request->validated();
        if($request->hasFile('image')){
            $file = $request->file('image');
            $ext=$file->getClientOriginalExtension();
            $filename =time().'.'.$ext;
            $file->move('uploads/slider/',$filename);
            $validatedData['image'] ="uploads/slider/$filename";
    
        }
        
         Slider::create([
            'title'=>$validatedData['title'],
            'description'=>$validatedData['description'],
            'image'=>$validatedData['image'],
            'status'=>$request->status == true ? '1':'0'
         ]);
         return redirect('admin/sliders')->with('message','Slider Added Successfully');

 
    }
    public function edit(Slider $slider){
        return view('admin.slider.edit',compact('slider'));
    }
    public function update(SliderFormRequest $request,Slider $slider){
        $validatedData = $request->validated();
        if($request->hasFile('image')){
            if(File::exists($slider->image)){
                File::delete($slider->image);
             }
            $file = $request->file('image');
            $ext=$file->getClientOriginalExtension();
            $filename =time().'.'.$ext;
            $file->move('uploads/slider/',$filename);
            $validatedData['image'] ="uploads/slider/$filename";
    
        }
        
         Slider::where('id',$slider->id)->update([
            'title'=>$validatedData['title'],
            'description'=>$validatedData['description'],
            'image'=>$validatedData['image']??$slider->image,
            'status'=>$request->status == true ? '1':'0'
         ]);
         return redirect('admin/sliders')->with('message','Slider Updated Successfully');

    }
    public function destory(Slider $slider){
       if($slider->count()>0){
            if(File::exists($slider->image)){
                File::delete($slider->image);
            }
            $slider->delete();
            return redirect('admin/sliders')->with('message','Slider Deleted Successfully');

       } 
       return redirect('admin/sliders')->with('message','Something went Wrong');
  

       
    }
    
}
