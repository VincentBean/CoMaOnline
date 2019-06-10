@extends('layouts.backend-customer.master')

@section('body')

<h3>Welkom {{Auth::user()->customer->fullName()}},</h3>
<div class="row">
    <div class="col-md-6">
        <form method="POST" class="form-horizontal" enctype="multipart/form-data"
            action="{{ route('dashboard.users.edit', ['id' => $user->id]) }}" >
            @csrf
            <input type="hidden" name="_method" value="put">
            <div class="card">
                <div class="card-header card-header-success">
                    <h4 class="card-title">Wijzig gebruiker: {{$user->customer->fullName()}}</h4>
                    <p class="card-category"></p>
                </div>
                <div class="card-body ">

                    <div class="row mb-2">
                        <div class="col-sm-6">
                            @if($errors->first('name'))
                            <p class="text-danger">
                            {{$errors->first('name')}}
                            </p>
                            @endif
                            <div class="form-group bmd-form-group is-filled">
                                <input class="form-control" name="name" value="{{$user->customer->name}}" type="text"
                                required>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            @if($errors->first('surname'))
                            <p class="text-danger">
                            {{$errors->first('surname')}}
                            </p>
                            @endif
                            <div class="form-group bmd-form-group is-filled">
                                <input class="form-control" name="surname" value="{{$user->customer->surname}}" type="text" 
                                required>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-6">
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

                    <div class="row mb-2">
                        <div class="col-md-12">
                            @if($errors->first('email'))
                            <p class="text-danger">
                            {{$errors->first('email')}}
                            </p>
                            @endif
                            <input id="email" type="email" class="form-control" name="email" value="{{$user->email}}"
                            placeholder="E-mail" required>
                        </div>
                    </div>

                    
                    <div class="row mb-2">
                        <div class="col-md-12">
                            @if($errors->first('phone'))
                            <p class="text-danger">
                            {{$errors->first('phone')}}
                            </p>
                            @endif
                            <input id="phone" type="text" class="form-control" name="phone" value="{{$user->customer->phone}}"
                            placeholder="Telefoonnummer" required>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-6">
                            @if($errors->first('zipcode'))
                            <p class="text-danger">
                            {{$errors->first('zipcode')}}
                            </p>
                            @endif
                            <input id="zipcode" type="text" class="form-control" name="zipcode" value="{{$user->customer->zipcode}}"
                            placeholder="Postcode" required>
                        </div>
                        <div class="col-md-6">
                            @if($errors->first('house_number'))
                            <p class="text-danger">
                            {{$errors->first('house_number')}}
                            </p>
                            @endif
                            <input id="house_number" type="text" class="form-control" name="house_number" value="{{$user->customer->house_number}}"
                            placeholder="Huisnummer" required>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-12">
                            @if($errors->first('street_name'))
                            <p class="text-danger">
                            {{$errors->first('street_name')}}
                            </p>
                            @endif
                            <input id="street_name" type="text" class="form-control" name="street_name" value="{{$user->customer->street_name}}"
                            placeholder="Straatnaam" required focus>

                            <div id="street_loader" class="icon-container d-none">
                            <i class="loader"></i>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-12">
                            @if($errors->first('city'))
                            <p class="text-danger">
                            {{$errors->first('city')}}
                            </p>
                            @endif
                            <input id="city" type="text" class="form-control" name="city" value="{{$user->customer->city}}"
                            placeholder="Stad" required>

                            <div id="city_loader" class="icon-container d-none">
                            <i class="loader"></i>
                            </div>
                        </div>
                    </div> 

                    <input type="hidden" name="disabled" value="0" />
                    <div class="form-check mt-3">
                        <label class="form-check-label">Deactiveer account
                        <input class="form-check-input" type="checkbox" name="disabled" {{$user->disabled == '1' ? 'checked' : ''}} value="1">
                        <span class="form-check-sign">
                            <span class="check"></span>
                        </span>
                        </label>
                    </div>

                   
                    
                    <input type="hidden" id="province" name="province" value="{{$user->customer->province}}">

                    <div class="row mb-2">
                        
                        <div class="col-sm-7">
                            <div class="form-group bmd-form-group">
                                <button type="submit" class="btn btn-primary">Opslaan</button>
                                <a href="{{route('dashboard.users')}}" class="orange">Terug naar overzicht</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>
    <div class="col-md-6">
        <div class="card">
            <form method="POST" class="form-horizontal" enctype="multipart/form-data"
            action="{{ route('dashboard.users.role', ['id' => $user->id]) }}" >
            @csrf
                <input type="hidden" name="_method" value="put">
                <div class="card-header card-header-success">
                    <h4 class="card-title">Wijzig Rol</h4>
                    <p class="card-category"></p>
                </div>
                <div class="card-body ">
                    <div class="form-group row">
                        <div class="col-md-12">
                            <h3>Huidige rol(len): @foreach($userRoles as $role) {{__('general.' . $role)}}  @endforeach</h3>
                            <select class="form-control" style="width: 100%" name="role" id="users">
                            @foreach($roles as $role)
                                <option value="{{$role->name}}">{{__('general.' . $role->name)}}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>                     
                    <div class="col-sm-7">
                        <div class="form-group bmd-form-group">
                            <button type="submit" name="update" class="btn btn-primary">Opslaan</button>
                            <button type="submit" name="delete" class="btn btn-danger">Verwijder rol</button>
                        </div>
                    </div>
                </div>
            </form>
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
<script src="{{asset('js/postcode.js')}}"></script>
@endsection
@endsection