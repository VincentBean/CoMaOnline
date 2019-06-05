@extends('layouts.frontend.master')
@section('body')
<section>

        <section>
                <div class="container-fluid mt-4">

                <h1>er {{$amount == 1 ? "is $amount resultaat" : "zijn $amount resultaten"}} voor "{{request()->input('q')}}"</h1>
                {{-- Start row --}}
                <div class="row no-gutter">
                    <div class="col-lg-2 col-md-3 col-sm-4">
                        <div class="card p-2 h-100" style="background: bisque">
                            <div class="card-block">
                            <h3 class="card-title">{{request()->input('q')}}</h3>
                                <div class="card-text">

                                </div>
                            </div>
                        </div>
                    </div>

                    @foreach($products as $product)
                    <div class="col-lg-2 col-md-3 col-sm-4">
                        <div class="card p-2 h-100 wrap grow">
                        <a href="{{route('home.product', ['id' => $product->id])}}"></a>
                            <div class="card-block"><div class="text-center">
                                <img class="card-img-top img-fluid w-75" src="{{$product->image_url}}" alt="Card image cap"></div>
                                @if($product->promotion != null)
                                <span class="badge badge-pill badge-primary float-right ml-1">€{{$product->promotion->discount_price}}</span>
                                <span class="badge badge-pill badge-danger float-right"><del>€{{$product->price}}</del></span>
                                @else
                                <span class="badge badge-pill badge-primary float-right">€{{$product->price}}</span>
                                @endif
                                <h6 class="card-title product-card-title-height">{{$product->title}}<small class="text-muted"><br>{{$product->weight}}</small></h6>
                                <div class="card-text product-card-text-height">
                                    <p class="card-text">{{$product->short_description}}</p>
                                </div>
                                <i class="ni ni-bold-right float-right"></i>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
                {{-- End row --}}
            </div>
        </div>
    </div>
</section>
@endsection
