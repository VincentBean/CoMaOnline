@extends('layouts.backend.master')

@section('body')
<div class="row">
    <div class="col-md-12">
        <form method="POST" class="form-horizontal" enctype="multipart/form-data"
            action="{{ route('dashboard.articles.create') }}" >
            @csrf
            <div class="card">
                <div class="card-header card-header-success">
                    <h4 class="card-title">Maak nieuwsbericht</h4>
                    <p class="card-category"></p>
                </div>
                <div class="card-body ">

                    <div class="row">
                        <label class="col-sm-2 col-form-label">Header afbeelding</label>
                        <div class="col-sm-7">
                            @if($errors->first('image'))
                            <p class="text-danger">
                            {{$errors->first('image')}}
                            </p>
                            @endif
                            <input type="file" name="image" id="imgInp">
                            <img class="header-image mt-2" id="blah" src="#" alt="" />
                            
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-sm-2 col-form-label">Titel</label>
                        <div class="col-sm-7">
                            @if($errors->first('title'))
                            <p class="text-danger">
                            {{$errors->first('title')}}
                            </p>
                            @endif
                            <div class="form-group bmd-form-group is-filled">
                                <input class="form-control" name="title"  type="text" placeholder="Titel"
                                required="true">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-sm-2 col-form-label">Subtitel</label>
                        <div class="col-sm-7">
                            @if($errors->first('sub_title'))
                            <p class="text-danger">
                            {{$errors->first('sub_title')}}
                            </p>
                            @endif
                            <div class="form-group bmd-form-group is-filled">
                                <input class="form-control" name="sub_title" type="text" placeholder="Subtitel" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-sm-2 col-form-label">Categorie</label>
                        <div class="col-sm-7">
                            @if($errors->first('category'))
                            <p class="text-danger">
                            {{$errors->first('category')}}
                            </p>
                            @endif
                            <div class="form-group bmd-form-group">
                                <input class="form-control" type="text" name="category" placeholder="Categorie" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-sm-2 col-form-label">Nieuwsbericht</label>
                        <div class="col-sm-7">
                            @if($errors->first('description'))
                            <p class="text-danger">
                            {{$errors->first('description')}}
                            </p>
                            @endif
                            <div class="form-group bmd-form-group">
                                <textarea id="summernote" name="description"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        
                        <div class="col-sm-7">
                            <div class="form-group bmd-form-group">
                                <button type="submit" class="btn btn-primary">Opslaan</button>
                                <a href="{{route('dashboard.articles')}}" class="text-black">Terug naar overzicht</a>
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

<script>
function readURL(input) {

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#blah').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

$("#imgInp").change(function() {
  readURL(this);
});
</script>
@endsection