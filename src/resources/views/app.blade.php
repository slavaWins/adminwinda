@extends('layouts.app')



@section('header')

    <link rel="stylesheet" href="/css/mat-icons/css2.css"/>


    <style>

        @media (max-width: 900px) {
            .adminLogo {
                display: none;
            }
        }

        .mess_time {

            font-size: 12px;
            color: #000;
            opacity: 0.4;
        }

        .mess_row {
            font-size: 13px;
            xcolor: #000;
        }

        .mess_login {
            xcolor: #2a5885;
            font-size: 13px;
        }

        .mess_row_btns .btn {
            xbackground: #e5ebf1;
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

        body {

        }


        .sidebarFloatind icongg {
            display: block;
            float: left;
            margin-right: 16px;
            margin-top: -4px;
        }

        .aw-card b {
            font-weight: 600;
            font-size: 27px;
            line-height: 33px;
            /* identical to box height */

            letter-spacing: 0.005em;
            display: block;
            margin-top: 5px;
        }

        .aw-card {
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


        .sidebarFloatind > a, .spanTitle, .adminHeader, .representSection > a {
            padding: 12px 26px;
            font-weight: 500;
            font-size: 14px;
            letter-spacing: -0.02em;
        }

        .spanTitle img {
            height: 24px;
            margin-right: 12px;
            margin-top: -4px;
        }

        .sidebarFloatind > a, .spanTitle, .representSection > a {
            display: block;
            line-height: 16px;
        }

        .spanTitle {
            margin-top: 14px;
            font-size: 13px;
        }


        .divHrefSide a {

        }

        .divHrefSide {
            line-height: 2.0em;
            font-style: normal;
            font-weight: 400;
            font-style: normal;
            font-weight: 400;
            font-size: 13px;
        }


        h1, h2, h3 {
            opacity: 1;
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
        }

        @media (min-width: 1200px) {
            .sidebarFloatind {
                max-width: 270px;
            }
        }


        .btn-primary:hover {
            opacity: 0.9;
            transition: 0.15s;
        }

        .table-bordered > :not(caption) > * > * {
            border: 1px solid #000;
        }

        .card-header, .card-body {
            border-width: 1px;
        }

        .card {
            border-radius: 3px;
        }

        .btn-dark {
            background: #EAE9E9;
            color: #000;
        }


        .mrpAdminDivOuterTable tbody {

            font-size: 14px;
            font-weight: 400;
        }

        .mrpAdminDivOuterTable table {
            background: transparent !important;
        }

        .card {
            box-shadow: none;
            border-radius: 18px;
        }

        .mrpAdminDivOuterTable {
            background: transparent;
            padding: 0px;
            border-radius: 0px;
        }

    </style>
@endsection
