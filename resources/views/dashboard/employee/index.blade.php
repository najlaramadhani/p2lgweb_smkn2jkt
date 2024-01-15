@extends('layouts.app')
@section('page', 'Employee')

@section('content')
    <style type="text/css">
        .dataTables_empty {
            font-size: 15px !important;
        }
    </style>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm">
                    <div class="d-flex justify-content-between">
                        <h1 class="text-bold">DATA <small>Karyawan</small></h1>
                        <div class="btn float-right" style="height: 50px;">
                            <a href="#" class="btn bg-btn btn-sm px-3 py-2 text-dark">
                                <i class="fas fa-file-excel px-2"></i> Export
                            </a>
                            <a href="{{ route('dashboard.employee.create') }}"
                                class="btn bg-btn btn-sm px-3 py-2 text-dark">
                                <i class="fas fa-plus-circle px-2"></i>
                                <span class="d-none d-md-inline white-space-no-wrap">Tambah Data Karyawan</span>
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
                <div class="col-12">
                    <div class="card">
                        <div class="card-header card-top">
                            <h3 class="card-title text-center">Tabel <small>Karyawan</small></h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="employeeTable"
                                    class="employee-table table table-bordered table-hover row-12 w-100">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col" width="13%">NIK</th>
                                            <th scope="col">Nama Lengkap</th>
                                            <th scope="col">Nama Panggilan</th>
                                            <th scope="col">Jabatan</th>
                                            <th scope="col" width="11%">Tanggal Masuk</th>
                                            <th scope="col">Departemen</th>
                                            <th scope="col" width="11%">Tipe</th>
                                            <th scope="col" width="8%">Status</th>
                                            <th scope="col">Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td colspan="10" class="dataTables_empty">Loading...</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
@endsection
