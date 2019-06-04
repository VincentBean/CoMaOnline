@extends('layouts.backend.master')

@section('body')
<div class="row">
<div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-success">
                <h4 class="card-title ">Categorieën</h4>
                <p class="card-category">Overzicht van alle categorieën</p>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="text-primary">
                            <tr>
                                <th>Categorie</th>
                                <th>URL Slug</th>
                                <th>Datum</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                            <tr>
                                <td>
                                    {{$category->name}}
                                </td>
                                <td>
                                    {{$category->slug}}
                                </td>
                                <td>
                                    {{$category->created_at}}
                                </td>
                                <td>
                                    <a href="{{route('dashboard.categories.edit', ['id' => $category->id])}}">
                                    <i class="material-icons text-black">edit</i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $categories->links() }}
            </div>
        </div>
    </div>
</div>

@if(Session::has('message'))
<script>
   function showNotification(from, align) {
        color = 'success';

        $.notify({
        icon: "add_alert",
        message: "{{ Session::get('message') }} <a href='{{route('dashboard.categories.edit', ['id' => Session::get('new-id')])}}' class='text-ahref'>Bekijken</a>"

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