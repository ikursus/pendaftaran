@extends('layouts/app')

@section('content')

<a href="/users/create" class="btn btn-primary">
TAMBAH USER
</a>

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
        </td>
    </tr>
    @endforeach

</tbody>

<table>

@endsection