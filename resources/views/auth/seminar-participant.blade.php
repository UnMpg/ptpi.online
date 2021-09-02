<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" value="{{ old('viewport') }}"
            content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
        <title>Participant - Seminar</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <style>
            body {
                background: #f3f3f3;
                font-family: 'Roboto', sans-serif;
            }

            .form-control {
                border-color: #eee;
                min-height: 41px;
                box-shadow: none !important;
            }

            .form-control:focus {
                border-color: #5cd3b4;
            }

            .form-control,
            .btn {
                border-radius: 3px;
            }

            .signup-form {
                width: 500px;
                margin: 0 auto;
                padding: 30px 0;
            }

            .signup-form h2 {
                color: #333;
                margin: 0 0 30px 0;
                display: inline-block;
                padding: 0 0 10px 0;
                border-bottom: 3px solid #5cd3b4;
            }

            .signup-form form {
                color: #999;
                border-radius: 3px;
                margin-bottom: 15px;
                background: #fff;
                box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
                padding: 30px;
            }

            .signup-form .form-group row {
                margin-bottom: 20px;
            }

            .signup-form label {
                font-weight: normal;
                font-size: 14px;
                line-height: 2;
            }

            .signup-form input[type="checkbox"] {
                position: relative;
                top: 1px;
            }

            .signup-form .btn {
                font-size: 16px;
                font-weight: bold;
                background: #5cd3b4;
                border: none;
                margin-top: 20px;
                min-width: 140px;
            }

            .signup-form .btn:hover,
            .signup-form .btn:focus {
                background: #41cba9;
                outline: none !important;
            }

            .signup-form a {
                color: #5cd3b4;
                text-decoration: underline;
            }

            .signup-form a:hover {
                text-decoration: none;
            }

            .signup-form form a {
                color: #5cd3b4;
                text-decoration: none;
            }

            .signup-form form a:hover {
                text-decoration: underline;
            }
        </style>
    </head>

    <body>
        <div class="signup-form">
            <form action="{{ action('AuthController@temaParticipant') }}" method="post" class="form-horizontal">
                @csrf
                <div class="row">
                    <div class="col-12 text-center">
                        <h2>Pilih Tema Seminar</h2>
                    </div>
                </div>

                @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <p>{!! session('success') !!}</p>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif

                @if (session('error'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>{{ session('error') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                <input type="hidden" name="email" value="{{ auth('participant')->user()->email }}">
                <div class="form-group row">
                    <label class="col-form-label col-4">Tema Seminar</label>
                    <div class="col-8">
                        <select name="certificate_id" id=""
                            class="form-control @error('certificate_id') is-invalid @enderror" required>
                            <option value="">~~ Pilih Tema Seminar ~~</option>
                            @foreach ($seminars as $seminar)
                            <option value="{{ $seminar->id }}">{{ $seminar->name }}</option>
                            @endforeach
                        </select>
                        @error('certificate_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-8 offset-4">
                        <p>
                            <a href="{{ action('AuthController@getRegisterParticipant') }}">Belum pernah mendaftar ?</a>
                        </p>
                        <button type="submit" class="btn btn-primary btn-lg">Daftar Seminar</button>
                    </div>
                </div>
            </form>
            <div class="text-center">Tidak punya akun? <a
                    href="{{ action('AuthController@getRegisterParticipant') }}">Daftar disini</a></div>
        </div>
    </body>

</html>
