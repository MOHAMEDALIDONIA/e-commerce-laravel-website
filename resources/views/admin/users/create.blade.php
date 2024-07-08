@extends('layouts.admin')
@section('title','Users List')
@section('content')
<div class="row">
    @if ($errors->any())
    <div class="alert alert-warning">
      @foreach ($errors->all() as $error)
          <div>{{$error}}</div>
      @endforeach
    </div>
      
   @endif
    <div class="col-md-12 ">
        @if (session('message'))
        <h6 class="alert alert-success">{{session('message')}}</h6>
        @endif
        <div class="card">
            <div class="card-header">
              <h3>Add Users
             <a href="{{url('admin/users')}}" class="btn btn-danger btn-sm text-white float-end">Back</a> 
              </h3>

            </div>
            <div class="card-body">
                <form action="{{url('admin/users/store')}}" method="POST">
                 @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label >Name</label>
                            <input type="text" name="name" class="form-control"/>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label >Email</label>
                            <input type="text" name="email" class="form-control"/>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label >Password</label>
                            <input type="text" name="password" class="form-control"/>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label >Select Role</label>
                            <select name="role_as" class="form-control">
                                <option value="">Select Role</option>
                                <option value="0">User</option>
                                <option value="1">Admin</option>
                            </select>

                        </div>
                        <div class="col-md-12 text-end">
                            <button type="submit" class="btn btn-primary">Save</button>

                        </div>
                    </div>
                
                </form>
            </div>
        </div>
    </div>
</div>   
@endsection  