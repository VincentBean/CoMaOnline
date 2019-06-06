@extends('layouts.backend.master')

@section('body')
<div class="row">
    <div class="col-md-12">
        <form method="POST" class="form-horizontal" enctype="multipart/form-data"
            action="{{ route('dashboard.categories.edit', ['id' => $category->id]) }}" >
            @csrf
            <input type="hidden" name="_method" value="put">
            <div class="card">
                <div class="card-header card-header-success">
                    <h4 class="card-title">Wijzig categorie: {{$category->name}}</h4>
                    <p class="card-category"></p>
                </div>
                <div class="card-body ">
                    <div class="row mb-4">
                        <label class="col-sm-2 col-form-label">Header afbeelding</label>
                        <div class="col-sm-7">
                            @if($errors->first('header_image'))
                            <p class="text-danger">
                            {{$errors->first('header_image')}}
                            </p>
                            @endif
                            <input type="file" name="header_image">
                            @if($category->header_image_url)
                                <img class="header-image mt-2" src="{{$category->header_image_url}}" />
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-sm-2 col-form-label">Categorie afbeelding</label>
                        <div class="col-sm-7">
                            @if($errors->first('category_image'))
                            <p class="text-danger">
                            {{$errors->first('category_image')}}
                            </p>
                            @endif
                            <input type="file" name="category_image">
                            @if($category->category_image_url)
                                <br><img class="mt-2 img-fluid w-25" src="{{$category->category_image_url}}" alt="{{$category->name}} - Afbeelding">
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        
                        <div class="col-sm-7">
                            <div class="form-group bmd-form-group">
                                <button type="submit" class="btn btn-primary">Opslaan</button>
                                <a href="{{route('dashboard.categories')}}" class="orange">Terug naar overzicht</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>
</div>
@endsection