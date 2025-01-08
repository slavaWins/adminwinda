<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    @include("adminwinda::js-inc")

    <style>


        .mess_time {

            font-size: 12px;
            color: #000;
            opacity: 0.4;
        }

        .mess_row {
            font-size: 13px;
            color: #000;
        }

        .mess_login {
            color: #2a5885;
            font-size: 12.5px;
        }

        .mess_row_btns .btn {
            background: #e5ebf1;
            color: #346297;
            font-size: 12px;
            text-transform: none !important;
            box-shadow: none;
        }

        .messageboxWindow .card-body {
            border-bottom: 1px solid #ddd;
        }

        .textarea_mess {
            width: 100%;
            border: 1px solid #ddd;
            background: #fff;
            padding: 10px;
            font-size: 13px;
            border-radius: 4px;
        }

        .mess_scroll {
            height: 600px;
            overflow: auto;
            line-height: 1.21;
        }
    </style>

    @livewireStyles
    <style>

        body {
            background: #fff;
            font-size: 14px;
            xfont-family: 'Inter', sans-serif;
            font-family: 'Roboto', sans-serif;
            font-weight: 400;
            color: #000;
            letter-spacing: -0.015em;

            font-weight: 500;
            font-size: 15px;
            line-height: 17px;
            xletter-spacing: -0.005em;
            color: rgba(0, 0, 0, 0.47);

        }


        .sidebarFloatind icongg {
            display: block;
            float: left;
            margin-right: 16px;
            margin-top: -4px;
        }

        .aw-card b {
            font-weight: 600;
            font-size: 27.2991px;
            line-height: 33px;
            /* identical to box height */

            letter-spacing: 0.005em;
            display: block;
            color: #24242E;
            margin-top: 5px;
        }

        .aw-card {
            padding: 30px 26px;
            border: 1px solid #d9ddde;
            border-radius: 9px;
            font-weight: 500;
            font-size: 14px;
            line-height: 15px;
            color: rgba(0, 0, 0, 0.69);
        }

        .aw-card .iconRound {
            padding: 10px;
            font-size: 22px;
            width: fit-content;
            background: #dddddd;
            border-radius: 100%;
            display: block;
            margin-bottom: 15px;
            color: #3b3b44;
        }

        .adminHeader {
            color: rgba(0, 0, 0, 0.82);
        }

        .sidebarFloatind  > a, .spanTitle, .adminHeader {
            padding: 12px 26px;
            font-weight: 500;
            font-size: 14px;
            letter-spacing: -0.02em;
        }

        .sidebarFloatind > a, .spanTitle {
            display: block;
            line-height: 16px;
            color: rgba(0, 0, 0, 0.46);
        }

        .spanTitle {
            color: rgba(0, 0, 0, 0.82);
            margin-top: 14px;
            font-size: 13px;
        }

        .sidebarFloatind > a:hover {
            background: #c5c5c545;
            transition: 0.081s;
        }

        .divHrefSide a {

            color: #000;
        }

        .divHrefSide {
            line-height: 2.0em;
            font-style: normal;
            font-weight: 400;
            color: #000;
            xfont-family: 'Inter';
            font-style: normal;
            font-weight: 400;
            font-size: 13px;
        }

        h1, h2, h3, h4 {


            xfont-family: 'Inter';
            font-style: normal;
            font-weight: 500;
            font-size: 16px;
            line-height: 26px;
            letter-spacing: -0.02em;
            color: rgba(0, 0, 0, 0.8);

        }

        h1 {
            font-size: 24px;
        }

        h2 {
            font-size: 18px;
        }



        .textDotLimiter {
            display: inline-block;
            width: 180px;
            white-space: nowrap;
            overflow: hidden !important;
            text-overflow: ellipsis;
        }

        .sidebarFloatind {
            margin-bottom: 25px;
            background: #F5F5F5;
        }

        @media (min-width: 1200px) {
            .sidebarFloatind {
                max-width: 270px;
            }
        }

        .btn {
            border-radius: 0px;
            box-shadow: none !important;
            font-size: 13px;
            letter-spacing: -0.01em;
            text-transform: none;
        }

        .btn-dark {
            background: #EAE9E9;
            color: #000;
        }

        .btn-primary {
            background: #044AFF;
            color: #fff;
        }

        .table-bordered > :not(caption) > * > * {
            border: 1px solid #000;
        }

        .card-header, .card-body {
            border-color: #000;
            border-width: 1px;
        }

        .card {
            border-radius: 3px;
        }
    </style>
</head>
<body>
<div id="app">
    @yield('app-col')
</div>


@livewireScripts
</body>

@include("formbuilder::approved-modal")



<script src="{{ asset('js/formbuilder/ApprovedModalController.js') }}"></script>
<script src="{{ asset('js/jquery.mask.min.js') }}"></script>
@yield('scripts')

<script>

</script>


</html>
