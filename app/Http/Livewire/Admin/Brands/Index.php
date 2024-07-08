<?php

namespace App\Http\Livewire\Admin\Brands;

use App\Models\Brand;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Str;

class Index extends Component

{ 
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $name,$slug,$status ,$brand_id,$category_id;
    public function rules(){
        return[
            'name'=>'required|string',
            'slug'=>'required|string',
            'category_id'=>'required|integer',
            'status'=>'nullable'

        ];
    }
    public function resetInput(){
        $this->name = Null;
        $this->slug =  Null;
        $this->status = Null;
        $this->brand_id = Null;
        $this->category_id = Null;

    }
    public function editBrand(int $brand_id){
        $this->brand_id = $brand_id;
        $brand = Brand::findOrfail($brand_id);
        $this->name = $brand->name;
        $this->slug = $brand->slug;
        $this->status = $brand->status;
        $this->category_id = $brand->category_id;
    }
    public function closeModal(){
        $this->resetInput();
    }
    public function openModal(){
        $this->resetInput();
    }
    public function deleteBrand(int $brand_id){
        $this->brand_id = $brand_id;
        $brand = Brand::findOrfail($brand_id);
    }
    public function destoryBrand(){
        Brand::findOrfail($this->brand_id)->delete();
        session()->flash('message','Brand Delete Successfully');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }
    public function updateBrand(){
        $validateData= $this->validate();
         Brand::findOrfail($this->brand_id)->update([
          'name'=> $this->name,
          'slug'=>Str::slug($this->slug),
          'status'=>$this->status == true ?'1':'0',
          'category_id'=>$this->category_id,

        ]);
        session()->flash('message','Brand Update Successfully');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();

    }
    public function render()

    {   $categories = Category::where('status','0')->get();
        $brands = Brand::orderBy('id','DESC')->paginate(5);
        return view('livewire.admin.brands.index',['brands'=>$brands,'categories'=>$categories])
                  ->extends('layouts.admin')
                  ->section('content');
    }
    public function storeBrand(){
         $validateData= $this->validate();
        Brand::create([
          'name'=> $this->name,
          'slug'=>Str::slug($this->slug),
          'status'=>$this->status == true ?'1':'0',
          'category_id'=>$this->category_id,

        ]);
        session()->flash('message','Brand Added Successfully');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();

    }
}
