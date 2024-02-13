@extends('layouts.app')
@section('page', 'Scoring Kinerja')

@section('content')
    <style type="text/css">
        .dataTables_empty {
            font-size: 15px !important;
        }

        input[type="radio"] {
            font-size: 10px !important;
            width: 20px !important;
            height: 20px !important;
            cursor: pointer;
        }

        .thead-score {
            font-size: 13px !important;
            font-weight: 400 !important;
            text-align: center !important;
            width: 80px !important;
            padding: 0px 0px 10px 0px !important;
        }

        @media only screen and (max-width: 767px) {
            .thead-score {
                font-size: 13px !important;
                font-weight: 400 !important;
                text-align: center !important;
                width: 15% !important;
                padding: 0px 0px 10px 0px !important;
            }
        }
    </style>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col">
                    <div class="d-flex justify-content-between">
                        <h1 class="text-bold">SCORING <small>Kinerja</small></h1>
                        <div class="btn float-right" style="height: 50px;">
                            <a href="" class="btn bg-btn btn-sm text-color" data-toggle="modal"
                                data-target="#scoring">
                                <i class="fas fas fa-plus-circle"></i> Tambah Scoring Kinerja
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
                            <h3 class="card-title text-center text-color">Tabel Scoring <small>Kinerja</small></h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="warningletterTable"
                                    class="warningletter-table table table-bordered table-hover row-12 w-100">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Nama Karyawan</th>
                                            <th scope="col" class="text-center">Bulan</th>
                                            <th scope="col" width="16%" class="text-center">Score</th>
                                            <th scope="col" class="text-center">Penilai</th>
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
                                                    <td class="text-center">{{ $dt->month }}</td>
                                                    <td class="text-center">{{ $dt->score }} / 100</td>
                                                    <td class="text-center">{{ $dt->createdByUser->fullname }}</td>
                                                    <td>
                                                        <button type="button"
                                                            class="btn btn-xs btn-secondary dropdown-toggle"
                                                            data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            Opsi
                                                        </button>
                                                        <div class="dropdown-menu mt-5">
                                                            <a class="dropdown-item text-primary"
                                                                href="{{ route('dashboard.notice.index') }}">
                                                                <i class="fas fa-exclamation-circle"></i> Surat Peringatan
                                                            </a>
                                                            <a class="dropdown-item text-success"
                                                                href="{{ route('dashboard.score.user', $dt->id_employee) }}">
                                                                <i class="fas fa-history"></i> Riwayat Karyawan
                                                            </a>
                                                            <a class="dropdown-item text-dark"
                                                                href="{{ route('dashboard.score.month', $dt->month) }}">
                                                                <i class="fas fa-arrow-right"></i> Priode Serupa
                                                            </a>
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item text-danger delete-department"
                                                                href="{{ route('dashboard.score.destroy', $dt->id) }}"
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

    <div class="modal fade" id="scoring" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header" style="display:unset">
                    <h4 class="modal-title d-flex justify-content-center" id="warningletterModalLabel">
                        <b>TAMBAH SCORE KINERJA</b>
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="addSuratperingatan-notif"></div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Jenis Penilaian</label>
                        <div class="col-sm-9">
                            <select name="scoring_type" class="form-control" id="scoring_type">
                                @if (Auth::user()->id_jabatan == 5)
                                    <option value="1" selected="selected">Sesama Rekan Kerja</option>
                                @else
                                    <option value="0" selected="selected">--Pilih--</option>
                                    <option value="1">Sesama Rekan Kerja</option>
                                    <option value="2">Terhadap Bawahan</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="button" id="next-scoring" name="next-scoring"
                            class="btn bg-btn text-color">Selanjutnya</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script type="text/javascript">
        $('#next-scoring').click(function() {
            const selected = $('#scoring_type').val();
            if (selected == 1) {
                window.location.href = '{{ route('dashboard.score.same') }}';
            } else if (selected == 2) {
                window.location.href = '{{ route('dashboard.score.different') }}';
            }
        });
    </script>
@endsection
