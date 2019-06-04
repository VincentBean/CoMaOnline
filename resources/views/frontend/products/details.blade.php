@extends('layouts.frontend.master')
@section('body')
 <div class="container-fluid mt-4">
    <div class="row">
        <div class="col-lg-11 mx-auto">
            <div class="row">
                <div class="col-md-5">
                    <img src="{{$product->image_url}}" class="img-fluid">
                </div>

                <div class="col-md-6">
                    @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                    @endif
                    <h1>{{$product->title}}</h1>
                    <small>{{$product->weight}}</small>
                    @if($product->promotion != null)
                    <h3>€{{$product->promotion->discount_price}}</h3>
                    <h4>€<del>{{$product->price}}</del></h4>
                    @else
                    <h3>€{{$product->price}}</h3>
                    @endif

                    <form method="POST" class="form-horizontal" enctype="multipart/form-data"
                    action="{{ route('home.cart.add', ['id' => $product->id]) }}" >
                        @csrf
                        <div class="form-inline">
                            <input type="text" class="form-control col-md-1 mr-1" name="amount" value="1">
                                <button class="btn btn-primary">Voeg toe</button>
                        </div>
                    </form>

                    <hr>
                    {{$product->full_description}}

                    <h3>Vergelijkbare producten</h3>
                        @foreach($subProducts as $subProduct)
                            <a href="{{route('home.product', ['id' => $subProduct->id])}}">
                            <img class="img-fluid rounded-circle shadow" width="15%" src="{{$subProduct->image_url}}">
                            </a>
                        @endforeach
                </div>
            </div>            
        </div>
    </div>
</div>
@endsection
