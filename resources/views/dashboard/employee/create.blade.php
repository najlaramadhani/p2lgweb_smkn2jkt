@extends('layouts.app')
@section('page', 'Add Employee')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm">
                    <h1><b class="pr-2">TAMBAH <small>Karyawan</small></b></h1>
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
                            <h3 class="card-title text-center">Tambah Data <small>Karyawan</small></h3>
                        </div>
                        <form id="quickForm" action="{{ route('dashboard.employee.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">NIK : <i class="text-danger">*</i></label>
                                    <div class="col-sm-10">
                                        <input type="text" name="nik" id="nik" value=""
                                            class="form-control" placeholder="Masukkan NIK">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Kartu ID : <i class="text-danger">*</i></label>
                                    <div class="col-sm-10">
                                        <input type="text" name="uid" id="uid" value=""
                                            class="form-control" placeholder="Masukkan Nomer ID Card">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Nama Lengkap : <i
                                            class="text-danger">*</i></label>
                                    <div class="col-sm-10">
                                        <input type="text" name="fullname" id="fullname" value=""
                                            class="form-control" placeholder="Masukkan Nama Lengkap">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Nama Panggilan : <i
                                            class="text-danger">*</i></label>
                                    <div class="col-sm-10">
                                        <input type="text" name="nickname" id="nickname" value=""
                                            class="form-control" placeholder="Masukkan Nama Panggilan">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Tempat, Tgl Lahir : <i
                                            class="text-danger">*</i></label>
                                    <div class="col-sm-4">
                                        <input type="text" name="place_of_birth" id="place_of_birth" value=""
                                            class="form-control" placeholder="Masukkan Tempat">
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="input-group date" id="birthDateEmployee" data-target-input="nearest">
                                            <input type="date" name="birthdate" value=""
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
                                    <label class="col-sm-2 col-form-label">Jenis Kelamin : <i
                                            class="text-danger">*</i></label>
                                    <div class="col-sm-10">
                                        <select name="gender" class="form-control" id="gender">
                                            <option value="Pria" selected="selected">Pria</option>
                                            <option value="Wanita">Wanita</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Agama : <i class="text-danger">*</i></label>
                                    <div class="col-sm-10">
                                        <select name="religion" class="form-control" id="religion">
                                            <option value="Islam" selected="selected">Islam</option>
                                            <option value="Kristen Protestan">Kristen Protestan</option>
                                            <option value="Kristen Katolik">Kristen Katolik</option>
                                            <option value="Hindu">Hindu</option>
                                            <option value="Buddha">Buddha</option>
                                            <option value="Khonghucu">Khonghucu</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Tanggal Masuk : <i
                                            class="text-danger">*</i></label>
                                    <div class="col-sm-10">
                                        <div class="input-group date" id="dateEntryEmployee" data-target-input="nearest">
                                            <input type="date" name="tgl_masuk" value=""
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
                                    <label class="col-sm-2 col-form-label">Departemen : <i
                                            class="text-danger">*</i></label>
                                    <div class="col-sm-10">
                                        <select name="id_departement" class="form-control" id="id_departement">
                                            @foreach ($departement as $key => $dp)
                                                <option value="{{ $dp->id }}">{{ $dp->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Jabatan : <i class="text-danger">*</i></label>
                                    <div class="col-sm-10">
                                        <select name="id_jabatan" class="form-control" id="id_jabatan">
                                            @foreach ($jabatan as $key => $jb)
                                                <option value="{{ $jb->id }}">{{ $jb->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Status : <i class="text-danger">*</i></label>
                                    <div class="col-sm-10">
                                        <select name="id_status" class="form-control" id="id_status">
                                            @foreach ($status as $key => $st)
                                                <option value="{{ $st->id }}">{{ $st->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">No.Telepon : <i
                                            class="text-danger">*</i></label>
                                    <div class="col-sm-10">
                                        <input type="text" name="telp" value="" class="form-control"
                                            id="telp" placeholder="Masukkan No.Telepon">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Email : <i class="text-danger">*</i></label>
                                    <div class="col-sm-10">
                                        <input type="email" name="email" value="" class="form-control"
                                            id="email" placeholder="Masukkan Email">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Password : <i class="text-danger">*</i></label>
                                    <div class="col-sm-10">
                                        <input type="password" name="password" value="" class="form-control"
                                            id="password" placeholder="Masukkan Password Baru">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Konfirmasi Password : <i
                                            class="text-danger">*</i></label>
                                    <div class="col-sm-10">
                                        <input type="password" name="password_confirmation" value=""
                                            class="form-control" id="password_confirmation"
                                            placeholder="Konfirmasi Password">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Alamat : <i class="text-danger">*</i></label>
                                    <div class="col-sm-10">
                                        <input type="text" name="address" value="" class="form-control"
                                            id="address" placeholder="Masukkan Alamat">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Kewarganegaraan : <i
                                            class="text-danger">*</i></label>
                                    <div class="col-sm-10">
                                        <select name="citizen" class="form-control" id="citizen">
                                            <option value="WNI ">WNI</option>
                                            <option value="WNA">WNA</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Kota Asal : <i
                                            class="text-danger">*</i></label>
                                    <div class="col-sm-10">
                                        <input type="text" name="city" value="" class="form-control"
                                            id="city" placeholder="Masukkan Kota Asal">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Gol.Darah : <i
                                            class="text-danger">*</i></label>
                                    <div class="col-sm-10">
                                        <select name="blood_group" class="form-control" id="blood_group">
                                            <option value="A" selected="selected">A</option>
                                            <option value="B">B</option>
                                            <option value="AB">AB</option>
                                            <option value="O">O</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Status Menikah : <i
                                            class="text-danger">*</i></label>
                                    <div class="col-sm-10">
                                        <select name="married" class="form-control" id="married">
                                            <option value="0" selected="selected">Belum Menikah</option>
                                            <option value="1">Sudah Menikah</option>
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
