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
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="card-header">Alle bestellingen</div>
                                    {{-- @if(!$quote->isEmpty()) --}}

                                    @if(!$orders->isEmpty())
                                    {{-- Display users --}}
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">Bestellingsnummer</th>
                                                <th scope="col">Totaal prijs</th>
                                                <th scope="col">Datum</th>
                                                <th scope="col">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($orders as $order)
                                            <tr style="cursor: pointer;" onclick="window.location.href = '{{route('home.profiel.order', ['id' => $order->id])}}'">
                                                <td scope="row">{{$order->id}}</td>
                                                <td>{!!currency($order->price)!!}</td>
                                                <td>{{$order->created_at}}</td>
                                                <td>In behandeling</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    @else
                                    <h2 class="p-4 text-center">{{__('general.error_no_orders')}}</h2>
                                    @endif
                                    {{ $orders->links() }}
                                </div>
                            </div>
                        </div>
                        {{-- end card --}}
                        <div class="card-footer">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection