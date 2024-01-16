@extends('layouts.app')
@section('page', 'Jabatan Edit')

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
                            <h3 class="card-title text-center">Edit Data <small>Jabatan</small></h3>
                        </div>

                        <form id="quickForm" method="POST" action="{{ route('dashboard.jabatan.update', $data->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Nama Jabatan :</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="name" id="jabatan" value="{{ $data->name }}"
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
            </div>
        </div>
    </div>
@endsection

@section('javascript')
@endsection
