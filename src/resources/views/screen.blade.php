@extends('adminwinda::app')


@yield('top')


@section('app-col')

    <div class="col-12   adminHeader">
        @foreach(\SlavaWins\AdminWinda\Library\ParsingAdminBlade::GetAdminExtendByType("header") as $V)
            @include($V)
        @endforeach
    </div>


    <div class="row justify-content-left adminVerticalMiddle  " style="width: 100%;">


        @include('adminwinda::sidebar')

        <div class=" col   px-4 mt-4 mainContent">


            @include('adminwinda::error-alert')


            @yield('content')
        </div>

    </div>

@endsection
