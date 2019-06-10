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
                                        {{-- Display orders --}}
                                        <table class="table">
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
                                                <tr>
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
                                  
                                        <h2 class="p-4 text-center">{{__('general.error_no_orders')}}</h2>
                                        <p class="card-text p-4 text-center">{!!__('general.error_no_orders')!!}</p>
                          

                                </div>
                                <div class="col-md-4">

                                    <div class="card ml-2">
                                        <div class="card-header">Adres gegevens</div>

                                        <label class="form-control-label"></label>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>

@endsection