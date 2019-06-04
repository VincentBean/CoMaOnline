@extends('layouts.backend.master')

@section('body')
<div class="row">
    <div class="col-md-12">
        <form method="POST" class="form-horizontal" enctype="multipart/form-data"
            action="{{ route('dashboard.promotions.edit') }}" >
            @csrf
            <input type="hidden" name="_method" value="put">
            <div class="card">
                <div class="card-header card-header-success">
                    <h4 class="card-title">Wijzig aanbieding: {{$global_settings->promotion_title}}</h4>
                    <p class="card-category"></p>
                </div>
                <div class="card-body ">
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Header afbeelding</label>
                        <div class="col-sm-7">
                            <input type="file" name="image">
                            @if($global_settings->promotion_header_url)
                                <img class="header-image mt-2" src="{{$global_settings->promotion_header_url}}" />
                            @endif                            
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-sm-2 col-form-label">Titel</label>
                        <div class="col-sm-7">
                            <div class="form-group bmd-form-group is-filled">
                                <input class="form-control" name="promotion_title" value="{{$global_settings->promotion_title}}" type="text" placeholder="Titel"
                                required="true" aria-required="true" style="cursor: auto;">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-sm-2 col-form-label">Subtitel</label>
                        <div class="col-sm-7">
                            <div class="form-group bmd-form-group is-filled">
                                <input class="form-control" name="promotion_sub_title" type="text"
                                    placeholder="Subtitel" value="{{$global_settings->promotion_sub_title}}" required>
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-primary" type="submit">save</button>

                </div>
            </div>
        </form>
    </div>
</div>

@endsection