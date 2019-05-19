@extends('layouts.frontend.master')
@section('body')
 <div class="container-fluid mt-4">
    <div class="row">
        <div class="col-lg-11 mx-auto">
            <div class="row">
                <div class="col-md-5">
                <img src="{{$product->image_url}}">
                </div>

                <div class="col-md-6">
                <h1>{{$product->title}}</h1>
                <small>{{$product->weight}}</small>
                
                <h3>€{{$product->price}}</h3>
                <button class="btn btn-primary">Voeg toe</button>
                <hr>
                {{$product->full_description}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
