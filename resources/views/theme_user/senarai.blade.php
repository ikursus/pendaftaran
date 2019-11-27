@extends('layouts/app')

@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Senarai Users') }}</div>

                <div class="card-body">

<p><a href="/users/create" class="btn btn-primary btn-sm">TAMBAH USER</a></p>

<table class="table">

<thead>
    <tr>
        <th>NAMA</th>
        <th>EMAIL</th>
        <th>TINDAKAN</th>
    </tr>
</thead>

<tbody>

    @foreach ($senarai_users as $user)
    <tr>
        <td>{{ $user['nama'] }}</td>
        <td>{{ $user['email'] }}</td>
        <td>
            <a href="/users/{{ $user['id'] }}/edit" class="btn btn-warning btn-sm">
            EDIT
            </a> 
            <button type="button" class="btn btn-danger btn-sm">DELETE</button>
        </td>
    </tr>
    @endforeach

</tbody>

<table>
</div>
            </div>
        </div>
    </div>
</div>

@endsection