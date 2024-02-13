<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ env('APP_NAME') }} | @yield('page')</title>
    <link rel="stylesheet" href="{{ asset('/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/plugins/daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet"
        href="{{ asset('/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/plugins/sweetalert2/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Source+Sans+3:wght@200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <style>
        .card.card-outline-bottom .card-header a.active {
            border-top: 0 !important;
            border-bottom: 3px solid #265073;
        }

        .card.card-outline-bottom .card-header a:hover {
            border-top: 0 !important;
            border-bottom: 3px solid #dee2e6;
        }

        .sidebar-light-green {
            background: #fff;
            color: #000000;
        }

        .navbar-color {
            background: #265073;
            color: #000000;
        }

        table.dataTable span.highlight {
            background-color: #ffff88;
            border-radius: 0.28571429rem;
        }

        table.dataTable span.column_highlight {
            background-color: #ffcc99;
            border-radius: 0.28571429rem;
        }

        .dataTables_wrapper .dataTables_filter label {
            display: block;
            margin-bottom: 0;
            margin: 0 0 15px 0;
            border-bottom: 2px solid #ddd;
            text-align: right !important;
            font-size: 20px;
            line-height: 30px;
            color: #aaa;
            width: 100%;
        }

        .dataTables_wrapper .dataTables_filter label input[type=search] {
            width: 90% !important;
            background-color: #fff;
            background-image: none;
            color: #666;
            font-size: 20px;
            line-height: 30px;
            height: calc(3rem + 2px);
            padding: 0 15px;
            transition: border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;
            vertical-align: middle;
            border: none;
            background-color: #efefef;
        }

        .dt-length-menu select {
            padding-top: 0.375rem;
            padding-bottom: 0.375rem;
            padding-left: 0.75rem;
            padding-right: 2.25rem;
            font-size: 1rem;
            border-radius: 0.25rem;
            height: calc(3rem + 2px);
        }

        div.dataTables_processing {
            color: #fff;
            background: #444444;
        }

        @keyframes blinker {
            50% {
                opacity: 0;
            }
        }

        .dataTables_empty {
            animation: blinker 1s linear infinite;
            font-size: 60px;
            text-transform: lowercase;
            text-align: center;
        }

        .card-b.card-outline {
            border-top: 5px solid #637A9F;
        }

        .bg-btn {
            background: #265073;
            color: #ffffff;
        }

        .nc-green {
            color: #ADE792;
        }

        .btn-green-pretty,
        .btn-green-pretty:hover {
            background-color: rgba(173, 231, 146, 0.3);
            color: #00aa13;
            transition: 0.3s;
        }

        .card-top {
            background: #265073;
        }

        .bg-female {
            background: #ff99bb;
            color: #000000;
        }

        .bg-male {
            background: #80dfff;
            color: #000000;
        }

        .bg-department {
            background: #ccff66;
            color: #000000;
        }

        .bg-recruitment {
            background: #ffbf80;
            color: #000000;
        }

        .profilepic {
            position: relative;
            width: 215px;
            height: 215px;
            border-radius: 50%;
            overflow: hidden;
            background-color: #111;
        }

        .profilepic:hover .profilepic__content {
            opacity: 1;
        }

        .profilepic:hover .profilepic__image {
            opacity: .5;
        }

        .profilepic__image {
            object-fit: cover;
            opacity: 1;
            transition: opacity .2s ease-in-out;
        }

        .btn-secondary {
            text-transform: uppercase !important;
        }

        .profilepic__content {
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: white;
            opacity: 0;
            transition: opacity .2s ease-in-out;
        }

        .profilepic__icon {
            color: white;
            padding-bottom: 4px;
        }

        .profilepic__text {
            font-size: 15px;
            width: 50%;
            text-align: center;
            color: white;
        }

        .file-upload {
            display: none !important;
        }

        .profilepic__text a {
            color: white;
        }

        .profilepic {
            position: relative;
            width: 200px;
            height: 200px;
            border-radius: 50%;
            overflow: hidden;
            background-color: #111;
        }

        .profilepic:hover .profilepic__content {
            opacity: 1;
        }

        .profilepic:hover .profilepic__image {
            opacity: .5;
        }

        .profilepic__image {
            object-fit: cover;
            opacity: 1;
            transition: opacity .2s ease-in-out;
        }

        .profilepic__content {
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: white;
            opacity: 0;
            transition: opacity .2s ease-in-out;
        }

        .profilepic__icon {
            color: white;
            padding-bottom: 4px;
        }

        .profilepic__text {
            font-size: 15px;
            width: 50%;
            text-align: center;
            color: white;
        }

        .file-upload {
            display: none !important;
        }

        .profilepic__text a {
            color: white;
        }

        .notif {
            color: #ff0000;
        }

        .employee-status {
            font-size: 90%;
            font-weight: 500;
        }

        .attendence-masuk {
            font-size: 90%;
            font-weight: 500;
            background: #007bff;
            color: #fff;
        }

        .attendence-pulang {
            font-size: 90%;
            font-weight: 500;
            background: #28a745;
            color: #fff;
        }

        .attendence-clockin {
            font-size: 90%;
            font-weight: 500;
            background: #dc3545;
            color: #fff;
        }

        .attendence-not-clockout {
            font-size: 90%;
            font-weight: 500;
            background: #dc3545;
            color: #fff;
        }

        .attendence-clockout {
            font-size: 90%;
            font-weight: 500;
            background: #17a2b8;
            color: #fff;
        }

        .badge-announce-aktif {
            color: #fff;
            background-color: #28a745;
            font-size: 90%;
            font-weight: 500;
        }

        .badge-announce-selesai {
            color: #fff;
            background-color: #6c757d;
            font-size: 90%;
            font-weight: 500;
        }

        .badge-announce-dihapus {
            color: #fff;
            background-color: #dc3545;
            font-size: 90%;
            font-weight: 500;
        }

        .badge-workpermit-aktif {
            color: #fff;
            background-color: #28a745;
            font-size: 90%;
            font-weight: 500;
        }

        .badge-workpermit-diizinkan {
            color: #fff;
            background-color: #6c757d;
            font-size: 90%;
            font-weight: 500;
        }

        .badge-workpermit-ditolak {
            color: #fff;
            background-color: #ff0018;
            font-size: 90%;
            font-weight: 500;
        }

        .badge-workpermit-dihapus {
            color: #fff;
            background-color: #dc3545;
            font-size: 90%;
            font-weight: 500;
        }

        .badge-formrequest-aktif {
            color: #fff;
            background-color: #28a745;
            font-size: 90%;
            font-weight: 500;
        }

        .badge-formrequest-diterima {
            color: #fff;
            background-color: #6c757d;
            font-size: 90%;
            font-weight: 500;
        }

        .badge-formrequest-ditolak {
            color: #fff;
            background-color: #ff0018;
            font-size: 90%;
            font-weight: 500;
        }

        .badge-formrequest-dihapus {
            color: #fff;
            background-color: #dc3545;
            font-size: 90%;
            font-weight: 500;
        }
        .text-color {
            color: #F8FAE5;
        }

        .text-employee {
            color: #265073;
        }
    </style>
