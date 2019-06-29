@extends('layouts.backend.master')

@section('body')
<div class="row">
<div class="col-md-12">
<div class="card">
<div class="card-header card-header-success">
<h4 class="card-title">Nieuwsbrief aanmeldingen</h4>
<p class="card-category">Overzicht van alle aanmeldingen voor de nieuwsbrief</p>
</div>
<div class="card-body">
                <form method="POST" class="form-horizontal" enctype="multipart/form-data"
                    action="{{ route('dashboard.newsletter.delete') }}" >
                    @csrf
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="text-primary">
                            <tr>
                                <th>                            
                                    <div class="form-check">
                                        <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" id="select_all">
                                        <span class="form-check-sign">
                                            <span class="check"></span>
                                        </span>
                                        </label>
                                    </div>
                                </th>
                                <th>E-mail</th>
                                <th>Aangemeld</th>
                            </tr>
                        </thead>
</div>
</div>
</div>
</div>

@endsection