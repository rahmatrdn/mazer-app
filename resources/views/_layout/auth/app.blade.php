<!DOCTYPE html>
<html lang="en" data-bs-theme="light">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MazerApp</title>

    <link rel="stylesheet" href="{{ asset('assets/mazer') }}/css/main/app.css" />
    <link rel="stylesheet" href="{{ asset('assets/mazer') }}/css/pages/auth.css" />
    <link rel="shortcut icon" href="{{ asset('assets/mazer') }}/images/logo/favicon.svg" type="image/x-icon" />
    <link rel="shortcut icon" href="{{ asset('assets/mazer') }}/images/logo/favicon.png" type="image/png" />

    <link rel="stylesheet" href="{{ asset('assets/mazer') }}/css/shared/iconly.css" />
    <link rel="stylesheet" href="{{ asset('assets/mazer') }}/css/custom.css" />
</head>

<body>
    <div id="auth">
        @yield('content')
    </div>
    <script src="{{ asset('assets/mazer') }}/js/bootstrap.js"></script>
    <script src="{{ asset('assets/mazer') }}/js/app.js"></script>
    <script src="{{ asset('assets/mazer') }}/js/pages/horizontal-layout.js"></script>

    <script src="{{ asset('assets/mazer') }}/extensions/apexcharts/apexcharts.min.js"></script>
    <script src="{{ asset('assets/mazer') }}/js/pages/dashboard.js"></script>
</body>

</html>
