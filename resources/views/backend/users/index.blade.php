@extends('layouts.backend.master')

@section('body')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-success">
                <h4 class="card-title ">Gebruikers</h4>
                <p class="card-category">Overzicht van alle gebruikers</p>
            </div>
            <div class="card-body">
                <form method="POST" class="form-horizontal" enctype="multipart/form-data"
                    action="{{ route('dashboard.users.delete') }}" >
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
                                <th>Volledige naam</th>
                                <th>E-mail</th>
                                <th>Account status</th>
                                <th>Aangemaakt</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" name="users[]" value="{{$user->id}}">
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        {!!$user->customer != null ? $user->customer->fullName() : 
                                        '<div class="text-danger font-weight-bold">Geen klantgegevens bekend</div>'!!}
                                    </td>
                                    <td>
                                        {{$user->email}}
                                    </td>
                                    <td>
                                    @if($user->disabled)
                                        <i class="material-icons text-danger">block</i>
                                    @else
                                        <i class="material-icons text-success">check_circle_outline</i>
                                    @endif
                                    </td>
                                    <td>
                                        {{$user->created_at}}
                                    </td>
                                    <td>
                                        <a href="{{route('dashboard.users.edit', ['id' => $user->id])}}" class="delete">
                                        <i class="material-icons text-black">edit</i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <button type="submit" class="btn btn-danger float-right">Verwijder geselecteerde</button>
                <a href="{{route('dashboard.users.create')}}" class="btn btn-success float-right" style="" href="#">Gebruiker maken</a>
                </form>
                {{ $users->links() }}
            </div>
        </div>
    </div>
</div>

<script>
$('#select_all').click(function() {
    var c = this.checked;
    $(':checkbox').prop('checked',c);
});
</script>

@if(Session::has('message'))
<script>
   function showNotification(from, align) {
        color = 'success';

        $.notify({
        icon: "add_alert",
        message: "{{ Session::get('message') }} <a href='{{route('dashboard.user.edit', ['id' => Session::get('new-id')])}}' class='text-ahref'>Bekijken</a>"

        }, {
        type: color,
        timer: 3000,
        placement: {
            from: from,
            align: align
        }
        });
    };  
$(document).ready( function () {
showNotification('top', 'left');
});
</script>
@endif
@endsection