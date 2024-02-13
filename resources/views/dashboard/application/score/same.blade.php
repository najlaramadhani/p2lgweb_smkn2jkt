@extends('layouts.app')
@section('page', 'Scoring Kinerja - Sesama Rekan Kerja')

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
    <div class="content-header mt-5">
        <div class="container">
            <div class="row mb-2">
                <div class="col">
                    <div class="d-flex justify-content-between">
                        <h1 class="text-bold">SCORING Kinerja <small>| Sesama Rekan</small></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container">
            <form method="POST" action="{{ route('dashboard.score.sameStore') }}">
                @csrf
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Nama Karyawan</label>
                    <div class="col-sm-9">
                        <select name="id_employee" class="form-control" id="id_employee">
                            <option value="0" selected="selected">--Pilih--</option>
                            @foreach ($employees as $key => $employee)
                                @if ($employee->id_jabatan == Auth::user()->id_jabatan && $employee->id_user != Auth::user()->id)
                                    <option value="{{ $employee->id }}">
                                        {{ $employee->fullname }} | {{ $employee->jabatan->name }} |
                                        {{ $employee->department->name }}
                                    </option>
                                @endif
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
                                        Sejauh mana antar rekan kerja saling mengingatkan untuk bekerja dengan baik?
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
                                        Sejauh mana anda mana komunikasi rekan kerja anda dalam memberikan saran dan solusi
                                        saat anda mengalami kesulitan dalam bekerja?
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
                                        Sejauh mana rekan kerja berkontribusi dalam menjalankan tugas kerja?
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
                                        Rekan kerja selalu menyelesaikan tugas tepat waktu?
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
                                        Rekan kerja selalu menghormati hak individual masing-masing?
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
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="row justify-content-end pb-5">
                    <div class="col-sm-2">
                        <button type="button" class="btn btn-secondary w-100" data-dismiss="modal">Batal</button>
                    </div>
                    <div class="col-sm-2">
                        <button type="submit" id="create-warningletter" name="create-warningletter"
                            class="btn bg-btn text-color w-100">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('javascript')
@endsection
