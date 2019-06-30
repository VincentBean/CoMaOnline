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
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($subscribers as $subscriber)
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="subscribers[]" value="{{$subscriber->id}}">
                                        <span class="form-check-sign">
                                            <span class="check"></span>
                                        </span>
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    {{$subscriber->email}}
                                </td>
                                <td>
                                    {{$subscriber->created_at}}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        </table>
                    </div>
                    <button type="submit" class="btn btn-danger float-right">Verwijder geselecteerde</button>
                    </form>
                </div>
            </div>
        </div>

<script>
$('#select_all').click(function() {
    var c = this.checked;
    $(':checkbox').prop('checked',c);
});
</script>


@endsection