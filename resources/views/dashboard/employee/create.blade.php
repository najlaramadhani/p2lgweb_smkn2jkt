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
                        <form id="quickForm" action ="" method = "POST" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">NIK :</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="identityNo" id="identityNo" value=""
                                            class="form-control" placeholder="Masukkan NIK">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Kartu ID :</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="cardID" id="cardID" value=""
                                            class="form-control" placeholder="Masukkan Nomer ID Card">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Nama Lengkap :</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="name" id="name" value=""
                                            class="form-control" placeholder="Masukkan Nama Lengkap">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Nama Panggilan :</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="nickname" id="nickname" value=""
                                            class="form-control" placeholder="Masukkan Nama Panggilan">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Tempat, Tanggal Lahir :</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="birthPlace" id="birthPlace" value=""
                                            class="form-control" placeholder="Masukkan Tempat">

                                    </div>
                                    <div class="col-sm-6">
                                        <div class="input-group date" id="birthDateEmployee" data-target-input="nearest">
                                            <input type="text" name="birthDateEmployee" value=""
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
                                        <select name="gender" class="form-control" id="gender" name="gender">
                                            <option value="Pria" selected="selected">Pria</option>
                                            <option value="Wanita">Wanita</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Agama :</label>
                                    <div class="col-sm-10">
                                        <select name="religion" class="form-control" id="religion" name="religion">
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
                                    <label class="col-sm-2 col-form-label">Tanggal Masuk :</label>
                                    <div class="col-sm-10">
                                        <div class="input-group date" id="dateEntryEmployee" data-target-input="nearest">
                                            <input type="text" name="dateEntryEmployee" value=""
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
                                        <select name="departmentID" class="form-control" id="departmentID"
                                            name="departmentID">
                                            <option value="0" selected="selected">--Belum Ada--</option>
                                            <option value="1">Update</option>
                                            <option value="3">Gudang</option>
                                            <option value="4">Human Resource</option>
                                            <option value="5">Teknologi Informasi</option>
                                            <option value="6">Kasir</option>
                                            <option value="7">Marketing Offline</option>
                                            <option value="8">Marketing Online</option>
                                            <option value="9">Return Merchandise Authorization</option>
                                            <option value="10">Finance Accounting & Tax</option>
                                            <option value="11">Teknisi</option>
                                            <option value="12">Marketing Komunikasi & Branding</option>
                                            <option value="13">Pick Up</option>
                                            <option value="15">Packing</option>
                                            <option value="20">Keamanan</option>
                                            <option value="23">Cleaning Service</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Jabatan :</label>
                                    <div class="col-sm-10">
                                        <select name="positionID" class="form-control" id="positionID"
                                            name="positionID">
                                            <option value="0" selected="selected">--Belum Ada--</option>
                                            <option value="1">Belum Ada</option>
                                            <option value="2">Owner</option>
                                            <option value="3">Director</option>
                                            <option value="4">Manager</option>
                                            <option value="5">Supervisor</option>
                                            <option value="13">Staff</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Status :</label>
                                    <div class="col-sm-10">
                                        <select name="employeeStatusID" class="form-control" id="employeeStatusID"
                                            name="employeeStatusID">
                                            <option value="1">K.Tetap</option>
                                            <option value="2">K.Percobaan</option>
                                            <option value="3">Resign</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">No.Rekening Bank Mandiri:</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="accountNumber" id="accountNumber" value=""
                                            class="form-control" placeholder="Masukkan No.Rekening Bank Mandiri">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Atas Nama Rekening:</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="accountName" id="accountName" value=""
                                            class="form-control" placeholder="Masukkan Atas Nama Rekening">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">No.Telepon :</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="phone" value="" class="form-control"
                                            id="phone" placeholder="Masukkan No.Telepon">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Email :</label>
                                    <div class="col-sm-10">
                                        <input type="email" name="email" value="" class="form-control"
                                            id="email" placeholder="Masukkan Email">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Alamat KTP :</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="identityAddress" value="" class="form-control"
                                            id="identityAddress" placeholder="Masukkan Alamat KTP">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Alamat Tempat Tinggal :</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="address" value="" class="form-control"
                                            id="address" placeholder="Masukkan Alamat Tempat Tinggal">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Kewarganegaraan :</label>
                                    <div class="col-sm-10">
                                        <select name="citizenship" class="form-control" id="citizenship"
                                            name="citizenship">
                                            <option value="WNI ">WNI</option>
                                            <option value="WNA">WNA</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Kota Asal :</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="hometown" value="" class="form-control"
                                            id="hometown" placeholder="Masukkan Kota Asal">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Gol.Darah :</label>
                                    <div class="col-sm-10">
                                        <select name="bloodType" class="form-control" id="bloodType" name="bloodType">
                                            <option value="A" selected="selected">A</option>
                                            <option value="B">B</option>
                                            <option value="AB">AB</option>
                                            <option value="O">O</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">No.BPJS Kesehatan :</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="bpjsKes" value="" class="form-control"
                                            id="bpjsKes" placeholder="Masukkan No.BPJS Kesehatan">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">No.BPJS ketenagakerjaan :</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="bpjsKet" value="" class="form-control"
                                            id="bpjsKet" placeholder="Masukkan No.BPJS ketenagakerjaan">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">No.BPJS Pensiun :</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="bpjsPen" value="" class="form-control"
                                            id="bpjsPen" placeholder="Masukkan No.BPJS Pensiun">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Status Menikah :</label>
                                    <div class="col-sm-10">
                                        <select name="marital_status" class="form-control" id="marital_status"
                                            name="marital_status">
                                            <option value="Belum Menikah" selected="selected">Belum Menikah</option>
                                            <option value="Sudah Menikah">Sudah Menikah</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Upload KTP:</label>
                                    <div class="col-sm-10">
                                        <input type="file" name="uploadIdentity" class="form-control"
                                            style="font-size: 12px" id="uploadIdentity">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Upload KK:</label>
                                    <div class="col-sm-10">
                                        <input type="file" name="uploadFamilyCard" class="form-control"
                                            style="font-size: 12px" id="uploadFamilyCard">
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
