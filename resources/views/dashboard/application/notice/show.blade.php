@extends('layouts.app')
@section('page', 'Surat Peringatan Detail User')

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
                        <h1 class="text-bold">RIWAYAT SURAT <small>Peringatan</small></h1>
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
                            <h3 class="card-title text-center">Riwayat : <small>{{ $slug }}</small></h3>
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
