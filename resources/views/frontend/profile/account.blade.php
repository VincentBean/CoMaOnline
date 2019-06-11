@extends('layouts.frontend.master')
@section('body')

<section>
    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-lg-11 mx-auto">
                {{-- Start row --}}
                <div class="row no-gutter">

                    {{-- Begin column --}}
                    <div class="col-md-12 mb-5">

                        <div class="card shadow">

                            <div class="card-header">
                                @include('frontend.profile.menu')
                            </div>

                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-8">
                                    <form method="POST" class="form-horizontal" enctype="multipart/form-data"
                                    action="{{ route('home.profiel.account') }}" >
                                    @csrf
                                        <div class="card-header">Adresgegevens</div>
                                        <div class="card-body">
                                            <div class="form-group row mx-auto">
                                                <div class="col-md-5 mr-2">
                                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$user->customer->name}}"
                                                    placeholder="Voornaam" required autocomplete="name" autofocus>

                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="col-md-5">
                                                    <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{$user->customer->surname}}"
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
                                                        <input name="gender" class="custom-control-input" id="man" type="radio" value="male" 
                                                        {{$user->customer->gender == 'male' ? 'checked' : ''}}>
                                                        <label class="custom-control-label" for="man">
                                                        <span>Man</span>
                                                        </label>
                                                    </div>
                                                    <div class="float-left custom-control custom-radio">
                                                        <input name="gender" class="custom-control-input" id="vrouw" type="radio" value="female"
                                                        {{$user->customer->gender == 'female' ? 'checked' : ''}}>
                                                        <label class="custom-control-label" for="vrouw">
                                                        <span>Vrouw</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-md-12">
                                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$user->email}}"
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
                                                    <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone"
                                                    placeholder="Telefoonnummer" value="{{$user->customer->phone}}" required autocomplete="phone" autofocus>

                                                    @error('phone')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row mx-auto">
                                                <div class="col-md-5 mr-2">
                                                    <input id="zipcode" type="text" class="form-control @error('zipcode') is-invalid @enderror" name="zipcode"
                                                    placeholder="Postcode" value="{{$user->customer->zipcode}}" required autocomplete="zipcode" autofocus>

                                                    @error('zipcode')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-5">
                                                    <input id="house_number" type="text" class="form-control @error('house_number') is-invalid @enderror" name="house_number"
                                                    placeholder="Huisnummer" value="{{$user->customer->house_number}}" required autocomplete="house_number" autofocus>

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
                                                    placeholder="Straatnaam" value="{{$user->customer->street_name}}" required autocomplete="street_name" autofocus>

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
                                                    placeholder="Stad" value="{{$user->customer->city}}" required autocomplete="city" autofocus>

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

                                            <input type="hidden" id="province" name="province">
                                            <button type="submit" class="btn btn-primary">Wijzig gegevens</button>
                                        </div>
                                        </form>

                                    </div>
                                    <div class="col-md-4">

                                        <div class="ml-2">
                                            <div class="card-header">Wachtwoord wijzigen</div>
                                            <form method="POST" class="form-horizontal" enctype="multipart/form-data"
                                                action="{{ route('home.profiel.password') }}" >
                                                @csrf
                                                <input type="hidden" name="_method" value="put">
                                                <div class="card-body">

                                                
                                                @if (session('error'))
                                                <div class="alert alert-danger">
                                                    {{ session('error') }}
                                                </div>
                                                @endif 
                                                @if (session('success'))
                                                <div class="alert alert-success">
                                                    {{ session('success') }}
                                                </div>
                                                @endif

                                                    <div class="form-group col-xs-12 col-md-12">
                                                        <label class="col-form-label">Oude wachtwoord</label>
                                                        <input class="form-control @error('current-password') is-invalid @enderror" name="current-password" value=""
                                                            type="password" required>
                                                    @error('current-password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                    </div>

                                                    <div class="form-group col-xs-12 col-md-12">
                                                        <label class="col-form-label">Nieuw wachtwoord</label>
                                                        <input class="form-control @error('new-password') is-invalid @enderror" name="new-password" value="" type="password"
                                                            required>
                                                    @error('new-password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                    </div>

                                                    <div class="form-group col-xs-12 col-md-12">
                                                        <label class="col-form-label">Bevestig wachtwoord</label>
                                                        <input class="form-control" name="new-password_confirmation"
                                                            type="password" required>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Wijzig wachtwoord</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="card-footer">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('js/postcode.js')}}"></script>

@endsection