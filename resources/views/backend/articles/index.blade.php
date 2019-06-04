@extends('layouts.backend.master')

@section('body')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-success">
                <h4 class="card-title ">Nieuwsberichten</h4>
                <p class="card-category">Overzicht van alle nieuwsberichten</p>
            </div>
            <div class="card-body">
                <form method="POST" class="form-horizontal" enctype="multipart/form-data"
                    action="{{ route('dashboard.articles.delete') }}" >
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
                                <th>Titel</th>
                                <th>Categorie</th>
                                <th>Aangemaakt door</th>
                                <th>Datum</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($articles as $article)
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="articles[]" value="{{$article->id}}">
                                        <span class="form-check-sign">
                                            <span class="check"></span>
                                        </span>
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    {{$article->title}}
                                </td>
                                <td>
                                    {{$article->category}}
                                </td>
                                <td>
                                @if($article->user != null)
                                    {{$article->user->customer->name}}
                                @endif
                                </td>
                                <td>
                                    {{$article->created_at}}
                                </td>
                                <td>
                                    <a href="{{route('dashboard.articles.edit', ['id' => $article->id])}}" class="delete">
                                    <i class="material-icons text-black">edit</i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <button type="submit" class="btn btn-danger float-right">Verwijder geselecteerde</button>
                <a href="{{route('dashboard.articles.create')}}" class="btn btn-success float-right" style="" href="#">Nieuwsbericht maken</a>
                </form>
                {{ $articles->links() }}
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
        message: "{{ Session::get('message') }} <a href='{{route('dashboard.articles.edit', ['id' => Session::get('new-id')])}}' class='text-ahref'>Bekijken</a>"

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