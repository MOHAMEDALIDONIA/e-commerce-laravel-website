<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>owl carousel</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div class="py-5 bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>Tranding Products</h4>
                    <div class="underline mb-4"></div>
                </div>

               @if ($trandingProducts)
                <div class="col-md-12">



                    <div class="owl-carousel owl-theme tranding-product">
                      @foreach ($trandingProducts as $productitem)

                        <div class="item">

                      

                        <div class="product-card">
                            <div class="product-card-img">

                                <label class="stock bg-danger">new</label>

                                @if($productitem->productImages->count() > 0)
                                <a href="{{url('/collections/'.$productitem->category->slug.'/'.$productitem->slug)}}">
                                    <img src="{{asset($productitem->productImages[0]->image)}}"
                                        alt="{{$productitem->name}}">
                                </a>
                                @endif
                            </div>
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

                            </div>
                        </div>

                       </div>
                      @endforeach
                    </div>
                </div>

               @else
                  <div class="col-md-12">
                      <div class="p-2">
                          <h4>No Products Available</h4>
                      </div>
                  </div>
               @endif



            </div>

        </div>
  </div>
    </div>
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <script src="{{asset('js/owl.carousel.min.js')}}"></script>
    <script>
        $('.tranding-product').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 4
                }
            }
        })

    </script>
</body>

</html>
