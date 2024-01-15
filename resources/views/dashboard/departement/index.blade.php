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
                    <h1 class="text-bold">DATA <small>Departemen</small></h1>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md">
                    <div class="card">
                        <div class="card-header card-top">
                            <h3 class="card-title text-center">Tambah Data <small>Departemen</small></h3>
                        </div>

                        <form id="quickForm" method="POST" action="{{ route('dashboard.departement.store') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Kode Departemen :</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="code" id="code" value=""
                                            class="form-control" placeholder="Masukkan Kode Departemen">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Nama Departemen :</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="name" id="department" value=""
                                            class="form-control" placeholder="Masukkan Nama Departemen">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Warna Departemen :</label>
                                    <div class="col-sm-10">
                                        <input type="color" class="form-control form-control-color p-2 pt-0"
                                            name="options" value="#563d7c" title="Choose your color">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <a href="https://hris.applikasi.cloud/department" type="button"
                                    class="btn btn-secondary">Batal</a>
                                <button type="submit" name="departmentAdd" value="department-add"
                                    class="btn bg-btn text-dark">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-top">
                            <h3 class="card-title text-center">Tabel <small>Departemen</small></h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="departmentTable"
                                    class="department-table table table-striped table-bordered table-hover row-12 w-100">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col" width="8%">Kode</th>
                                            <th scope="col" width="8%">Warna</th>
                                            <th scope="col">Departemen</th>
                                            <th scope="col" width="12%">Total Karyawan</th>
                                            <th scope="col">Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (count($data) < 1)
                                            <tr>
                                                <td colspan="6" class="dataTables_empty">Loading...</td>
                                            </tr>
                                        @else
                                            @foreach ($data as $key => $departement)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $departement->code }}</td>
                                                    <td>
                                                        <div
                                                            style="background-color: {{ $departement->options }};width: 80px;height: 20px;border-radius: 5px;">
                                                        </div>
                                                    </td>
                                                    <td>{{ $departement->name }}</td>
                                                    <td></td>
                                                    <td class=" align-middle user-select-all p-1">
                                                        <div class="btn-group dropleft user-select-none">
                                                            <button type="button"
                                                                class="btn btn-xs btn-secondary dropdown-toggle"
                                                                data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">
                                                                Opsi
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item text-success"
                                                                    href="https://hris.applikasi.cloud/department/info/23">
                                                                    <i class="fas fa-check-circle"></i> Info
                                                                </a>
                                                                <a class="dropdown-item text-primary" href="#"
                                                                    data-toggle="modal" data-target="#edit_dp"
                                                                    data-departmentid="23" data-code="CS"
                                                                    data-department="Cleaning Service"
                                                                    data-backgroundcolor="#07575F">
                                                                    <i class="fas fa-edit"></i> Ubah Data
                                                                </a>
                                                                <div class="dropdown-divider"></div>
                                                                <a class="dropdown-item text-danger delete-department"
                                                                    href="#" data-id="23"
                                                                    data-title="Cleaning Service">
                                                                    <i class="fas fa-trash"></i> Hapus Data
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="modal fade" id="edit_dp" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title m-auto" id="exampleModalLabel"><b>Edit Departemen</b></h5>
                </div>
                <div class="modal-body">
                    <form id="quickForm" action ="" method = "POST" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">ID Departemen :</label>
                                <div class="col-sm-9">
                                    <input type="text" name="departmentID" class="form-control" id="departmentID"
                                        readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Kode Departemen :</label>
                                <div class="col-sm-9">
                                    <input type="text" name="code" class="form-control" id="kode"
                                        placeholder="Masukkan Kode Departemen">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Nama Departemen :</label>
                                <div class="col-sm-9">
                                    <input type="text" name="department" class="form-control" id="departemen"
                                        placeholder="Masukkan Nama Departemen">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Warna Departemen :</label>
                                <div class="col-sm-9">
                                    <div class="input-group department-colorpicker-edit">
                                        <input type="text" name="backgroundColor" class="form-control" readonly
                                            placeholder="Pilih Warna Departemen">
                                        <div class="input-group-append">
                                            <span class="input-group-text p-0"><i class="fas fa-square fa-2x"
                                                    style="padding: 2px;"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="button" id="update-department" name="update-department" value="department-update"
                        class="btn bg-btn">Perbarui</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
@endsection
