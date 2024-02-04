@extends('layouts.app')
@section('page', 'Surat Peringatan')

@section('content')
    <style type="text/css">
        .dataTables_empty {
            font-size: 15px !important;
        }
    </style>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col">
                    <div class="d-flex justify-content-between">
                        <h1 class="text-bold">SURAT <small>Peringatan</small></h1>
                        <div class="btn float-right" style="height: 50px;">
                            <a href="" class="btn bg-btn btn-sm text-color" data-toggle="modal"
                                data-target="#warningletter">
                                <i class="fas fas fa-plus-circle"></i> Tambah Surat Peringatan
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
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-top">
                            <h3 class="card-title text-center text-color">Tabel Surat <small>Peringatan</small></h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="warningletterTable"
                                    class="warningletter-table table table-bordered table-hover row-12 w-100">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Nama Karyawan</th>
                                            <th scope="col">Peringatan</th>
                                            <th scope="col" width="16%">Menghadap HRD</th>
                                            <th scope="col" width="7%">Perihal</th>
                                            <th scope="col" width="12%">Tanggal Selesai</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (count($data) < 1)
                                            <tr>
                                                <td colspan="7" class="dataTables_empty">Loading...</td>
                                            </tr>
                                        @else
                                            @foreach ($data as $key => $dt)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $dt->employee->fullname }}</td>
                                                    <td>{{ Str::limit($dt->note, 20) }}</td>
                                                    <td>{{ $dt->hrd_meet_start }}</td>
                                                    <td>{{ $dt->about }}</td>
                                                    <td>{{ $dt->hrd_meet_end }}</td>
                                                    <td>
                                                        <button type="button"
                                                            class="btn btn-xs btn-secondary dropdown-toggle"
                                                            data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            Opsi
                                                        </button>
                                                        <div class="dropdown-menu mt-5">
                                                            <a class="dropdown-item text-success"
                                                                href="{{ route('dashboard.notice.user', $dt->id_employee) }}">
                                                                <i class="fas fa-history"></i> Riwayat Karyawan
                                                            </a>
                                                            <a class="dropdown-item text-dark"
                                                                href="{{ route('dashboard.notice.prihal', $dt->about) }}">
                                                                <i class="fas fa-arrow-right"></i> Prihal Serupa
                                                            </a>
                                                            <a class="dropdown-item text-primary"
                                                                href="{{ route('dashboard.notice.edit', $dt->id) }}">
                                                                <i class="fas fa-edit"></i> Ubah Data
                                                            </a>
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item text-danger delete-department"
                                                                href="{{ route('dashboard.notice.destroy', $dt->id) }}"
                                                                data-id="23" data-title="Cleaning Service">
                                                                <i class="fas fa-trash"></i> Hapus Data
                                                            </a>
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

    <form class="modal fade" id="warningletter" role="dialog" method="POST"
        action="{{ route('dashboard.notice.store') }}">
        @csrf
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header" style="display:unset">
                    <h4 class="modal-title d-flex justify-content-center" id="warningletterModalLabel">
                        <b>Tambah Surat Peringatan</b>
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="addSuratperingatan-notif"></div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Nama Karyawan</label>
                        <div class="col-sm-9">
                            <select name="id_employee" class="form-control" id="id_employee">
                                <option value="0" selected="selected">--Pilih--</option>
                                @foreach ($employees as $key => $employee)
                                    <option value="{{ $employee->id }}">{{ $employee->fullname }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Peringatan</label>
                        <div class="col-sm-9">
                            <textarea name="note" id="note" class="form-control" value="" placeholder="Masukkan Peringatan"></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Tanggal Ke HRD</label>
                        <div class="col-sm-9">
                            <div class="input-group date" id="facingDate" data-target-input="nearest">
                                <input type="date" name="hrd_meet_start" class="form-control datetimepicker-input"
                                    data-target="#hrd_meet_start" data-toggle="hrd_meet_start" />
                                <div class="input-group-append" data-target="#facingDate" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Perihal</label>
                        <div class="col-sm-9">
                            <select name="about" class="form-control" id="about">
                                <option value="SP 1" selected="selected">SP 1</option>
                                <option value="SP 2">SP 2</option>
                                <option value="SP 3">SP 3</option>
                                <option value="Skorsing">Skorsing</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Tanggal Selesai</label>
                        <div class="col-sm-9">
                            <div class="input-group date" id="completionDate" data-target-input="nearest">
                                <input type="date" name="hrd_meet_end" class="form-control datetimepicker-input"
                                    data-target="#hrd_meet_end" data-toggle="hrd_meet_end" />
                                <div class="input-group-append" data-target="#completionDate"
                                    data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" id="create-warningletter" name="create-warningletter"
                            class="btn bg-btn text-color">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('javascript')
@endsection
