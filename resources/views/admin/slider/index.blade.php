@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12 ">
        @if (session('message'))
        <h6 class="alert alert-success">{{session('message')}}</h6>
        @endif
        <div class="card">
            <div class="card-header">
              <h3>Slider List
              <a href="{{url('admin/sliders/create')}}" class="btn btn-primary btn-sm text-white float-end">Add Slider</a> 
              </h3>

            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sliders as $slider)
                        <tr>
                            <td>{{$slider ->id}}</td>
                            <td>{{$slider ->title}}</td>
                            <td>{{$slider->description}}</td>
                            <td>
                              <img src="{{asset("$slider->image")}}" style="width:70px;height:70px;" alt="Slider"></td>
                            <td>{{$slider ->status == '1' ? 'Hidden':'Visible'}}</td>
                            <td>
                                <a href="{{url('admin/sliders/'.$slider->id.'/edit')}}"
                                    class="btn btn-success btn-sm">Edit</a>
                                <a href="{{url('admin/sliders/'.$slider->id.'/delete')}}" onclick="return confirm('Are you sure you want to delete this silder? ')"  class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                  


                    </tbody>


                </table>
            </div>
        </div>
    </div>
</div>  
@endsection