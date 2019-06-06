@extends('layouts.backend.master')

@section('body')
<h3>Welkom {{Auth::user()->customer->fullName()}},</h3>
<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">account_circle</i>
                </div>
                <p class="card-category">Klanten</p>
                <h3 class="card-title">
                {{$users->count()}}
                </h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons text-secondary">arrow_forward</i>
                    <a href="{{route('dashboard.users')}}">Bekijk alle klanten</a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">library_books</i>
                </div>
                <p class="card-category">Nieuwsberichten</p>
                <h3 class="card-title">
                {{$articles->count()}}
                </h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons text-secondary">arrow_forward</i>
                    <a href="{{route('dashboard.articles')}}">Bekijk alle nieuwsberichten</a>
                </div>
            </div>
        </div>
    </div>

        <div class="col-lg-6 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">store</i>
                </div>
                <p class="card-category">Omzet</p>
                <h3 class="card-title">€34,245</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons">date_range</i> Laatste 24 uur
                </div>
            </div>
        </div>
    </div>
</div>



<div class="row">

    <div class="col-lg-6 col-md-12">
        <div class="card">
            <div class="card-header card-header-warning">
                <h4 class="card-title">Meest recente gebruikers</h4>
                <p class="card-category">De 5 nieuwste accounts</p>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-hover">
                    <thead class="text-warning">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Provincie</th>
                        </tr>
                    </thead>
                    <tbody>
                    @for($i = 0; $i < 0; $i++)
                        <tr class="cursor-pointer" onclick="window.location.href = '{{route('dashboard.users.edit', ['id' => $users[$i]->id])}}'">
                            <td>{{$users[$i]->id}}</td>
                            <td>{{$users[$i]->customer->fullName()}}</td>
                            <td>{{$users[$i]->email}}</td>
                            <td>{{$users[$i]->customer->province}}</td>
                        </tr>
                    @endfor
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection