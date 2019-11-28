@extends('layouts/app')

@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Senarai Faculty') }}</div>

                <div class="card-body">


<table class="table" id="datatables">

<thead>
    <tr>
        <th>#</th>
        <th>NAMA</th>
        <th>TINDAKAN</th>
    </tr>
</thead>

</table>

<p class="text-right">
<a href="/faculty/create" class="btn btn-primary btn-sm">
TAMBAH FACULTY</a>
</p>

</div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
  $(function () {
    
    var table = $('#datatables').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('faculty.datatables') }}",
        columns: [
            {data: 'DT_RowIndex', orderable: false, searchable: false},
            {data: 'name', name: 'name'},
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ]
    });
    
  });
</script>

@endsection