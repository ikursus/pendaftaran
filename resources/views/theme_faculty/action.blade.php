<a href="/faculty/{{ $faculty->id }}/edit" class="btn btn-warning btn-sm">
EDIT
</a>

<!-- Button trigger modal -->
<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-delete-{{ $faculty->id }}">
DELETE
</button>

<!-- Modal -->
<div class="modal fade" id="modal-delete-{{ $faculty->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <form action="/faculty/{{ $faculty->id }}" method="POST">
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