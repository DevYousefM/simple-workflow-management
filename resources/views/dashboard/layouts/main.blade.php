<!doctype html>
<html lang="en" dir="">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/svg" sizes="16x16" href="{{ asset('assets/images/logo.svg') }}">
    <title>YF</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('dashboard.components.styles')
    @yield('css')

</head>

<body>
    <main class="main-content">
        @include('dashboard.components.navbar')
        <div class="modal fade" id="changePass" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header d-flex justify-items-between items-center">
                        <h5 class="modal-title" id="exampleModalLabel">change password</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="#">
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">new password</label>
                                <input type="password" class="form-control" id="new-password" name="password">
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary">change</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @yield('content')
        @include('dashboard.components.sidebar')
        @include('dashboard.components.loading')
    </main>
    <div class="overlay-dark-sidebar"></div>
    <div class="customizer-overlay"></div>
    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBgYKHZB_QKKLWfIRaYPCadza3nhTAbv7c"></script>
    <!-- inject:js-->
    <svg id="SvgjsSvg1001" width="2" height="0" xmlns="http://www.w3.org/2000/svg" version="1.1"
        xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev"
        style="overflow: hidden; top: -100%; left: -100%; position: absolute; opacity: 0;">
        <defs id="SvgjsDefs1002"></defs>
        <polyline id="SvgjsPolyline1003" points="0,0"></polyline>
        <path id="SvgjsPath1004" d="M0 0 "></path>
    </svg>
    <!-- inject:js-->

    @include('dashboard.components.scripts')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

    @yield('js')

</body>

</html>
