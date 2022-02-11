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
            @if (session('join'))
            <div class="alert alert-info alert-dismissible fade show text-center p-3"
                style="margin-bottom: 0 !important" role="alert">
                <h3>{{ session('join') }}</h3>
                <i class="fa fa-check-circle" style="font-size:72px;"></i>
                {{-- <br>
                <div class="card-body">
                    <h5>Mohon salin link berikut, untuk dapat bergabung pada seminar nanti.</h5>
                    <a
                        href="https://us02web.zoom.us/j/89347386977?pwd=aEVhbFNoYTJvd0RqSDFHUysrR0l3Zz09">https://us02web.zoom.us/j/89347386977?pwd=aEVhbFNoYTJvd0RqSDFHUysrR0l3Zz09</a><br>
                    <small>Webinar ID: 893 4738 6977</small><br>
                    <small>Passcode: 194007</small>

                    <h5>Mohon salin link berikut, untuk Pretest & postest.</h5>
                    <a
                        href="https://intip.in/pre-test-seminar-ipsrs-ptpi">https://intip.in/pre-test-seminar-ipsrs-ptpi</a><br>
                    <a
                        href="https://intip.in/post-test-seminar-ipsrs-ptpi">https://intip.in/post-test-seminar-ipsrs-ptpi</a><br>
                </div> --}}
            </div>
            {{ auth('participant')->logout() }}
            @endif
        </div>
    </body>

</html>
