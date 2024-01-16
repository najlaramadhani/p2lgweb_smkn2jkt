@extends('layouts.app')
@section('page', 'Jabatan')

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
                    <h1 class="text-bold">DATA <small>Jabatan</small></h1>
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
                            <h3 class="card-title text-center">Tambah Data <small>Jabatan</small></h3>
                        </div>

                        <form id="quickForm" method="POST" action="{{ route('dashboard.jabatan.store') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Nama Jabatan :</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="name" id="name" value=""
                                            class="form-control" placeholder="Masukkan Nama Jabatan">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <a href="{{ route('dashboard.jabatan.index') }}" type="button"
                                    class="btn btn-secondary">Batal</a>
                                <button type="submit" name="jabatanAdd" value="jabatan-add"
                                    class="btn bg-btn text-dark">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-top">
                            <h3 class="card-title text-center">Tabel <small>Jabatan</small></h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="departmentTable"
                                    class="department-table table table-striped table-bordered table-hover row-12 w-100">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Jabatan</th>
                                            <th scope="col" width="12%">Karyawan</th>
                                            <th scope="col">Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (count($data) < 1)
                                            <tr>
                                                <td colspan="4" class="dataTables_empty">Loading...</td>
                                            </tr>
                                        @else
                                            @foreach ($data as $key => $jabatan)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $jabatan->name }}</td>
                                                    <td class="text-center">{{ $jabatan->employees_count }}</td>
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
                                                                    href="{{ route('dashboard.jabatan.show', $jabatan->id) }}">
                                                                    <i class="fas fa-check-circle"></i> Detail
                                                                </a>
                                                                <a class="dropdown-item text-primary"
                                                                    href="{{ route('dashboard.jabatan.edit', $jabatan->id) }}">
                                                                    <i class="fas fa-edit"></i> Ubah Data
                                                                </a>
                                                                <div class="dropdown-divider"></div>
                                                                <a class="dropdown-item text-danger delete-department"
                                                                    href="{{ route('dashboard.jabatan.destroy', $jabatan->id) }}"
                                                                    data-id="23" data-title="Cleaning Service">
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
@endsection

@section('javascript')
@endsection
