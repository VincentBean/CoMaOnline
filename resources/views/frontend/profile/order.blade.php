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

                        </div>
                    </div>
                    {{-- end card --}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
