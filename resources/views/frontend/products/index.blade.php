@extends('layouts.frontend.master')
@section('body')
<section>

        <div class="container-fluid">
            <div class="row">
            
                <div class="col-lg-12" >
                    <div class="col-lg-8 mx-auto" >
                        <h2 class="mb-5">
                        <span>Producten</span>
                        <div class="float-right">
                        {{ $categories->onEachSide(1)->links() }}
                        </div>
                        </h2>
                        <div class="row no-gutter">
                        
                        @foreach($categories as $category)
                        
                        <div class="col-sm-3 ">
                            <div class="card p-2 h-100" style="background: bisque">
                                <div class="card-block">
                                    <h3 class="card-title">{{$category->name}}</h3>
                                    <div class="card-text">

                                    </div>
                                </div>
                            </div>
                        </div>

                            @foreach($category->products as $product)
                            <div class="col-sm-3 ">
                                <div class="card p-2 h-100">
                                    <div class="card-block"><div class="text-center">
                                        <img class="card-img-top img-fluid w-75" src="{{$product->image_url}}" alt="Card image cap"></div>
                                        <span class="badge badge-pill badge-primary float-right">€{{$product->price}}</span>
                                        <h6 class="card-title">{{$product->title}}</h6>
                                        <div class="card-text">
                                            <p class="card-text">{{$product->short_description}}</p>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        @endforeach
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection