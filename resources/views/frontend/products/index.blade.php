@extends('layouts.frontend.master')
@section('body')

<section>

<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-lg-11 mx-auto">
            {{-- Start row --}}
            <div class="row no-gutter">
            @foreach($categories as $category)
                <div class="col-md-2">
                    <div class="d-inline-flex justify-content-center h-100">
                        <div class="card p-2 wrap">
                        <a href="{{route('home.category.details', [ 'slug' => $category->slug])}}"></a>
                            <div class="text-center">
                                <img class="card-img-top img-fluid w-50" src="{{$category->category_image_url}}" alt="{{$category->name}} - Afbeelding">
                                <div class="card-body">
                                    <p class="card-text small font-weight-bold">{{$category->name}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
            {{-- End of row --}}
            <div class="card p-2 default-bg">
                <a href="#"></a>
                <form method="GET" action="{{route('search')}}">
                    <div class="col-md-6">
                        <div class="form-group">
                            <p class="font-weight-bold">Zoek direct naar een product</p>
                            <div class="input-group input-group-alternative mb-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-zoom-split-in"></i></span>
                                </div>
                                <input id="searchCategory" name="q" value="{{ request()->input('q') }}" class="form-control form-control-alternative" placeholder="Zoek producten..." autocomplete="off" type="text">
                                <div id="productlistCategory" class="dropdown-menu" aria-labelledby="dropdownMenuLink"
                                        style="width:500px;z-index:1000;">

                                    </div>
                                    {{ csrf_field() }}
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</section>

@endsection
