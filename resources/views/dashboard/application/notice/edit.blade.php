@extends('layouts.app')
@section('page', 'Surat Perinagtan Edit')

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
                    <h1 class="text-bold">SURAT <small>Peringatan</small></h1>
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
                            <h3 class="card-title text-center">Edit Surat <small>Peringatan</small></h3>
                        </div>

                        <form method="POST" action="{{ route('dashboard.notice.update', $data->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Nama Karyawan :</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="id_employee" id="id_employee"
                                            value="{{ $employee->fullname }}" class="form-control" readonly>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Peringatan :</label>
                                    <div class="col-sm-10">
                                        <textarea name="note" id="note" class="form-control" value="" placeholder="Masukkan Peringatan">{{ $data->note }}</textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Tanggal Ke HRD :</label>
                                    <div class="col-sm-10">
                                        <div class="input-group date" id="facingDate" data-target-input="nearest">
                                            <input type="date" name="hrd_meet_start"
                                                class="form-control datetimepicker-input" data-target="#hrd_meet_start"
                                                data-toggle="hrd_meet_start" value="{{ $data->hrd_meet_start }}" />
                                            <div class="input-group-append" data-target="#facingDate"
                                                data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Tanggal Selesai :</label>
                                    <div class="col-sm-10">
                                        <div class="input-group date" id="facingDate" data-target-input="nearest">
                                            <input type="date" name="hrd_meet_end"
                                                class="form-control datetimepicker-input" data-target="#hrd_meet_end"
                                                data-toggle="hrd_meet_end" value="{{ $data->hrd_meet_end }}" />
                                            <div class="input-group-append" data-target="#facingDate"
                                                data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Perihal</label>
                                    <div class="col-sm-10">
                                        <select name="about" class="form-control" id="about">
                                            <option value="{{ $data->about }}" selected>{{ $data->about }}</option>
                                            <option value="SP 1">SP 1</option>
                                            <option value="SP 2">SP 2</option>
                                            <option value="SP 3">SP 3</option>
                                            <option value="Skorsing">Skorsing</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <a href="{{ route('dashboard.departement.index') }}" type="button"
                                    class="btn btn-secondary">Batal</a>
                                <button type="submit" name="departmentAdd" value="department-add"
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
