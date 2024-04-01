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
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Office</th>
                                    <th>Age</th>
                                    <th>Start date</th>
                                    <th>Salary</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Office</th>
                                    <th>Age</th>
                                    <th>Start date</th>
                                    <th>Salary</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <tr>
                                    <td>Tiger Nixon</td>
                                    <td>System Architect</td>
                                    <td>Edinburgh</td>
                                    <td>61</td>
                                    <td>2011/04/25</td>
                                    <td>$320,800</td>
                                </tr>
                                <tr>
                                    <td>Garrett Winters</td>
                                    <td>Accountant</td>
                                    <td>Tokyo</td>
                                    <td>63</td>
                                    <td>2011/07/25</td>
                                    <td>$170,750</td>
                                </tr>
                                <tr>
                                    <td>Ashton Cox</td>
                                    <td>Junior Technical Author</td>
                                    <td>San Francisco</td>
                                    <td>66</td>
                                    <td>2009/01/12</td>
                                    <td>$86,000</td>
                                </tr>
                                <tr>
                                    <td>Cedric Kelly</td>
                                    <td>Senior Javascript Developer</td>
                                    <td>Edinburgh</td>
                                    <td>22</td>
                                    <td>2012/03/29</td>
                                    <td>$433,060</td>
                                </tr>

                            </tbody>
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
                            <label for="jabatan">Jabatan</label>
                            <select class="form-control" id="jabatan" name="jabatan" required>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="departmen">Departemen</label>
                            <select class="form-control" id="Department" name="departmen" required>
                            </select>
                        </div>
                        <label for="nama">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
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
                        <input type="text" class="form-control" id="nomor_handphone" name="nomor_handphone" required>
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

<script>
    $(document).ready(function () {
    $('#jabatan').select({
        placeholder: 'Pilih Jabatan',
        ajax: {
            url: '/data-jabatan',
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            id: item.id,
                            text: item.nama_jabatan
                        };
                    })
                };
            },
            cache: true
        }
    });

    // Ketika tombol "Tambah Karyawan" diklik, tampilkan modal
    $('#btnTambahKaryawan').click(function () {
        $('#modalTambahKaryawan').modal('show');
    });

    // Ketika tombol "Simpan" di modal diklik
    $('#btnSimpan').click(function () {
        // Lakukan operasi simpan data di sini
        // Contoh: Simpan data menggunakan AJAX
        $.ajax({
            url: '/api/create-karyawan',
            type: 'POST',
            data: new FormData($('#formTambahKaryawan')[0]),
            processData: false,
            contentType: false,
            success: function (response) {
                // Tampilkan pesan sukses atau lakukan operasi lain
                alert('Data karyawan berhasil disimpan');
                $('#modalTambahKaryawan').modal('hide');
            },
            error: function (xhr, status, error) {
                // Tampilkan pesan error atau lakukan operasi lain
                alert('Gagal menyimpan data karyawan');
                console.error(xhr.responseText);
            }
        });
    });
});

</script>

<script>
    $(document).ready(function() {
    var dropdown = $('#Department');
    if (!dropdown.length) {
        console.error('Dropdown tidak ditemukan');
        return;
    }
    dropdown.empty();
    // Menambahkan opsi default
    dropdown.append($('<option></option>').attr('value', '').attr('disabled', true).attr('selected', true).text('Pilih Departemen'));
    $.ajax({
        url: '/api/data-departmen',
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            if (!data) {
                console.error('Data tidak ditemukan');
                return;
            }
            $.each(data, function(key, entry) {
                if (!entry.nama_departmen) {
                    console.error('Properti nama_departmen tidak ditemukan pada entri', entry);
                    return;
                }
                dropdown.append($('<option></option>').attr('value', entry.nama_departmen).text(entry.nama_departmen));
            });
        },
        error: function(error) {
            console.error('Error saat mengambil data:', error);
        }
    });
});


$(document).ready(function() {
    var dropdown = $('#jabatan');
    if (!dropdown.length) {
        console.error('Dropdown tidak ditemukan');
        return;
    }
    dropdown.empty();
    // Menambahkan opsi default
    dropdown.append($('<option></option>').attr('value', '').attr('disabled', true).attr('selected', true).text('Pilih Jabatan'));
    $.ajax({
        url: '/api/data-jabatan',
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            if (!data) {
                console.error('Data tidak ditemukan');
                return;
            }
            $.each(data, function(key, entry) {
                if (!entry.nama_jabatan) {
                    console.error('Properti nama_jabatan tidak ditemukan pada entri', entry);
                    return;
                }
                dropdown.append($('<option></option>').attr('value', entry.nama_jabatan).text(entry.nama_jabatan));
            });
        },
        error: function(error) {
            console.error('Error saat mengambil data:', error);
        }
    });
});

</script>

@endsection