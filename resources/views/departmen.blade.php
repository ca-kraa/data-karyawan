@extends('layout.main')
@section('konten')

<div class="container-fluid">
    <div class="content">
        <div class="container-fluid">
            <h1 class="h3 mb-2 text-gray-800">Departemen</h1>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Table Departemen</h6>
                    <a id="btnTambahDepartmen" href="#" class="btn btn-primary btn-icon-split btn-sm mt-2"
                        data-toggle="modal" data-target="#modalTambahDepartmen">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Tambah Departemen</span>
                    </a>

                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Jabatan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $no = 1;
                                @endphp
                                @foreach($departmen as $data)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $data->nama_departmen }}</td>
                                    <td>

                                        <button class="btn btn-danger btn-delete" data-id="{{ $data->id }}"><i
                                                class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalTambahDepartmen" tabindex="-1" role="dialog"
    aria-labelledby="modalTambahDepartmenTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTambahDepartmenTitle">Tambah Departmen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formTambahDepartmen">
                    <div class="form-group">
                        <label for="nama_departmen">Nama Departmen</label>
                        <input type="text" class="form-control" id="nama_departmen" name="nama_departmen">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btnSimpanDepartmen">Simpan</button>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="{{ asset('assets/sb-admin')}}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('assets/sb-admin')}}/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('assets/sb-admin')}}/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="{{ asset('assets/sb-admin')}}/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('assets/sb-admin')}}/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('assets/sb-admin')}}/js/demo/datatables-demo.js"></script>

<script>
    $('#btnSimpanDepartmen').on('click', function () {
    $.ajax({
        type: 'POST',
        url: '/api/create-departmen',
        data: {
            nama_departmen: $('#nama_departmen').val(),
            _token: '{{ csrf_token() }}'
        },
        success: function (data) {
            location.reload();
            $('#modalTambahDepartmen').modal('hide');
        },
        error: function (data) {
            console.log('Error:', data);
        }
    });
});

$(document).ready(function() {
    $('.btn-delete').on('click', function() {
        var departmenId = $(this).data('id');
        if (confirm('Apakah Anda yakin ingin menghapus departmen ini?')) {
            $.ajax({
                url: '/api/delete-departmen/' + departmenId,
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function(response) {
                    alert('Departmen berhasil dihapus');
                    location.reload();
                },
                error: function(xhr, status, error) {
                    console.error(xhr);
                    alert('Gagal menghapus departmen');
                }
            });
        }
    });
});

</script>
@endsection