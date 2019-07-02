@extends('layouts.frontend.master')
@section('body')
<div class="container-fluid">

    <div class="row">
        <div class="col-lg-8  center mt-3">
            <form method="POST" class="form-horizontal" enctype="multipart/form-data"
                action="{{ route('home.order.confirm') }}">
                @csrf
                <div class="card">
                    @include('layouts.frontend.process')
                    <div class="card-body">
                    <h1>Afrekenen</h1>
                    <p class="font-weight-bold">Vul alle onderstaande velden in om uw bestelling te voltooien.</p>
                    <hr>
                        <div class="d-flex justify-content-around">
                        <div class="p-2">
                            <div class="row">
                            <h3>Adresgegevens</h3>
                            </div>
                            <div class="row">
                                <label for="email" class="col-form-label">{{$user->customer->fullName()}}</label>
                            </div>
                            <div class="row">
                                <label for="email" class="col-form-label">{{$user->customer->phone}}</label>
                            </div>
                            <div class="row">
                                <label for="email" class="col-form-label">{{$user->customer->street_name}}</label>
                            </div>     
                            <div class="row">
                                <label for="email" class="col-form-label">{{$user->customer->house_number}}</label>
                            </div>     
                            <div class="row">
                                <label for="email" class="col-form-label">{{$user->customer->zipcode}}</label>
                            </div>                               
                            <div class="row">
                                <label for="email" class="col-form-label">{{$user->customer->city}}</label>
                            </div>     
                        </div>
                        <div class="p-2">
                            <h3>Verzending</h3> 
                            <b>Coma Berzorg-service</b>
                            <p>€{{$timeSlot->price}} bezorgkosten</p>
                            <small>Levering op {{$timeSlot->getFullTime()}}</small>

                            {{-- <h3>Betaling</h3>  
                            <div class="btn-group-vertical btn-group-toggle" data-toggle="buttons">
                            <label class="btn btn-secondary mb-4 active">
                                <input type="radio" name="payment_type" value="ideal" id="ideal" autocomplete="off" checked> iDEAL
                            </label>
                            <label class="btn btn-secondary mb-4">
                                <input type="radio" name="payment_type" value="visa" id="visa" autocomplete="off"> Visa
                            </label>
                            <label class="btn btn-secondary mb-4">
                                <input type="radio" name="payment_type" value="mastercard" id="mastercard" autocomplete="off"> Mastercard
                            </label>
                            <label class="btn btn-secondary mb-4">
                                <input type="radio" name="payment_type" value="paypal" id="paypal" autocomplete="off"> Paypal
                            </label>
                            </div>                           --}}
                        </div>
                        <div class="p-2">
                            <h3>Controleer uw bestelling</h3>      

                                <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead class="text-muted">
                                        <tr>
                                            <th scope="col" width="10">Product</th>
                                            <th scope="col" width="10">Aantal</th>
                                            <th scope="col" width="10">Prijs</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach(Cart::content() as $content)
                                        <tr>
                                            <td>
                                                    <figcaption class="media-body">
                                                        <small class="title text-truncate">{{$content->name}}</small>
                                                        <dl class="param param-inline small">
                                                            <dd>{{$content->options->weight}}</dd>
                                                        </dl>
                                                    </figcaption>
                                                        </div>
                                                </figure>
                                            </td>
                                            <td>
                                                <small>{{$content->qty}}</small>
                                            </td>
                                            <td>
                                                <div class="price-wrap">
                                                    <small>€{{$content->total}}</small>
                                                    <small class="text-muted">(€{{$content->price}})</small>
                                                </div>
                                                <!-- price-wrap .// -->
                                            </td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <td>
                                            <small>Bezorgkosten</small>
                                            </td>
                                            <td>
                                            <small>1</small>
                                            </td>
                                            <td>
                                            <small>€{{$timeSlot->price}}</small>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>                    
                        </div>
                    </div>
                    </div>
                </div>
                {{-- end card --}}
                <div class="card-footer">
                    <div class="row">
                        <div class="col-12">
                            <div class="float-right" style="margin: 10px">
                                <h5 class="">Totaal prijs: <small>€{{Cart::total() + $timeSlot->price}}</small></h5>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="float-right" style="margin: 10px">
                                <button type="submit" class="btn btn-primary float-right">Bestelling voltooien</a>
                            </div>
                            <div class="float-right" style="margin: 10px">
                                <a href="{{route('home.order.moment')}}" class="btn btn-danger float-right">Stap terug</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection