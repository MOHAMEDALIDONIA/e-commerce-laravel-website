@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12 ">
        <div class="card">
            <div class="card-header">
              <h3>Edit Category
             <a href="{{url('admin/category')}}" class="btn btn-danger btn-sm text-white float-end">Back</a> 
              </h3>

            </div>
            <div class="card-body">
                <form action="{{url('admin/category/'.$category->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Name</label>
                                <input type="text" name="name" value="{{$category->name}}" class="form-control"/>
                                @error('name')
                                   <small class="form-text text-danger">{{$message}}</small> 
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Slug</label>
                                <input type="text" name="slug" value="{{$category->slug}}"  class="form-control"/>
                                @error('slug')
                                <small class="form-text text-danger">{{$message}}</small> 
                                @enderror
                            
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Description</label>
                                <textarea rows="3" name="description"   class="form-control">{{$category->description}}</textarea>
                                @error('description')
                                <small class="form-text text-danger">{{$message}}</small> 
                                @enderror
                            
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Image</label>
                                <input type="file" name="image"   class="form-control"/>
                                <img src="{{ asset('uploads/category/'.$category->image)}}" width="60px" height="60px"/>
                                @error('image')
                                <small class="form-text text-danger">{{$message}}</small> 
                                @enderror
                            
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Status</label><br>
                                <input type="checkbox" name="status" {{$category->status=='1'?'checked':''}}/>
                            
                            </div>
                            <div class="col-md-12">
                                <h4>SEO Tags</h4>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Meta title</label>
                                <input type="text" name="meta_title" value="{{$category->meta_title}}"  class="form-control"/>
                                @error('meta_title')
                                <small class="form-text text-danger">{{$message}}</small> 
                                @enderror
                            
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Meta keyword</label>
                                <textarea rows="3" name="meta_keyword"   class="form-control">{{$category->meta_keyword}}</textarea>
                                @error('meta_keyword')
                                <small class="form-text text-danger">{{$message}}</small> 
                                @enderror
                            
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Meta description</label>
                                <textarea rows="3" name="meta_description"   class="form-control">{{$category->meta_description}}</textarea>
                                @error('meta_description')
                                <small class="form-text text-danger">{{$message}}</small> 
                                @enderror
                            
                            </div>
                            <div class="col-md-12 mb-3">
                                <button type="submit" class="btn btn-primary float-end">Update</button>

                            </div>
                         
                </form>
           

            </div>


        </div> 
    </div>
</div> 
@endsection  