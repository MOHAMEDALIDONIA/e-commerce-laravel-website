<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ColorFormRequest;
use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index(){
        $colors = Color::all();
        return view('admin.colors.index',compact('colors'));
    }
    public function create(){
        return view('admin.colors.create');
    }
    public function store(ColorFormRequest $request){
        $validateData = $request->validated();
        $validateData['status'] = $request->status == true ? '1':'0';
        Color::create($validateData);
        return redirect('admin/colors')->with('message','Added Color Successfully');

    }
    public function edit(Color $color){
         $color;
        return view('admin.colors.edit',compact('color'));
    }
    public function update(ColorFormRequest $request,$color_id){
        $validateData = $request->validated();
        $validateData['status'] = $request->status == true ? '1':'0';
        Color::find($color_id)->update($validateData);
        return redirect('admin/colors')->with('message','Updated Color Successfully');

    }
    public function destory(int $color_id){
        $color = Color::findOrfail($color_id);
    
        $color->delete();
        return redirect('admin/colors')->with(['message'=>'Color Deleted  Successfully']);
    }
}
