<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ env('APP_NAME') }} | Login</title>
    <link rel="stylesheet" href="{{ asset('/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/dist/css/adminlte.min.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Source+Sans+3:wght@200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <style type="text/css">
        .bg-login {
            background-color: #F8FAE5;
        }

        .bg-btn {
            background: #265073;
            color: #ffffff;
        }

        .card-b.card-outline {
            border-top: 10px solid #265073;
        }
    </style>
</head>

<body class="hold-transition login-page bg-login">
    <div class="login-box">
        <div class="card card-outline card-b">
            <div class="card-header text-center">
                <img src="{{ asset('/dist/img/logo.png') }}" class="img-circle" height="150px" width="150px" alt="RMA Logo">
            </div>
            <div class="card-body pt-2">
                <p class="login-box-msg" style="padding: 0 20px 15px">Login Account PEKINKA</p>
                <form method="POST" action="{{ route('login.handler') }}">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" name="username" class="form-control" placeholder="Username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-14">
                        <button type="submit" name="login" value="login" class="btn bg-btn btn-block">
                            <b>Sign In</b>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/dist/js/adminlte.min.js') }}"></script>
    <script src="{{ asset('/plugins/sweetalert2/sweetalert2.all.min.js') }}"></script>
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
