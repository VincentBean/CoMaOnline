@extends('layouts.frontend.master')
@section('body')
<div class="container-fluid">

    <div class="row">
        <div class="col-lg-8  center mt-3">
            <form method="POST" class="form-horizontal" enctype="multipart/form-data"
            action="{{ route('home.order.moment') }}" >
            @csrf
                <div class="card">
                    @include('layouts.frontend.process')
                        <div class="card-body">
                            <ul class="nav nav-tabs justify-content-center" role="tablist">
                            @php ($i = 0)
                            @foreach($deliverySlots as $deliverySlot)
                                <li class="nav-item">
                                <a class="nav-item nav-link {{$i > 0 ? '' : 'active'}}" data-toggle="tab" 
                                href="#{{__('general.date.' . date('l', strtotime($deliverySlot->date)))}}">
                                {{__('general.date.' . date('l', strtotime($deliverySlot->date)))}}<p class="text-muted small">{{$deliverySlot->date}}</p></a>
                                </li>
                                @php ($i++)
                            @endforeach
                            </ul>

                            
                            <!-- Tab panes -->
                            <div class="tab-content p-3">
                            {{-- Message handler --}}
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                    {{ $error }}
                                    @endforeach
                                </div>
                            @endif
                            @if(session()->has('error'))
                            <div class="alert alert-danger">
                                {{ session()->get('error') }}
                            </div>
                            @endif
                            <h3>Kies bezorgmoment</h3>                    
                                @php ($i = 0)
                                @foreach($deliverySlots as $deliverySlot)
                                    <div id="{{__('general.date.' . date('l', strtotime($deliverySlot->date)))}}"
                                    class="container tab-pane {{$i > 0 ? '' : 'active'}}"><br>
                                        <div class="d-flex justify-content-around">
                                            @foreach($deliverySlot->time_slots as $timeSlot)
                                            <div class="p-2">
                                                <p>{{$timeSlot->getFullTime()}}</p>
                                                <p>€{{$timeSlot->price}}</p>
                                                <label class="btn btn-secondary delivery {{$timeSlot->unavailable ? 'disabled' : ''}}">
                                                    {{$timeSlot->unavailable ? 'Niet beschikbaar' : 'Selecteer'}}
                                                    <input type="radio" class="d-none" name="time_slot_id" value="{{$timeSlot->id}}" autocomplete="off" {{$timeSlot->unavailable ? 'disabled' : ''}}>
                                                </label>                                  
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    @php ($i++)
                                @endforeach
                            <h3>Bezorgadres</h3>    
                            </div>
                        </div>
                </div>
                {{-- end card --}}
                <div class="card-footer">
                    <div class="row">
                        <div class="col-12">
                            <div class="float-right" style="margin: 10px">
                                <h5 class="">Totaal prijs: <small>€{{Cart::total()}}</small></h5>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="float-right" style="margin: 10px">
                                <button type="submit" class="btn btn-primary float-right">Volgende</a>
                            </div>
                            <div class="float-right" style="margin: 10px">
                                <a href="{{route('home.cart')}}" class="btn btn-danger float-right">Stap terug</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
$('.delivery').click(function () {
    $(".delivery").removeClass("active");
    $(this).addClass("active");
 });

</script>
@endsection
