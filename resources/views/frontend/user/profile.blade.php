@extends('layouts.app')
@section('title','User Profile')
@section('content')
<div class="py-5 bg-white">
    <div class="container">
        <div class="row justify-content-center ">
            <div class="col-md-10">
                <h4>User Profile
                    <a href="{{url('change-password')}}" class="btn btn-warning float-end">Change Password ?</a>
                </h4>
                <div class="underline mb-4"></div>
            </div>
            @if ($errors->any())
                <div class="alert alert-warning">
                @foreach ($errors->all() as $error)
                    <div>{{$error}}</div>
                @endforeach
                </div>
              
           @endif
            @if (session('message'))
            <h6 class="alert alert-success">{{session('message')}}</h6>
            @endif
            <div class="col-md-10">
                <div class="card shadow">
                    <div class="card-header  bg-primary">
                         <h4 class="mb-0 text-white">User Details</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{url('profile')}}" method="POST">
                          @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label >Username</label>
                                        <input type="text" name="username" value="{{Auth::user()->name}}" class="form-control"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label >Email Address</label>
                                        <input type="text" name="email" readonly value="{{Auth::user()->email}}" class="form-control"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label >Phone Number</label>
                                        <input type="text" name="phone" value="{{Auth::user()->UserDetail->phone ?? ''}}" class="form-control"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label >Zip/Pin Code</label>
                                        <input type="text" name="zip_code" value="{{Auth::user()->UserDetail->pin_code ?? ''}}" class="form-control"/>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label >Address</label>
                                        <textarea name="address" class="form-control"  rows="3">{{Auth::user()->UserDetail->address ?? ''}}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                   <button type="submit" class="btn btn-primary">Save Data</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection