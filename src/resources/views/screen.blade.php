@extends('adminwinda::app')


@yield('top')


@section('app-col')

    <style>

        .buttonSidebarShow {
            display: none;
            height: 19px;
            cursor:pointer;
            margin-right: 11px;
            transition: 0.2s;

            @starting-style {
                transition: 0.2s;
                height: 2px;
                opacity: 0;
            }
        }

        @media (max-width: 1260px ) {

            .buttonSidebarShow {
                display: inline;

            }

            .sidebarFloatind {
                display: none;
                position: absolute !important;
                background: var(--body-bg);
                z-index: 1;

                transition: 0.2s;
                left:0px;

                @starting-style {
                    left:-200px;
                    transition: 0.2s;
                    opacity: 0;
                }
            }
        }

    </style>
    <script>
        function ClickAdminSidebarCollapce() {
            $('.sidebarFloatind').toggle();
        }
    </script>


    <div class="col-12   adminHeader" >
        <img src="/img/menu_collapse.svg" class="buttonSidebarShow" onclick="ClickAdminSidebarCollapce()">
        @foreach(\SlavaWins\AdminWinda\Library\ParsingAdminBlade::GetAdminExtendByType("header") as $V)
            @include($V)
        @endforeach
    </div>


    <div class="row justify-content-left adminVerticalMiddle  " style="width: 100%;">


        @include('adminwinda::sidebar')


        <div class="col-md-9   mainContent">

            @include('adminwinda::error-alert')


            @yield('content')
        </div>

    </div>

@endsection
