@extends('layouts.frontend.master')
@section('body')

<section>

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
                            <div class="row">
                                <div class="col-md-8">

                                        <div class="card-header">Meest recente bestellingen</div>

                                        @if(!$orders->isEmpty())
                                        {{-- Display orders --}}
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Bestellingsnummer</th>
                                                    <th scope="col">Totaal prijs</th>
                                                    <th scope="col">Betaling voldaan met</th>
                                                    <th scope="col">Datum</th>
                                                    <th scope="col">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($orders as $order)
                                                <tr style="cursor: pointer;" onclick="window.location.href = '{{route('home.profiel.order', ['id' => $order->id])}}'">
                                                    <td scope="row">{{$order->id}}</td>
                                                    <td>€{{$order->price}}</td>
                                                    <td>{{ucfirst($order->payment_type)}}</td>
                                                    <td>{{$order->created_at}}</td>
                                                    <td>In behandeling</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        {{-- End Displaying orders --}}       
                                        @else
                                        <h2 class="p-4 text-center">{{__('general.error_no_orders')}}</h2>
                                        @endif                  

                                </div>
                                <div class="col-md-4">

                                    <div class="card ml-2">
                                        <div class="card-header">Adres gegevens</div>

                                            <div class="card-body">
                                                <div class="row ml-2">

                                                    <div class="form-group col-xs-6 col-md-6">
                                                        
                                                        <label for="name" class="control-label font-weight-bold">Volledige naam</label>
                                                        
                                                        <div class="col-md-6">
                                                            <label for="name" class="control-label">{{$user->customer->fullName()}}</label>
                                                        </div>

                                                    </div>

                                                    <div class="form-group col-xs-6 col-md-6">
                                                        
                                                        <label for="name" class="control-label font-weight-bold">E-mail</label>
                                                        
                                                        <div class="col-md-6">
                                                            <label for="name" class="control-label">{{$user->email}}</label>
                                                        </div>
                                                    </div>

                                                    <div class="form-group col-xs-6 col-md-6">
                                                        
                                                        <label for="name" class="control-label font-weight-bold">Telefoonnummer</label>
                                                        
                                                        <div class="col-md-6">
                                                            <label for="name" class="control-label">{{$user->customer->phone}}</label>
                                                        </div>
                                                    </div>

                                                    <div class="form-group col-xs-6 col-md-6">
                                                        
                                                        <label for="name" class="control-label font-weight-bold">Straatnaam</label>
                                                        
                                                        <div class="col-md-6">
                                                            <label for="name" class="control-label">{{$user->customer->street_name}} {{$user->customer->house_number}}</label>
                                                        </div>

                                                    </div>

                                                    <div class="form-group col-xs-6 col-sm-6 col-md-6 ">
                                                        
                                                        <label for="name" class="control-label font-weight-bold">Plaats</label>
                                                        
                                                        <div class="col-md-6">
                                                            <label for="name" class="control-label">{{$user->customer->city}}</label>
                                                        </div>
                                                    </div>

                                                    <div class="form-group col-xs-6 col-md-6">
                                                        
                                                        <label for="name" class="control-label font-weight-bold">Postcode</label>
                                                        
                                                        <div class="col-md-6">
                                                            <label for="name" class="control-label">{{$user->customer->zipcode}}</label>
                                                        </div>

                                                    </div>

                                                </div>

                                            </div>
                                        <label class="form-control-label"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>

@endsection