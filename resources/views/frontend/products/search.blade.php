@extends('layouts.frontend.master')
@section('body')
<section>
    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-lg-11 mx-auto">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle mb-4" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Alle Categorieën
                </button>
                <a href="{{route('home.products')}}">Terug naar overzicht</a>
                <h1>{{$amount == 1 ? "$amount resultaten" : "$amount resultaten gevonden voor"}}" {{request()->input('q')}}"</h1>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <div class="header">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row no-gutter">
                                @foreach($categories as $c)
                                    <div class="col-md-2">
                                        <div class="d-inline-flex justify-content-center h-100 w-100">
                                            <div class="card p-2 wrap">
                                                <a href="{{route('home.category.details', [ 'slug' => $c->slug])}}"></a>
                                                <div class="text-center">
                                                    <img class="card-img-top img-fluid w-50" src="{{$c->category_image_url}}" alt="{{$c->name}} - Afbeelding">
                                                    <div class="card-body">
                                                        <p class="card-text small font-weight-bold">{{$c->name}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                </div>
                            </div>
                        </div>
                    </div>     
                </div>
                {{-- Start row --}}
                <div class="row no-gutter">
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