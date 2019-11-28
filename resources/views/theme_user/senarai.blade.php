@extends('layouts/app')

@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Senarai Users') }}</div>

                <div class="card-body">


<table class="table">

<thead>
    <tr>
        <th>NAMA</th>
        <th>EMAIL</th>
        <th>FAKULTY</th>
        <th>TINDAKAN</th>
    </tr>
</thead>

<tbody>

    @foreach ($senarai_users as $user)
    <tr>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->faculty->name ?? "TIADA REKOD" }}</td>
        <td class="text-center">
            <a href="/users/{{ $user->id }}/edit" class="btn btn-warning btn-sm">
            EDIT
            </a>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-delete-{{ $user->id }}">
            DELETE
            </button>

            <!-- Modal -->
            <div class="modal fade" id="modal-delete-{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="/users/{{ $user->id }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Pengesahan Delete</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Adakah anda bersetuju untuk hapuskan data ini?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">CONFIRM</button>
                    </div>
                    </form>
                </div>
            </div>
            </div>






            
                
            

        </td>
    </tr>
    @endforeach

</tbody>

</table>

{{ $senarai_users->links() }}

<p class="text-right">
<a href="/users/create" class="btn btn-primary btn-sm">
TAMBAH USER</a>
</p>

</div>
            </div>
        </div>
    </div>
</div>

@endsection