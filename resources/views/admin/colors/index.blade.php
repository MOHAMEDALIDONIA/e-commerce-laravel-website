@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12 ">
        @if (session('message'))
        <h6 class="alert alert-success">{{session('message')}}</h6>
        @endif
        <div class="card">
            <div class="card-header">
              <h3>Colors List
             <a href="{{url('admin/colors/create')}}" class="btn btn-primary btn-sm text-white float-end">Add Colors</a> 
              </h3>

            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Color Code</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($colors as $color)
                        <tr>
                            <td>{{$color ->id}}</td>
                            <td>{{$color ->name}}</td>
                            <td>{{$color->code}}</td>
                            <td>{{$color ->status == '1' ? 'Hidden':'Visible'}}</td>
                            <td>
                                <a href="{{url('admin/colors/'.$color ->id.'/edit')}}"
                                    class="btn btn-primary btn-sm">Edit</a>
                                <a href="{{url('admin/colors/'.$color ->id.'/delete')}}" onclick="return confirm('Are you sure,you want to delete this data?')" class="btn btn-danger btn-sm">Delete</a>
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