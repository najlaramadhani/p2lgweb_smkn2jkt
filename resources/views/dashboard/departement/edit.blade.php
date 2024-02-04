@extends('layouts.app')
@section('page', 'Departement Edit')

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
                            <h3 class="card-title text-center text-color">Edit Data <small>Departemen</small></h3>
                        </div>

                        <form id="quickForm" method="POST" action="{{ route('dashboard.departement.update', $data->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Kode Departemen :</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="code" id="code" value="{{ $data->code }}"
                                            class="form-control" placeholder="Masukkan Kode Departemen">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Nama Departemen :</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="name" id="department" value="{{ $data->name }}"
                                            class="form-control" placeholder="Masukkan Nama Departemen">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Warna Departemen :</label>
                                    <div class="col-sm-10">
                                        <input type="color" class="form-control form-control-color p-2 pt-0"
                                            name="options" value="{{ $data->options }}" title="Choose your color">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <a href="{{ route('dashboard.departement.index') }}" type="button"
                                    class="btn btn-secondary">Batal</a>
                                <button type="submit" name="departmentAdd" value="department-add"
                                    class="btn bg-btn text-color">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
@endsection
