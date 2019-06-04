@extends('layouts.frontend.master')
@section('body')
<div class="container-fluid">

    <div class="row">
        <div class="col-lg-8  center mt-3">
            <div class="card">
                @include('layouts.frontend.process')
                <form method="POST" class="form-horizontal" enctype="multipart/form-data"
                action="{{ route('home.cart.update') }}" >
                @csrf
                    <div class="card-body">
                    {{-- Message handler --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                            {{ $error }}
                            @endforeach
                        </div>
                    @endif
                    @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                    @endif
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="text-muted">
                                    <tr>
                                        <th scope="col">Product</th>
                                        <th scope="col" width="10">Aantal</th>
                                        <th scope="col">Prijs</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach(Cart::content() as $content)
                                    <tr>
                                        <td>
                                            <figure class="media">
                                                <a href="{{route('home.product', ['id' => $content->id])}}">
                                                <div class="img-wrap"><img src="{{$content->options->image}}"
                                                        class="img-thumbnail img-sm"></div></a>
                                                    <div class="col-md-8 col-sm-8 col-8">
                                                <figcaption class="media-body">
                                                    <h6 class="title text-truncate">{{$content->name}}</h6>
                                                    <dl class="param param-inline small">
                                                        <dd>{{$content->options->weight}}</dd>
                                                    </dl>
                                                </figcaption>
                                                    </div>
                                            </figure>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control mr-1" name="amount[{{$content->rowId}}]" value="{{$content->qty}}">
                                        </td>
                                        <td>
                                            <div class="price-wrap">
                                                <var class="price">€{{$content->total}}</var>
                                                <small class="text-muted">(€{{$content->price}})</small>
                                            </div>
                                            <!-- price-wrap .// -->
                                        </td>
                                        <td class="text-right">
                                            <a href="{{route('home.cart.delete', ['id' => $content->id])}}" class="btn btn-outline-danger">verwijder</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="float-right" style="margin: 10px">
                            <button class="btn btn-secondary float-right">Winkelwagen bijwerken</button>
                        </div>
                    </div>
                </form>
            </div>
            {{-- end card --}}
            <div class="card-footer">
                <div class="row">
                    <div class="col-12">
                        <div class="float-right" style="margin: 10px">
                            <h5 class="">Totaal prijs: <small>€{{Cart::total()}}</small></h5>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="float-right" style="margin: 10px">
                            <a href="{{route('home.order.moment')}}" class="btn btn-primary float-right {{Cart::content()->count() > 0 ? '' : 'disabled'}}">Verder met bestellen</a>
                        </div>
                        <div class="float-right" style="margin: 10px">
                            <a href="{{route('home.cart.deleteAll')}}" class="btn btn-danger float-right">Winkelwagen legen</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
