@extends('layouts.app')
@section('page', 'Score Detail')

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
                        <h1 class="text-bold">RIWAYAT SCORING <small>Kinerja</small></h1>
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
