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
                            <a href="" class="btn bg-btn btn-sm text-dark" data-toggle="modal"
                                data-target="#warningletter">
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
                            <h3 class="card-title text-center">Tabel Scoring <small>Kinerja</small></h3>
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
                                                    <td>
                                                        <button type="button"
                                                            class="btn btn-xs btn-secondary dropdown-toggle"
                                                            data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            Opsi
                                                        </button>
                                                        <div class="dropdown-menu mt-5">
                                                            <a class="dropdown-item text-dark"
                                                                href="{{ route('dashboard.score.user', $dt->id_employee) }}">
                                                                <i class="fas fa-arrow-right"></i> Riwayat Karyawan
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

    <form class="modal fade" id="warningletter" role="dialog" method="POST" action="{{ route('dashboard.score.store') }}">
        @csrf
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header" style="display:unset">
                    <h4 class="modal-title d-flex justify-content-center" id="warningletterModalLabel">
                        <b>Tambah Scoring Kinerja</b>
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
                        <label class="col-sm-3 col-form-label">Bulan</label>
                        <div class="col-sm-9">
                            <input type="month" name="month" id="month" class="form-control" />
                        </div>
                    </div>
                    <hr />

                    <div class="form-group">
                        <div class="table-responsive">
                            <table id="warningletterTable"
                                class="warningletter-table table table-bordered table-hover row-12 w-100">
                                <thead>
                                    <tr>
                                        <th scope="col">Question</th>
                                        <th scope="col" class="thead-score">
                                            Buruk</th>
                                        <th scope="col" class="thead-score">
                                            Kurang Baik</th>
                                        <th scope="col" class="thead-score">
                                            Cukup</th>
                                        <th scope="col" class="thead-score">
                                            Baik
                                        </th>
                                        <th scope="col" class="thead-score">
                                            Sangat Baik</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            Seberapa konsisten kehadiran karyawan di tempat kerja selama periode evaluasi
                                            terakhir?
                                        </td>
                                        <td>
                                            <input type="radio" class="form-control mx-auto mt-3" name="one"
                                                value="1" />
                                        </td>
                                        <td>
                                            <input type="radio" class="form-control mx-auto mt-3" name="one"
                                                value="2" />
                                        </td>
                                        <td>
                                            <input type="radio" class="form-control mx-auto mt-3" name="one"
                                                value="3" />
                                        </td>
                                        <td>
                                            <input type="radio" class="form-control mx-auto mt-3" name="one"
                                                value="4" />
                                        </td>
                                        <td>
                                            <input type="radio" class="form-control mx-auto mt-3" name="one"
                                                value="5" />
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            Sejauh mana karyawan mencapai target kinerja yang telah ditetapkan?
                                        </td>
                                        <td>
                                            <input type="radio" class="form-control mx-auto mt-3" name="two"
                                                value="1" />
                                        </td>
                                        <td>
                                            <input type="radio" class="form-control mx-auto mt-3" name="two"
                                                value="2" />
                                        </td>
                                        <td>
                                            <input type="radio" class="form-control mx-auto mt-3" name="two"
                                                value="3" />
                                        </td>
                                        <td>
                                            <input type="radio" class="form-control mx-auto mt-3" name="two"
                                                value="4" />
                                        </td>
                                        <td>
                                            <input type="radio" class="form-control mx-auto mt-3" name="two"
                                                value="5" />
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            Sejauh mana karyawan memberikan kontribusi ide kreatif dalam menjalankan
                                            perkerjaanya?
                                        </td>
                                        <td>
                                            <input type="radio" class="form-control mx-auto mt-3" name="three"
                                                value="1" />
                                        </td>
                                        <td>
                                            <input type="radio" class="form-control mx-auto mt-3" name="three"
                                                value="2" />
                                        </td>
                                        <td>
                                            <input type="radio" class="form-control mx-auto mt-3" name="three"
                                                value="3" />
                                        </td>
                                        <td>
                                            <input type="radio" class="form-control mx-auto mt-3" name="three"
                                                value="4" />
                                        </td>
                                        <td>
                                            <input type="radio" class="form-control mx-auto mt-3" name="three"
                                                value="5" />
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            Sejauh mana kemampuan karyawan dalam mengelola waktu dan menyelesaikan
                                            tugas-tugasnya?
                                        </td>
                                        <td>
                                            <input type="radio" class="form-control mx-auto mt-3" name="four"
                                                value="1" />
                                        </td>
                                        <td>
                                            <input type="radio" class="form-control mx-auto mt-3" name="four"
                                                value="2" />
                                        </td>
                                        <td>
                                            <input type="radio" class="form-control mx-auto mt-3" name="four"
                                                value="3" />
                                        </td>
                                        <td>
                                            <input type="radio" class="form-control mx-auto mt-3" name="four"
                                                value="4" />
                                        </td>
                                        <td>
                                            <input type="radio" class="form-control mx-auto mt-3" name="four"
                                                value="5" />
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            Sejauh mana karyawan berkontribusi dalam menciptakan lingkungan kerja yang
                                            kooperatif?
                                        </td>
                                        <td>
                                            <input type="radio" class="form-control mx-auto mt-3" name="five"
                                                value="1" />
                                        </td>
                                        <td>
                                            <input type="radio" class="form-control mx-auto mt-3" name="five"
                                                value="2" />
                                        </td>
                                        <td>
                                            <input type="radio" class="form-control mx-auto mt-3" name="five"
                                                value="3" />
                                        </td>
                                        <td>
                                            <input type="radio" class="form-control mx-auto mt-3" name="five"
                                                value="4" />
                                        </td>
                                        <td>
                                            <input type="radio" class="form-control mx-auto mt-3" name="five"
                                                value="5" />
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            Sejauh mana karyawan dapat beradaptasi dengan perubahan dalam lingkungan kerja?
                                        </td>
                                        <td>
                                            <input type="radio" class="form-control mx-auto mt-3" name="six"
                                                value="1" />
                                        </td>
                                        <td>
                                            <input type="radio" class="form-control mx-auto mt-3" name="six"
                                                value="2" />
                                        </td>
                                        <td>
                                            <input type="radio" class="form-control mx-auto mt-3" name="six"
                                                value="3" />
                                        </td>
                                        <td>
                                            <input type="radio" class="form-control mx-auto mt-3" name="six"
                                                value="4" />
                                        </td>
                                        <td>
                                            <input type="radio" class="form-control mx-auto mt-3" name="six"
                                                value="5" />
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            Sejauh mana karyawan bertanggung jawab terhadap pekerjaannya?
                                        </td>
                                        <td>
                                            <input type="radio" class="form-control mx-auto mt-3" name="seven"
                                                value="1" />
                                        </td>
                                        <td>
                                            <input type="radio" class="form-control mx-auto mt-3" name="seven"
                                                value="2" />
                                        </td>
                                        <td>
                                            <input type="radio" class="form-control mx-auto mt-3" name="seven"
                                                value="3" />
                                        </td>
                                        <td>
                                            <input type="radio" class="form-control mx-auto mt-3" name="seven"
                                                value="4" />
                                        </td>
                                        <td>
                                            <input type="radio" class="form-control mx-auto mt-3" name="seven"
                                                value="5" />
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            Seberapa efektif komunikasi karyawan dengan rekan kerja dan atasan?
                                        </td>
                                        <td>
                                            <input type="radio" class="form-control mx-auto mt-3" name="eight"
                                                value="1" />
                                        </td>
                                        <td>
                                            <input type="radio" class="form-control mx-auto mt-3" name="eight"
                                                value="2" />
                                        </td>
                                        <td>
                                            <input type="radio" class="form-control mx-auto mt-3" name="eight"
                                                value="3" />
                                        </td>
                                        <td>
                                            <input type="radio" class="form-control mx-auto mt-3" name="eight"
                                                value="4" />
                                        </td>
                                        <td>
                                            <input type="radio" class="form-control mx-auto mt-3" name="eight"
                                                value="5" />
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            Seberapa baik karyawan menangani konflik atau situasi sulit dalam tim atau antar
                                            departemen?
                                        </td>
                                        <td>
                                            <input type="radio" class="form-control mx-auto mt-3" name="nine"
                                                value="1" />
                                        </td>
                                        <td>
                                            <input type="radio" class="form-control mx-auto mt-3" name="nine"
                                                value="2" />
                                        </td>
                                        <td>
                                            <input type="radio" class="form-control mx-auto mt-3" name="nine"
                                                value="3" />
                                        </td>
                                        <td>
                                            <input type="radio" class="form-control mx-auto mt-3" name="nine"
                                                value="4" />
                                        </td>
                                        <td>
                                            <input type="radio" class="form-control mx-auto mt-3" name="nine"
                                                value="5" />
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            Sejauh mana karyawan dapat mengaitkan pekerjaannya dengan pencapaian tujuan
                                            strategis perusahaan?
                                        </td>
                                        <td>
                                            <input type="radio" class="form-control mx-auto mt-3" name="ten"
                                                value="1" />
                                        </td>
                                        <td>
                                            <input type="radio" class="form-control mx-auto mt-3" name="ten"
                                                value="2" />
                                        </td>
                                        <td>
                                            <input type="radio" class="form-control mx-auto mt-3" name="ten"
                                                value="3" />
                                        </td>
                                        <td>
                                            <input type="radio" class="form-control mx-auto mt-3" name="ten"
                                                value="4" />
                                        </td>
                                        <td>
                                            <input type="radio" class="form-control mx-auto mt-3" name="ten"
                                                value="5" />
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" id="create-warningletter" name="create-warningletter"
                            class="btn bg-btn text-dark">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('javascript')
@endsection