</head>

<body class="hold-transition sidebar-collapse">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-color pt-1 pb-1 fixed-top"
            style="z-index: 1039; margin-left: 0;">
            <ul class="navbar-nav">
                <li class="nav-item" id="isSidebar">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars" style="color:#F8FAE5;"></i></a>
                </li>
            </ul>
            <a href="{{ route('dashboard.index') }}" class="brand-link d-flex align-items-center p-0"
                style="border-bottom:unset">
                <img src="{{ asset('/dist/img/logo.png') }}" height="40px" width="40px" alt="Enter Komputer Logo"
                    class="ml-1 mr-1 brand-image img-circle">
                <span class="align-self-center m-0 ml-1"
                    style="color:#F8FAE5; font-size:30px;"><strong>PEKINKA</strong></span>
            </a>
        </nav>

        <aside class="main-sidebar sidebar-light-green mt-1">
            <div class="sidebar">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-header">Dashboard</li>
                        <li class="nav-item">
                            <a href="{{ route('dashboard.index') }}" class="nav-link">
                                <img src="{{ asset('/dist/img/dashboard.png') }}" height="24px" width="24px"
                                    class="mr-2">
                                <p>Dashboard</p>
                            </a>
                        </li>
                        @if (Auth::user()->role == 'manager' || Auth::user()->role == 'director')
                            <li class="nav-header">Karyawan</li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <img src="{{ asset('/dist/img/employees.png') }}" height="24px" width="24px"
                                        class="mr-2">
                                    <p>Karyawan <i class="fas fa-angle-left right"></i></p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('dashboard.employee.index') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Data Karyawan</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endif

                        <li class="nav-header">Dokumen</li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <img src="{{ asset('/dist/img/score.png') }}" height="24px" width="24px"
                                    class="mr-2">
                                <p>Aplikasi <i class="fas fa-angle-left right"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                @if (Auth::user()->role == 'manager' || Auth::user()->role == 'director')
                                    <li class="nav-item">
                                        <a href="{{ route('dashboard.notice.index') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Surat Peringatan</p>
                                        </a>
                                    </li>
                                @endif

                                <li class="nav-item">
                                    <a href="{{ route('dashboard.score.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Penilaian Kinerja</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @if (Auth::user()->role == 'manager' || Auth::user()->role == 'director')
                            <li class="nav-header">Department</li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <img src="{{ asset('/dist/img/department.png') }}" height="24px" width="24px"
                                        class="mr-2">
                                    <p>Departemen <i class="fas fa-angle-left right"></i></p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('dashboard.departement.index') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Department</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('dashboard.jabatan.index') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Jabatan</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endif
                        <li class="nav-header">Pengaturan</li>
                        <li class="nav-item">
                            <a href="{{ route('dashboard.logout') }}" class="nav-link">
                                <img src="{{ asset('/dist/img/user.png') }}" height="24px" width="24px"
                                    class="mr-2">
                                <p>Sign Out</p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <div class="content-wrapper mt-5">
            @yield('content')
        </div>
    </div>

    <script src="{{ asset('/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/dist/js/adminlte.min.js') }}"></script>
    <script src="{{ asset('/plugins/sweetalert2/sweetalert2.all.min.js') }}"></script>
    <script type="text/javascript">
        const statusSide = localStorage.getItem('sidebar');
        if (statusSide == 'show') {
            $("body").addClass("sidebar-collapse");
        } else {
            $("body").removeClass("sidebar-collapse");
        }

        $("#isSidebar").click(function() {
            if (statusSide == 'show') {
                localStorage.setItem('sidebar', 'hide');
            } else {
                localStorage.setItem('sidebar', 'show');
            }
        });
    </script>
    @yield('javascript')

    @if (Session::has('success'))
        <script type="text/javascript">
            Swal.fire(
                "Success!",
                "{{ Session::get('success') }}",
                "success"
            );
        </script>
    @endif

    @if (Session::has('error'))
        <script type="text/javascript">
            Swal.fire(
                "W0pzzz!",
                "{{ Session::get('error') }}",
                "error"
            );
        </script>
    @endif
</body>

</html>
