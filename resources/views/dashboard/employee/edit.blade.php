@extends('layouts.app')
@section('page', 'Edit Employee')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm">
                    <h1><b class="pr-2">DATA <small>Karyawan</small></b></h1>
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
                            <h3 class="card-title text-center">Edit Data <small>Karyawan</small></h3>
                        </div>
                        <form id="quickForm" action="{{ route('dashboard.employee.update', $data->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">NIK :</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="nik" id="nik" value="{{ $data->nik }}"
                                            class="form-control" placeholder="Masukkan NIK">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Kartu ID :</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="uid" id="uid" value="{{ $data->uid }}"
                                            class="form-control" placeholder="Masukkan Nomer ID Card">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Nama Lengkap :</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="fullname" id="fullname" value="{{ $data->fullname }}"
                                            class="form-control" placeholder="Masukkan Nama Lengkap">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Nama Panggilan :</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="nickname" id="nickname" value="{{ $data->nickname }}"
                                            class="form-control" placeholder="Masukkan Nama Panggilan">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Tempat, Tanggal Lahir :</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="place_of_birth" id="place_of_birth"
                                            value="{{ $data->place_of_birth }}" class="form-control"
                                            placeholder="Masukkan Tempat">
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="input-group date" id="birthDateEmployee" data-target-input="nearest">
                                            <input type="date" name="birthdate" value="{{ $data->birthdate }}"
                                                class="form-control datetimepicker-input" data-target="#birthDateEmployee"
                                                data-toggle="datetimepicker" />
                                            <div class="input-group-append" data-target="#birthDateEmployee"
                                                data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Jenis Kelamin :</label>
                                    <div class="col-sm-10">
                                        <select name="gender" class="form-control" id="gender">
                                            @if ($data->gender == 'Pria')
                                                <option value="Pria" selected="selected">Pria</option>
                                                <option value="Wanita">Wanita</option>
                                            @else
                                                <option value="Wanita" selected>Wanita</option>
                                                <option value="Pria">Pria</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Agama :</label>
                                    <div class="col-sm-10">
                                        <select name="religion" class="form-control" id="religion">
                                            <option value="{{ $data->religion }}" selected>{{ $data->religion }}</option>
                                            <option value="Islam">Islam</option>
                                            <option value="Kristen Protestan">Kristen Protestan</option>
                                            <option value="Kristen Katolik">Kristen Katolik</option>
                                            <option value="Hindu">Hindu</option>
                                            <option value="Buddha">Buddha</option>
                                            <option value="Khonghucu">Khonghucu</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Tanggal Masuk :</label>
                                    <div class="col-sm-10">
                                        <div class="input-group date" id="dateEntryEmployee" data-target-input="nearest">
                                            <input type="date" name="tgl_masuk" value="{{ $data->tgl_masuk }}"
                                                class="form-control datetimepicker-input" data-target="#dateEntryEmployee"
                                                data-toggle="datetimepicker" />
                                            <div class="input-group-append" data-target="#dateEntryEmployee"
                                                data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Departemen :</label>
                                    <div class="col-sm-10">
                                        <select name="id_departement" class="form-control" id="id_departement">
                                            <option value="{{ $data->id_departement }}" selected>
                                                {{ $data->department->name }}
                                            </option>
                                            @foreach ($departement as $key => $dp)
                                                <option value="{{ $dp->id }}">{{ $dp->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Jabatan :</label>
                                    <div class="col-sm-10">
                                        <select name="id_jabatan" class="form-control" id="id_jabatan">
                                            <option value="{{ $data->id_jabatan }}" selected>
                                                {{ $data->jabatan->name }}
                                            </option>
                                            @foreach ($jabatan as $key => $jb)
                                                <option value="{{ $jb->id }}">{{ $jb->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Status :</label>
                                    <div class="col-sm-10">
                                        <select name="id_status" class="form-control" id="id_status">
                                            <option value="{{ $data->id_status }}" selected>
                                                {{ $data->status->name }}
                                            </option>
                                            @foreach ($status as $key => $st)
                                                <option value="{{ $st->id }}">{{ $st->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">No.Telepon :</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="telp" value="{{ $data->telp }}"
                                            class="form-control" id="telp" placeholder="Masukkan No.Telepon">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Email :</label>
                                    <div class="col-sm-10">
                                        <input type="email" name="email" value="{{ $data->email }}"
                                            class="form-control" id="email" placeholder="Masukkan Email">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Alamat :</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="address" value="{{ $data->address }}"
                                            class="form-control" id="address" placeholder="Masukkan Alamat">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Kewarganegaraan :</label>
                                    <div class="col-sm-10">
                                        <select name="citizen" class="form-control" id="citizen">
                                            <option value="{{ $data->citizen }}" selected>{{ $data->citizen }}</option>
                                            <option value="WNI ">WNI</option>
                                            <option value="WNA">WNA</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Kota Asal :</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="city" value="{{ $data->city }}"
                                            class="form-control" id="city" placeholder="Masukkan Kota Asal">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Gol.Darah :</label>
                                    <div class="col-sm-10">
                                        <select name="blood_group" class="form-control" id="blood_group">
                                            <option value="{{ $data->blood_group }}" selected>
                                                {{ $data->blood_group }}
                                            </option>
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="AB">AB</option>
                                            <option value="O">O</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Status Menikah :</label>
                                    <div class="col-sm-10">
                                        <select name="married" class="form-control" id="married">
                                            @if ($data->gemarriednder == 0)
                                                <option value="0" selected="selected">Belum Menikah</option>
                                                <option value="1">Sudah Menikah</option>
                                            @else
                                                <option value="1" selected="selected">Sudah Menikah</option>
                                                <option value="0">Belum Menikah</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <a href="{{ route('dashboard.employee.index') }}" type="button"
                                    class="btn btn-secondary px-5">Batal</a>
                                <button type="submit" name="employeeAdd" value="employee-add"
                                    class="btn bg-btn text-dark px-5">Simpan</button>
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
