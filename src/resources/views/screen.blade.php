@extends('adminwinda::app')

@section("sidebar")

@endsection

@section('app-col')

    <div class="col-12   adminHeader" style="border-bottom: 1px solid #e1dfdf; padding-top: 20px;padding-bottom: 20px;">


        @foreach(\SlavaWins\AdminWinda\Library\ParsingAdminBlade::GetAdminExtendByType("header") as $V)
            @include($V)
        @endforeach
    </div>

    <div class="container-fluid px-3">

        <div class="row justify-content-left  ">


            @include('adminwinda::sidebar')

            <div class="col-md-8 px-4 mt-4 mainContent">


                @if ($errors->all())
                    @foreach ($errors->all() as $V)
                        <div class="card m-4 p-4 alert alert-danger">
                            {{$V}}
                        </div>
                    @endforeach
                @endif


                @yield('content')
            </div>

        </div>
    </div>

@endsection
