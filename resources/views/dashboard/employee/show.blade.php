@extends('layouts.app')
@section('page', 'Employee Detail')

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
                    <h3 class="text-bold">DETAIL
                        <small class="text-muted">Karyawan
                            <i class="fa fa-angle-right fa-xs"></i>
                            {{ $data->fullname }}
                        </small>
                    </h3>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="card card-success card-outline card-outline-tabs card-outline-bottom">
                <div class="card-header">
                    <ul class="nav nav-tabs employee-tabs mb-3 text-center nav-fill">
                        <li class="nav-item"><a class="nav-link text-color active" href="#profile" data-target="#profile"
                                data-toggle="tab">Profile</a></li>
                        <li class="nav-item"><a class="nav-link text-color" href="#warning" data-target="#warning"
                                data-toggle="tab">Surat Peringatan</a></li>
                        <li class="nav-item"><a class="nav-link text-color" href="#note" data-target="#score"
                                data-toggle="tab">Scoring Kinerja</a></li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <!-- TAB PROFILE -->
                        <div class="active tab-pane" id="profile">
                            <input type="hidden" class="form-control" name="id_employee" value="1"
                                readonly="readonly">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="card card-b card-outline">
                                        <div class="card-body box-profile">
                                            <div class="text-center">
                                                <div class="profilepic m-auto">
                                                    <img class="profilepic__image profile-user-img img-fluid img-circle"
                                                        src="https://hris.applikasi.cloud/uploads/Pria.png" alt="Profile"
                                                        style="width: 200px; height: 200px;" class="img-thumbnail">
                                                </div>
                                                <h3 class="display-5">{{ $data->fullname }}</h3>
                                                <h5 class="text-muted m-2">{{ $data->uid }}</h5>
                                                <p class="text-muted m-0" style="font-size: 15px;">
                                                    <span>Tanggal Masuk :</span> {{ $data->tgl_masuk }}
                                                </p>
                                                <hr />
                                            </div>
                                            <div class="card">
                                                <div class="card-body rounded shadow">
                                                    <h3 class="display-5 text-center">{{ $data->department->name }}</h3>
                                                    <button type="button"
                                                        class="btn btn-sm btn-block btn-dark">{{ $data->jabatan->name }}</button>
                                                    <button type="button" class="btn btn-sm btn-block"
                                                        style="color: #fff;background-color: #007bff;">{{ $data->status->name }}</button>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-body rounded shadow">
                                                    <strong><i class="fas fa-envelope mr-1"></i> Email</strong>
                                                    <p class="text-muted">{{ $data->email }}</p>

                                                    <strong><i class="fas fa-phone-alt mr-1"></i> Phone</strong>
                                                    <p class="text-muted">{{ $data->telp }}</p>

                                                    <strong><i class="fas fa-map-marker-alt mr-1"></i>Alamat</strong>
                                                    <p class="text-muted">{{ $data->address }}</p>
                                                </div>
                                            </div>
                                            <!-- /.card-body -->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="card card-b card-outline">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between">
                                                <h3 class="mb-3">Data <small>Pribadi</small></h3>
                                            </div>
                                            <div class="card">
                                                <div class="card-body rounded shadow">
                                                    <div class="table-responsive">
                                                        <table cellpadding="4" cellspacing="4" style="width:100%"
                                                            class="w-100">
                                                            <tbody>
                                                                <tr>
                                                                    <td width="30%">Kartu Identitas</td>
                                                                    <td width="70%"">
                                                                        <strong>: {{ $data->uid }}</strong>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="30%">Nama Lengkap</td>
                                                                    <td width="70%"">
                                                                        <strong>: {{ $data->fullname }}</strong>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="30%">Nama Panggilan</td>
                                                                    <td width="70%"">
                                                                        <strong>: {{ $data->nickname }}</strong>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="30%">Tempat, Tanggal Lahir</td>
                                                                    <td width="70%"">
                                                                        <strong>: {{ $data->place_of_birth }},
                                                                            {{ $data->birthdate }}</strong>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="30%">Jenis Kelamin</td>
                                                                    <td width="70%"">
                                                                        <strong>: {{ $data->gender }}</strong>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="30%">Agama</td>
                                                                    <td width="70%"">
                                                                        <strong>: {{ $data->religion }}</strong>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="30%">Kewarganegaraan</td>
                                                                    <td width="70%"">
                                                                        <strong>: {{ $data->citizen }}</strong>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="30%">Kota Asal</td>
                                                                    <td width="70%"">
                                                                        <strong>: {{ $data->city }}</strong>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="30%">Gol. Darah</td>
                                                                    <td width="70%"">
                                                                        <strong>: {{ $data->blood_group }}</strong>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- TAB SP -->
                        <div class="tab-pane" id="warning">
                            <div class="card card-b card-outline">
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
                                                    <th scope="col" width="18%">Tanggal Selesai</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if (count($notice) < 1)
                                                    <tr>
                                                        <td colspan="7" class="dataTables_empty">Loading...</td>
                                                    </tr>
                                                @else
                                                    @foreach ($notice as $key => $dt)
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

                         <!-- TAB SC -->
                        <div class="tab-pane" id="score">
                            <div class="card card-b card-outline">
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
                                               @if (count($scores) < 1)
                                                    <tr>
                                                        <td colspan="7" class="dataTables_empty">Loading...</td>
                                                    </tr>
                                                @else
                                                    @foreach ($scores as $key => $dt)
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
        </div>
    </div>
@endsection

@section('javascript')
@endsection
