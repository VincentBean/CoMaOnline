@extends('layouts.frontend.master')

@section('body')

<main>
    <div class="position-relative">
      <!-- Hero for FREE version -->
      <section class="section section-lg section-hero section-shaped">
        <!-- Background circles -->
        <div class="shape shape-style-1 shape-primary">

        </div>
        <div class="container shape-container d-flex align-items-center py-lg">
          <div class="col px-0">
            <div class="row align-items-center justify-content-center">

            </div>
          </div>
        </div>
        <!-- SVG separator -->
        <div class="separator separator-bottom separator-skew zindex-100">
          <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
            <polygon class="fill-bg" points="2560 0 2560 100 0 100"></polygon>
          </svg>
        </div>
      </section>
    </div>
 
    <!-- After header -->
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12" >
                    <div class="col-lg-8 mx-auto" >
                        <h2 class="mb-5">
                        <span>Dagtoppers</span>
                        </h2>
                        <div class="row">
                        <div class="col-sm-8 ">
                            <div class="card p-2">
                                <div class="card-block"><div class="text-center">
                                    <img class="card-img-top img-fluid w-75" src="{{$products[0]->image_url}}" alt="Card image cap"></div>
                                    <span class="badge badge-pill badge-primary float-right">€{{$products[0]->price}}</span>
                                    <h6 class="card-title">{{$products[0]->title}}</h6>
                                    <div class="card-text">
                                        <p class="card-text">{{$products[0]->short_description}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 ">
                            <div class="card p-2 mb-3">
                                <div class="card-block"><div class="text-center">    
                                    <img class="card-img-top img-fluid w-75" src="{{$products[1]->image_url}}" alt="Card image cap"></div>
                                    <span class="badge badge-pill badge-primary float-right">€{{$products[1]->price}}</span>
                                    <h6 class="card-title">{{$products[1]->title}}</h6>
                                    <div class="card-text">
                                        <p class="card-text">{{$products[1]->short_description}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card p-2 d-flex">
                                <div class="card-block"><div class="text-center">    
                                    <img class="card-img-top img-fluid w-75" src="{{$products[2]->image_url}}" alt="Card image cap"></div>
                                    <span class="badge badge-pill badge-primary float-right">€{{$products[2]->price}}</span>
                                    <h6 class="card-title">{{$products[2]->title}}</h6>
                                    <div class="card-text">
                                        <p class="card-text">{{$products[2]->short_description}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
      <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12" >
                <div class="col-lg-8 mx-auto" >
                <hr>
                </div>
            </div>
        </div>
    </div>
    </section>
</main>
@endsection


