@extends('layout.main')
@section('konten')

<div class="container-fluid">
    <div class="content">
        <div class="container-fluid">
            <h1 class="h3 mb-2 text-gray-800">Jabatan</h1>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Table Jabatan</h6>
                    <a id="btnTambahJabatan" href="#" class="btn btn-primary btn-icon-split btn-sm mt-2"
                        data-toggle="modal" data-target="#modalTambahJabatan">
                        <span class="icon text-white-50">
                            <i class="fas fa-user-secret"></i>
                        </span>
                        <span class="text">Tambah Jabatan</span>
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
                                @foreach($jabatan as $data)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $data->nama_jabatan }}</td>
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


<div class="modal fade" id="modalTambahJabatan" tabindex="-1" role="dialog" aria-labelledby="modalTambahJabatanTitle"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTambahJabatanTitle">Tambah Jabatan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formTambahJabatan">
                    <div class="form-group">
                        <label for="nama_jabatan">Nama Jabatan</label>
                        <input type="text" class="form-control" id="nama_jabatan" name="nama_jabatan">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btnSimpanJabatan">Simpan</button>
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
    $(document).ready(function () {
        $('#btnSimpanJabatan').click(function () {
            $.ajax({
                type: 'POST',
                url: '/api/create-jabatan',
                data: {
                    nama_jabatan: $('#nama_jabatan').val(),
                    _token: '{{ csrf_token() }}'
                },
                success: function (data) {
                    location.reload();
                    $('#modalTambahJabatan').modal('hide');
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        });
    });

    
</script>

<script>
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    $('.btn-edit').on('click', function () {
    var jabatanId = $(this).data('id');
    $.ajax({
        url: '/api/detail-jabatan/' + jabatanId,
        type: 'GET',
        headers: {
            'X-CSRF-TOKEN': csrfToken
        },
        success: function (response) {
            var jabatan = response.data;
            $('#modalEditJabatanLabel').text('Edit Jabatan');
            $('#edit_nama_jabatan').val(jabatan.nama_jabatan);
            $('#btnUpdateJabatan').data('id', jabatanId);
            $('#modalEditJabatan').modal('show');
        },
        error: function (xhr, status, error) {
            console.error(xhr);
        }
    });
});

$('#btnUpdateJabatan').on('click', function () {
    var jabatanId = $(this).data('id');
    var formData = new FormData($('#formEditJabatan')[0]);
    formData.append('nama_jabatan', $('#edit_nama_jabatan').val()); 
    $.ajax({
        url: '/api/update-jabatan/' + jabatanId,
        type: 'PUT',
        data: formData,
        processData: false,
        contentType: false,
        headers: {
            'X-CSRF-TOKEN': csrfToken
        },
        success: function (response) {
            alert(response.message);
            $('#modalEditJabatan').modal('hide');
            location.reload();
        },
        error: function (xhr, status, error) {
            console.error(xhr);
            alert('Gagal memperbarui data jabatan');
        }
    });
});

$('.btn-delete').on('click', function () {
    var jabatanId = $(this).data('id');
    
    if (confirm('Apakah Anda yakin ingin menghapus jabatan ini?')) {
        $.ajax({
            url: '/api/delete-jabatan/' + jabatanId,
            type: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            success: function (response) {
                alert(response.message);
                location.reload();
            },
            error: function (xhr, status, error) {
                console.error(xhr);
                alert('Gagal menghapus data jabatan');
            }
        });
    }
});


</script>

@endsection