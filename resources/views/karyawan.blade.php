@extends('layout.main')
@section('konten')

<div class="container-fluid">

    <div class="content">

        <!-- Content Row -->
        <div class="container-fluid">

            <h1 class="h3 mb-2 text-gray-800">Karyawan</h1>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Table Karyawan</h6>
                    <a id="btnTambahKaryawan" href="#" class="btn btn-primary btn-icon-split btn-sm mt-2"
                        data-toggle="modal" data-target="#modalTambahKaryawan">
                        <span class="icon text-white-50">
                            <i class="fas fa-user-plus"></i>
                        </span>
                        <span class="text">Tambah Karyawan</span>
                    </a>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Nama Lengkap</th>
                                    <th>Alamat</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Nomor Handphone</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody id="munculdata">
                                @foreach($karyawan as $data)
                                <tr>
                                    <td>{{ $data->nama_lengkap }}</td>
                                    <td>{{ $data->alamat }}</td>
                                    <td>{{ $data->tanggal_lahir }}</td>
                                    <td>{{ $data->nomor_handphone }}</td>
                                    <td>{{ $data->email }}</td>

                                    <td>
                                        <a href="{{ asset('storage/' . $data->dokumen) }}" target="_blank"
                                            class="btn btn-info mr-2">
                                            <i class="fas fa-file"></i>
                                        </a>

                                        <a href="#" class="btn btn-danger delete-karyawan " data-id="{{ $data->id }}">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>

                            <tfoot>
                                <tr>
                                    <th>Nama Lengkap</th>
                                    <th>Alamat</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Nomor Handphone</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>



</div>

<div class="modal fade" id="modalTambahKaryawan" tabindex="-1" role="dialog" aria-labelledby="modalTambahKaryawanLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTambahKaryawanLabel">Tambah Karyawan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formTambahKaryawan">
                    <div class="form-group">
                        <div class="form-group">
                            <label for="id_jabatan">Jabatan</label>
                            <select class="form-control" id="jabatan" name="id_jabatan" required>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="id_departmen">Departemen</label>
                            <select class="form-control" id="Department" name="id_departmen" required>
                            </select>
                        </div>
                        <label for="nama_lengkap">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" required>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
                    </div>
                    <div class="form-group">
                        <label for="nomor_handphone">Nomor Handphone</label>
                        <input type="number" class="form-control" id="nomor_handphone" name="nomor_handphone" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="dokumen">Dokumen</label>
                        <input type="file" class="form-control-file" id="dokumen" name="dokumen" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" id="btnSimpan">Simpan</button>
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


{{-- <script>
    $(document).ready(function () {
    var csrfToken = $('meta[name="csrf-token"]').attr('content');

    $('.btn-edit').on('click', function () {
        var karyawanId = $(this).data('id');
        $.ajax({
            url: '/detail-karyawan/' + karyawanId,
            type: 'GET',
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            success: function (response) {
                var karyawan = response.data;
                $('#modalTambahKaryawanLabel').text('Edit Karyawan');
                $('#id_jabatan').val(karyawan.id_jabatan);
                $('#id_departmen').val(karyawan.id_departmen);
                $('#nama_lengkap').val(karyawan.nama_lengkap);
                $('#alamat').val(karyawan.alamat);
                $('#tanggal_lahir').val(karyawan.tanggal_lahir);
                $('#nomor_handphone').val(karyawan.nomor_handphone);
                $('#email').val(karyawan.email);
                $('#dokumen').val('');
                $('#btnSimpan').data('id', karyawanId);
                $('#modalTambahKaryawan').modal('show');
            },
            error: function (xhr, status, error) {
                console.error(xhr);
            }
        });
    });

    $('#btnSimpan').on('click', function () {
        var karyawanId = $(this).data('id');
        var formData = new FormData($('#formTambahKaryawan')[0]);
        $.ajax({
            url: '/update-karyawan/' + karyawanId,
            type: 'PUT',
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            success: function (response) {
                alert(response.message);
                $('#modalTambahKaryawan').modal('hide');
                // Refresh halaman atau update tampilan data karyawan
            },
            error: function (xhr, status, error) {
                console.error(xhr);
                alert('Gagal memperbarui data karyawan');
            }
        });
    });
});

</script> --}}

