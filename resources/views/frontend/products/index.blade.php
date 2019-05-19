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
            <div class="card p-2">
                <a href="#"></a>
                <div class="text-center">
                    <p class="font-weight-bold">Bezoek ook eens onze speciaalzaken</p>
                </div>
                <div class="d-inline-flex justify-content-between">

                    <div class="d-inline-flex justify-content-between wrap">
                        <a href="#"></a>
                        <div class="span4">
                            <img style="float:left" class="img-fluid w-25" src="https://static.ahold.com/image-optimization/cmgtcontent/media//001790400/000/001790482_002_winkelmandjeetos.png"/>
                            <div class="content-heading"><h6>Speciaalzaak 1</h6>
                            <p style="">Beauty, verzorging en acties</p>
                            </div>
                        </div>
                    </div>
                
                    <div class="d-inline-flex justify-content-between wrap">
                        <div class="span4">
                            <img style="float:left" class="img-fluid w-25" src="https://static.ahold.com/image-optimization/cmgtcontent/media//001790400/000/001790482_002_winkelmandjeetos.png"/>
                            <div class="content-heading"><h6>Speciaalzaak 2</h6>
                            <p style="">Beauty, verzorging en acties</p>
                            </div>
                        </div>
                    </div>
                    <div class="d-inline-flex justify-content-between wrap">
                        <div class="span4">
                            <img style="float:left" class="img-fluid w-25" src="https://static.ahold.com/image-optimization/cmgtcontent/media//001790400/000/001790482_002_winkelmandjeetos.png"/>
                            <div class="content-heading"><h6>Speciaalzaak 3</h6>
                            <p style="">Beauty, verzorging en acties</p>
                            </div>
                        </div>
                    </div>
                        <div class="d-inline-flex justify-content-between wrap">
                        <div class="span4">
                            <img style="float:left" class="img-fluid w-25" src="https://static.ahold.com/image-optimization/cmgtcontent/media//001790400/000/001790482_002_winkelmandjeetos.png"/>
                            <div class="content-heading"><h6>Speciaalzaak 4</h6>
                            <p style="">Beauty, verzorging en acties</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- End of card --}}
            <div class="card p-2 default-bg">
                <a href="#"></a>
                <form>
                    <div class="col-md-6">
                        <div class="form-group">
                            <p class="font-weight-bold">Zoek direct naar een product</p>
                            <div class="input-group input-group-alternative mb-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-zoom-split-in"></i></span>
                                </div>
                                <input class="form-control form-control-alternative" placeholder="Zoek producten..." type="text">
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