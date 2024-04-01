@extends('layout.main')
@section('konten')


<!-- End of Topbar -->

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>

    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Karyawan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><span
                                    id="jumlahkaryawan">Loding...</span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Jabatan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><span
                                    id="jumlahjabatan">Loding...</span></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-scroll fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Departemen
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><span
                                    id="jumlahdepartment">Loding...</span></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
<script src="{{ asset('assets/sb-admin')}}/vendor/jquery/jquery.min.js"></script>
<script src="{{ asset('assets/sb-admin')}}/vendor/jquery/jquery.min.js"></script>
<script src="{{ asset('assets/sb-admin')}}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('assets/sb-admin')}}/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('assets/sb-admin')}}/js/sb-admin-2.min.js"></script>


<script>
    $(document).ready(function(){
            $.ajax({
                url: '/api/hitung-karyawan',
                type: 'GET',
                success: function(response) {
                    $('#jumlahkaryawan').text(response);
                },
                error: function(xhr, status, error) {
                }
            });

            $.ajax({
                url: '/api/hitung-jabatan',
                type: 'GET',
                success: function(response) {
                    $('#jumlahjabatan').text(response);
                },
                error: function(xhr, status, error) {
                }
            });

            $.ajax({
                url: '/api/hitung-department',
                type: 'GET',
                success: function(response) {
                    $('#jumlahdepartment').text(response);
                },
                error: function(xhr, status, error) {
                }
            });
        });

</script>
@endsection