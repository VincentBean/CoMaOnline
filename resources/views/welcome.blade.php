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
        <div class="col-lg-11 mx-auto mt-3">
            <h1>Dagaanbiedingen</h1>
            {{-- Start row header image--}}
            <div class="row">
                <div class="col-md-12">
                    <img src="{{$global_settings->promotion_header_url}}" class="img-fluid header-image">
                    <h2 class="header_image_text text-white font-weight-bold">{{$global_settings->promotion_title}}</h2>
                    <p class="header_image_text_lower text-white font-weight-bold">{{$global_settings->promotion_sub_title}}</p>
                </div>
            </div>
            {{-- End row header image--}}
            <div class="row no-gutter">
            @foreach($promotions as $promotion)
                <div class="col-md-4">
                    <div class="card p-2 h-100 wrap ">
                        <a href="{{route('home.product', ['id' => $promotion->product->id])}}"></a>
                        <div class="card-block"><div class="text-center">
                            <img class="card-img-top img-fluid w-25" src="{{$promotion->product->image_url}}" alt="Card image cap"></div>
                            <span class="badge badge-pill badge-primary float-right ml-1">€{{$promotion->discount_price}}</span>
                            <span class="badge badge-pill badge-danger float-right"><del>€{{$promotion->product->price}}</del></span>
                            <h6 class="card-title">{{$promotion->product->title}}<small class="text-muted"><br>{{$promotion->product->weight}}</small></h6>
                            <div class="card-text">
                                <p class="card-text">{{$promotion->product->short_description}}</p>
                            </div>
                            <i class="ni ni-bold-right float-right"></i>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="news-article mt-5 mb-5">
                        <h1>Nieuwsberichten</h1>
                        <div class="panel-body">
                            {{ csrf_field() }}
                            <div id="post_data"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</main>

<script>
$(document).ready(function(){
 
 var _token = $('input[name="_token"]').val();

 load_data('', _token);

 function load_data(id="", _token)
 {
  $.ajax({
   url:"{{ route('loadmore.load_data') }}",
   method:"POST",
   data:{id:id, _token:_token},
   success:function(data)
   {
    $('#load_more_button').remove();
    $('#post_data').append(data);
   }
  })
 }

 $(document).on('click', '#load_more_button', function(){
  var id = $(this).data('id');
  $('#load_more_button').html('<b>Laden...</b>');
  load_data(id, _token);
 });

});
</script>

@endsection


