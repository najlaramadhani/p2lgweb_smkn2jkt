@extends('layouts.app')
@section('page', 'Dashboard')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm">
                    <div class="d-flex justify-content-between">
                        @auth
                            <h1 class="m-0 text-bold">Selamat Datang, {{ Auth::user()->username }}</h1>
                        @endauth
                        <div class="btn float-right" style="height: 50px;">
                            <a href="#" class="btn btn-danger btn-sm">
                                <i class="fas fa-bullhorn"></i>
                                <span class="d-none d-md-inline white-space-no-wrap"
                                    style="font-family:Source Sans Pro"><b>Pengumuman</b></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-4">
                    <div class="card bg-femalehite pb-5 pt-5">
                        <div class="card-body">
                            <h4 class="text-center mt-3 mb-3"><b>Status Karyawan</b></h4>
                        </div>
                        <div class="text-center pb-5">
                            <canvas id="employeeStatusCanvas"
                                style="min-height: 320px; height: 320px; max-height: 320px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8 mb-3">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="small-box bg-female pt-3 pb-3">
                                <div class="text-center">
                                    <img src="{{ asset('/dist/img/female.png') }}" height="45px" width="45px"
                                        class="mt-3">
                                </div>
                                <div class="inner">
                                    <h5 class="text-center mb-0"><b>Karyawan Wanita</b></h5>
                                    <p class="text-center mb-0" style="font-size:30px;"><b class="total-women">0</b></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="small-box bg-male pt-3 pb-3">
                                <div class="text-center">
                                    <img src="{{ asset('/dist/img/male.png') }}" height="45px" width="45px"
                                        class="mt-3">
                                </div>
                                <div class="inner">
                                    <h5 class="text-center mb-0"><b>Karyawan Pria</b></h5>
                                    <p class="text-center mb-0" style="font-size:30px;"><b class="total-men">0</b></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="small-box bg-department pt-3 pb-3">
                                <div class="text-center">
                                    <img src="{{ asset('/dist/img/department.png') }}" height="45px" width="45px"
                                        class="mt-3">
                                </div>
                                <div class="inner">
                                    <h5 class="text-center mb-0"><b>Departemen</b></h5>
                                    <p class="text-center mb-0" style="font-size:30px;"><b class="total-department">0</b>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="card mb-0">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="fas fa-chart-pie mr-1"></i>
                                        <b>Statistic Departemen</b>
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <div class="chart">
                                        <canvas id="barChart"
                                            style="min-height: 280px; height: 280px; max-height: 280px; max-width: 100%;"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script src="{{ asset('/plugins/chart.js/Chart.min.js') }}"></script>
    <script type="text/javascript">
        function employee() {
            const statuses = ["Tetap", "Magang", "Resign"];
            const employeeCount = [50, 20, 10];
            const colors = ['#36A2EB', '#FFCE56', '#FF6384'];

            const ctx = document.getElementById('employeeStatusCanvas').getContext('2d');
            const myChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: statuses,
                    datasets: [{
                        data: employeeCount,
                        backgroundColor: colors
                    }]
                },
                options: {
                    plugins: {
                        legend: {
                            display: true,
                            position: 'bottom'
                        }
                    }
                }
            });
        }

        function departement() {
            var departments = ["Gudang", "Teknisi", "Packing"];
            var memberCount = [3, 2, 1, 0];
            var colors = ['#FF5733', '#3399FF', '#FFCE56'];

            var ctx = document.getElementById('barChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: departments,
                    datasets: [{
                        label: 'Jumlah Anggota',
                        data: memberCount,
                        backgroundColor: colors,
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    },
                    plugins: {
                        legend: {
                            display: true,
                            position: 'top'
                        }
                    }
                }
            });
        }

        employee()
        departement()
    </script>
@endsection
