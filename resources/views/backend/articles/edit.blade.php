@extends('layouts.backend.master')

@section('body')
<div class="row">
    <div class="col-md-12">
        <form method="POST" class="form-horizontal" enctype="multipart/form-data"
            action="{{ route('dashboard.articles.edit', ['id' => $article->id]) }}" >
            @csrf
            <input type="hidden" name="_method" value="put">
            <div class="card">
                <div class="card-header card-header-success">
                    <h4 class="card-title">Wijzig nieuwsbericht: {{$article->title}}</h4>
                    <p class="card-category"></p>
                </div>
                <div class="card-body ">
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Header afbeelding</label>
                        <div class="col-sm-7">
                            <input type="file" name="image">
                            @if($article->header_img_url)
                                <img class="header-image mt-2" src="{{$article->header_img_url}}" />
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-sm-2 col-form-label">Titel</label>
                        <div class="col-sm-7">
                            <div class="form-group bmd-form-group is-filled">
                                <input class="form-control" name="title" value="{{$article->title}}" type="text" placeholder="Titel"
                                required="true" aria-required="true" style="cursor: auto;">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-sm-2 col-form-label">Subtitel</label>
                        <div class="col-sm-7">
                            <div class="form-group bmd-form-group is-filled">
                                <input class="form-control" name="sub_title" type="text"
                                    placeholder="Subtitel" value="{{$article->sub_title}}" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-sm-2 col-form-label">Categorie</label>
                        <div class="col-sm-7">
                            <div class="form-group bmd-form-group">
                                <input class="form-control" value="{{$article->category}}" type="text" name="category"
                                    placeholder="Categorie" style="cursor: auto;">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-sm-2 col-form-label">Nieuwsbericht</label>
                        <div class="col-sm-7">
                            <div class="form-group bmd-form-group">
                                <textarea id="summernote" name="description">{{$article->description}}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        
                        <div class="col-sm-7">
                            <div class="form-group bmd-form-group">
                                <button type="submit" class="btn btn-primary">Opslaan</button>
                                <a href="{{route('dashboard.articles')}}" class="orange">Terug naar overzicht</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>
</div>
<script>
    $('#summernote').summernote({
    placeholder: 'Nieuwsbericht',
    tabsize: 2,
    height: 175
    });
</script>
@endsection