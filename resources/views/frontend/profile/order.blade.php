@extends('layouts.frontend.master')
@section('body')
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-lg-11 mx-auto">
            {{-- Start row --}}
            <div class="row no-gutter">


                {{-- Begin column --}}
                <div class="col-md-12 mb-5">

                    <div class="card shadow">

                        <div class="card-header">

                            @include('frontend.profile.menu')

                        </div>

                        <div class="card-body">

                        <h3>Klantgegevens</h3>

                        <div class="row ml-2">

                            <div class="form-group col-xs-3 col-md-3">
                                
                                <label for="name" class="control-label font-weight-bold">Volledige naam</label>
                                
                                <div class="col-md-6">
                                    <label for="name" class="control-label">{{$user->customer->fullName()}}</label>
                                </div>

                            </div>

                            <div class="form-group col-xs-3 col-md-3">
                                
                                <label for="name" class="control-label font-weight-bold">E-mail</label>
                                
                                <div class="col-md-6">
                                    <label for="name" class="control-label">{{$user->email}}</label>
                                </div>
                            </div>

                            <div class="form-group col-xs-3 col-md-3">
                                
                                <label for="name" class="control-label font-weight-bold">Telefoonnummer</label>
                                
                                <div class="col-md-6">
                                    <label for="name" class="control-label">{{$user->customer->phone}}</label>
                                </div>
                            </div>

                        </div>

                        <div class="row ml-2">

                            <div class="form-group col-xs-3 col-md-3">
                                
                                <label for="name" class="control-label font-weight-bold">Straatnaam</label>
                                
                                <div class="col-md-6">
                                    <label for="name" class="control-label">{{$user->customer->street_name}} {{$user->customer->house_number}}</label>
                                </div>

                            </div>

                            <div class="form-group col-xs-3 col-sm-3 col-md-3 ">
                                
                                <label for="name" class="control-label font-weight-bold">Plaats</label>
                                
                                <div class="col-md-6">
                                    <label for="name" class="control-label">{{$user->customer->city}}</label>
                                </div>
                            </div>

                            <div class="form-group col-xs-3 col-md-3">
                                
                                <label for="name" class="control-label font-weight-bold">Postcode</label>
                                
                                <div class="col-md-6">
                                    <label for="name" class="control-label">{{$user->customer->zipcode}}</label>
                                </div>

                            </div>

                        </div>



                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead class="text-muted">
                                        <tr>
                                            <th scope="col">Product</th>
                                            <th scope="col" width="10">Aantal</th>
                                            <th scope="col">Prijs</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($order->products as $product)
                                        <tr>
                                            <td>
                                                <figure class="media">
                                                    <a href="{{route('home.product', ['id' => $product->id])}}">
                                                    <div class="img-wrap"><img src="{{$product->image_url}}"
                                                            class="img-thumbnail img-sm"></div></a>
                                                        <div class="col-md-8 col-sm-8 col-8">
                                                    <figcaption class="media-body">
                                                        <h6 class="title text-truncate">{{$product->title}}</h6>
                                                        <dl class="param param-inline small">
                                                            <dd>{{$product->weight}}</dd>
                                                        </dl>
                                                    </figcaption>
                                                        </div>
                                                </figure>
                                            </td>
                                            <td>
                                                <h6 class="title text-truncate">{{$product->pivot->quantity}}</h6>
                                            </td>
                                            <td>
                                                <div class="price-wrap">
                                                
                                                    <var class="price">@if($product->pivot->quantity != null)
                                                    €{{$product->price * $product->pivot->quantity}}
                                                    @endif
                                                    </var>
                                                    <small class="text-muted">(€{{$product->price}})</small>
                                                </div>
                                                <!-- price-wrap .// -->
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="col-12">
                                <div class="float-left" style="margin: 10px">
                                    <a href="{{route('home.profiel.orders')}}" class="">Terug naar overzicht</a>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="float-right" style="margin: 10px">
                                    <h6 class="">Bezorgkosten: <small>{!!currency($order->time_slot->price)!!}</small></h6>
                                    <h5 class="">Totaal prijs: <small>{!!currency($order->price)!!}</small></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- end card --}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
