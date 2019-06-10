@extends('layouts.frontend.master')
@section('body')
<div class="container-fluid">

    <div class="row">
        <div class="col-lg-8  center mt-3">

            <div class="card">
                <div class="card-body">
                <h2>Bedankt voor uw bestelling,</h2>
                <p>De bestelling is ontvangen en is in behandeling genomen. U kunt meer informatie vinden over uw bestelling op de profiel pagina.</p> 
                <a href="{{route('welcome')}}" class="btn btn-secondary">Homepagina</a>
                <a href="{{route('home.profiel')}}" class="btn btn-primary">Mijn profiel</a>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection