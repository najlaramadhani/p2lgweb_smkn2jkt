@extends('layouts.app')
@section('page', 'Employee')

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
                    <div class="d-flex justify-content-between">
                        <h1 class="text-bold">DATA <small>Karyawan</small></h1>
                        <div class="btn float-right" style="height: 50px;">
                            <button type="button" onclick="table2xls()" class="btn bg-btn btn-sm text-color">
                                <i class="fas fa-file-excel px-2"></i> Export
                            </button>
                            <a href="{{ route('dashboard.employee.create') }}"
                                class="btn bg-btn btn-sm text-color">
                                <i class="fas fa-plus-circle px-2"></i>
                                <span class="d-none d-md-inline white-space-no-wrap">Tambah Data Karyawan</span>
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
                <div class="col-12">
                    <div class="card">
                        <div class="card-header card-top">
                            <h3 class="card-title text-center text-color">Tabel <small>Karyawan</small></h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="employeeTable"
                                    class="employee-table table table-bordered table-hover row-12 w-100">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col" width="13%">NIK</th>
                                            <th scope="col">Nama Lengkap</th>
                                            <th scope="col">Nama Panggilan</th>
                                            <th scope="col">Jabatan</th>
                                            <th scope="col" width="14%">Tanggal Masuk</th>
                                            <th scope="col">Departemen</th>
                                            <th scope="col" width="11%">Tipe</th>
                                            <th scope="col">Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (count($data) < 1)
                                            <tr>
                                                <td colspan="9" class="dataTables_empty">Loading...</td>
                                            </tr>
                                        @else
                                            @foreach ($data as $key => $employee)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $employee->nik }}</td>
                                                    <td>{{ $employee->fullname }}</td>
                                                    <td>{{ $employee->nickname }}</td>
                                                    <td>{{ $employee->jabatan->name }}</td>
                                                    <td>{{ $employee->tgl_masuk }}</td>
                                                    <td class="text-center">{{ $employee->department->name }}</td>
                                                    <td class="text-center">
                                                        <span class="badge bg-primary text-dark">
                                                            {{ $employee->status->name }}
                                                        </span>
                                                    </td>
                                                    <td class=" align-middle user-select-all p-1">
                                                        <div class="btn-group dropleft user-select-none">
                                                            <button type="button"
                                                                class="btn btn-xs btn-secondary dropdown-toggle"
                                                                data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">
                                                                Opsi
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item text-success"
                                                                    href="{{ route('dashboard.employee.show', $employee->id) }}">
                                                                    <i class="fas fa-check-circle"></i> Detail
                                                                </a>
                                                                <a class="dropdown-item text-primary"
                                                                    href="{{ route('dashboard.employee.edit', $employee->id) }}">
                                                                    <i class="fas fa-edit"></i> Ubah Data
                                                                </a>
                                                                <div class="dropdown-divider"></div>
                                                                <a class="dropdown-item text-danger delete-department"
                                                                    href="{{ route('dashboard.employee.destroy', $employee->id) }}"
                                                                    data-id="23" data-title="Cleaning Service">
                                                                    <i class="fas fa-trash"></i> Hapus Data
                                                                </a>
                                                            </div>
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
@endsection

@section('javascript')
    <script type="text/javascript">
        function table2xls() {
            var table = document.getElementById("employeeTable");
            var html = table.outerHTML;
            var blob = new Blob([html], {
                type: 'application/vnd.ms-excel'
            });

            var a = document.createElement("a");
            a.href = URL.createObjectURL(blob);
            a.download = "table.xls";
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
        }
    </script>
@endsection
