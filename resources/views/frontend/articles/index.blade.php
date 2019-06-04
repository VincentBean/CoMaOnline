@extends('layouts.frontend.master')

@section('body')

<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            {{-- Start row header image--}}
            <div class="row">
                <div class="col-md-12">
                    @if($article->header_img_url != null)
                    <img src="{{$article->header_img_url}}" class="img-fluid header-image">
                    @endif
                </div>
            </div>
            {{-- End row header image--}}
            <div class="card bigshadow">
               
                <div class="card-body">
                    <h5 class="float-right">Gepubliceerd: <small>{{$article->created_at}}</small></h5>
                <h1>{{$article->title}}</h1>
                <h4 class="text-secondary mb-2">{{$article->sub_title}}</h4>
                <hr>
                {!!$article->description!!}<a href="{{route('welcome')}}">Terug</a></div>    
            </div>
        </div>
    </div>
</div>

<section>

</section>

@endsection