@extends('layouts.backend.master')

@section('body')
<div class="row">
    <div class="col-md-6">
            <div class="card">
                <div class="card-header card-header-success">
                    <h4 class="card-title">Gebruiker aanmaken</h4>
                    <p class="card-category"></p>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('dashboard.users.create') }}">
                        @csrf

                        <div class="form-group row">
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"
                                placeholder="Voornaam" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}"
                                placeholder="Achternaam" required autocomplete="surname" autofocus>

                                @error('surname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>

                        <div class="form-group row">
                            <div class="col-md-4">
                                <div class="float-left mr-2 custom-control custom-radio">
                                        <input name="gender" class="custom-control-input" id="man" type="radio" value="male" checked>
                                        <label class="custom-control-label" for="man">
                                        <span>Man</span>
                                        </label>
                                </div>
                                <div class="float-left custom-control custom-radio">
                                    <input name="gender" class="custom-control-input" id="vrouw" type="radio" value="female">
                                    <label class="custom-control-label" for="vrouw">
                                    <span>Vrouw</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"
                                placeholder="E-mail" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}"
                                placeholder="Telefoonnummer" required autocomplete="phone" autofocus>

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <input id="zipcode" type="text" class="form-control @error('zipcode') is-invalid @enderror" name="zipcode"
                                placeholder="Postcode" required autocomplete="zipcode" autofocus>

                                @error('zipcode')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <input id="house_number" type="text" class="form-control @error('house_number') is-invalid @enderror" name="house_number"
                                placeholder="Huisnummer" required autocomplete="house_number" autofocus>

                                @error('house_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="street_name" type="text" class="form-control @error('street_name') is-invalid @enderror" name="street_name"
                                placeholder="Straatnaam" required autocomplete="street_name" autofocus>

                                <div id="street_loader" class="icon-container d-none">
                                <i class="loader"></i>
                                </div>

                                @error('street_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city"
                                placeholder="Stad" required autocomplete="city" autofocus>

                                <div id="city_loader" class="icon-container d-none">
                                <i class="loader"></i>
                                </div>

                                @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                                placeholder="Wachtwoord" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                                placeholder="Herhaal wachtwoord" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <select class="form-control" style="width: 100%" name="role" id="users">
                                @foreach($roles as $role)
                                    <option value="{{$role->name}}">{{__('general.' . $role->name)}}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary">
                                    Registeren
                                </button>
                                <a href="{{url('/')}}">Terug</a>
                            </div>
                        </div>
                        
                        <input type="hidden" id="province" name="province">

                    </form>
                </div>
            </div>
        </div>
    </div>


    <script>
      $(document).ready(function(){
        $("#users").select2({
            placeholder: "Selecteer een gebruiker",
            allowClear: true,
        });
       });
    </script>
<script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('js/postcode.js')}}"></script>
@endsection