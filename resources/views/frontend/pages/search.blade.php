@extends('layouts.app')
@section('title','Search')
@section('content')
<div class="py-5 bg-white">
    <div class="container">
        <div class="row justify-content-center ">
            <div class="col-md-12">
                <h4>Search Results</h4>
                <div class="underline mb-4"></div>
            </div>
       
                  

                    @forelse($searchProducts as $productitem)
                     <div class="col-md-10">
                        <div class="product-card">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="product-card-img">
                    
                                            <label class="stock bg-danger">New</label>
                    
                                            @if($productitem->productImages->count() > 0)
                                            <a href="{{url('/collections/'.$productitem->category->slug.'/'.$productitem->slug)}}">
                                                <img src="{{asset($productitem->productImages[0]->image)}}"
                                                    alt="{{$productitem->name}}">
                                            </a>
                                            @endif
                                        </div>

                                    </div>
                                    <div class="col-md-9">
                                        <div class="product-card-body">
                                            <p class="product-brand">{{$productitem->brands}}</p>
                                            <h5 class="product-name">
                                                <a
                                                    href="{{url('/collections/'.$productitem->category->slug.'/'.$productitem->slug)}}">
                                                    {{$productitem->name}}
                                                </a>
                                            </h5>
                                            <div>
                                                <span class="selling-price">${{$productitem->selling_price}}</span>
                                                <span class="original-price">${{$productitem->original_price}}</span>
                                            </div>
                                            <p style="height: 45px; overflow:hidden;">
                                              <b>Description:</b>{{$productitem->description}}
                                            </p>
                                            <a href="{{url('/collections/'.$productitem->category->slug.'/'.$productitem->slug)}}" class="btn btn-outline-primary">View</a>
                                        </div>

                                    </div>
                                </div>    
                        </div>
                     </div>
                    @empty
                        <div class="col-md-12 p-2">
                            <h4>No Such Products Found </h4>
                        </div>
                      
                    @endforelse
                    <div class="text-center">
                        <a href="{{url('/collections')}}" class="btn btn-warning px-3">View More</a>

                    </div>
                
        </div>
     
  </div>
</div>
@endsection