<script>
    $(document).ready(function() {
        $('.delete-karyawan').click(function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            if (confirm('Apakah Anda yakin ingin menghapus karyawan ini?')) {
                $.ajax({
                    url: '/api/delete-karyawan/' + id,
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        alert('Karyawan berhasil dihapus.');
                        window.location.reload();
                    },
                    error: function(xhr) {
                        alert('Gagal menghapus karyawan.');
                    }
                });
            }
        });
    });
</script>

<script>
    $(document).ready(function () {
        var csrfToken = $('meta[name="csrf-token"]').attr('content');

        $('#btnTambahKaryawan').click(function () {
            $('#modalTambahKaryawan').modal('show');
        });

        $('#btnSimpan').click(function () {
            var formData = new FormData($('#formTambahKaryawan')[0]);
            formData.append('department_id', $('#Department').val());
            formData.append('jabatan_id', $('#jabatan').val());
            
            $.ajax({
                url: '/api/create-karyawan',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    alert('Data karyawan berhasil disimpan');
                    $('#modalTambahKaryawan').modal('hide');
                    // location.reload();
                },
                error: function (xhr, status, error) {
                    alert('Gagal menyimpan data karyawan');
                    console.error(xhr.responseText);
                }
            });
        });

        var dropdownDepartemen = $('#Department');
        if (!dropdownDepartemen.length) {
            console.error('Dropdown Departemen tidak ditemukan');
            return;
        }
        dropdownDepartemen.empty();
        dropdownDepartemen.append($('<option></option>').attr('value', '').attr('disabled', true).attr('selected', true).text('Pilih Departemen'));
        $.ajax({
            url: '/api/data-departmen',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                if (!data) {
                    console.error('Data Departemen tidak ditemukan');
                    return;
                }
                $.each(data, function(key, entry) {
                    if (!entry.nama_departmen) {
                        console.error('Properti nama_departmen tidak ditemukan pada entri', entry);
                        return;
                    }
                    dropdownDepartemen.append($('<option></option>').attr('value', entry.id).text(entry.nama_departmen));
                });
            },
            error: function(error) {
                console.error('Error saat mengambil data Departemen:', error);
            }
        });

        var dropdownJabatan = $('#jabatan');
        if (!dropdownJabatan.length) {
            console.error('Dropdown Jabatan tidak ditemukan');
            return;
        }
        dropdownJabatan.empty();
        dropdownJabatan.append($('<option></option>').attr('value', '').attr('disabled', true).attr('selected', true).text('Pilih Jabatan'));
        $.ajax({
            url: '/api/data-jabatan',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                if (!data) {
                    console.error('Data Jabatan tidak ditemukan');
                    return;
                }
                $.each(data, function(key, entry) {
                    if (!entry.nama_jabatan) {
                        console.error('Properti nama_jabatan tidak ditemukan pada entri', entry);
                        return;
                    }
                    dropdownJabatan.append($('<option></option>').attr('value', entry.id).text(entry.nama_jabatan));
                });
            },
            error: function(error) {
                console.error('Error saat mengambil data Jabatan:', error);
            }
        });
    });
</script>

<script>
    $(document).ready(function() {
    $.ajax({
        url: '/api/data-jabatan',
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            if (!data) {
                console.error('Data jabatan tidak ditemukan');
                return;
            }
            var dropdownJabatan = $('#id_jabatan');
            dropdownJabatan.empty();
            dropdownJabatan.append($('<option></option>').attr('value', '').text('Pilih Jabatan'));
            $.each(data, function(key, entry) {
                dropdownJabatan.append($('<option></option>').attr('value', entry.id).text(entry.nama_jabatan));
            });
        },
        error: function(error) {
            console.error('Error saat mengambil data jabatan:', error);
        }
    });

    $.ajax({
        url: '/api/data-departmen',
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            if (!data) {
                console.error('Data departemen tidak ditemukan');
                return;
            }
            var dropdownDepartmen = $('#id_departmen');
            dropdownDepartmen.empty();
            dropdownDepartmen.append($('<option></option>').attr('value', '').text('Pilih Departemen'));
            $.each(data, function(key, entry) {
                dropdownDepartmen.append($('<option></option>').attr('value', entry.id).text(entry.nama_departmen));
            });
        },
        error: function(error) {
            console.error('Error saat mengambil data departemen:', error);
        }
    });
});

</script>
@endsection