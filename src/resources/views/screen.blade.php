@php
$viewExt = 'adminwinda::app';
if(view()->exists("adminwinda.app")){
    $viewExt = 'adminwinda.app';
}
@endphp

@extends($viewExt)


@section("sidebar")

@endsection



@yield('top')


@section('app-col')




    <div class="col-12   adminHeader" style="border-bottom: 1px solid #e1dfdf; padding-top: 20px;padding-bottom: 20px;">


        @foreach(\SlavaWins\AdminWinda\Library\ParsingAdminBlade::GetAdminExtendByType("header") as $V)
            @include($V)
        @endforeach
    </div>

    <div class="  px-2">

        <div class="row justify-content-left  " style="width: 100%;">


            @include('adminwinda::sidebar')

            <div class=" col   px-4 mt-4 mainContent">


                @if ($errors->all())
                    @foreach ($errors->all() as $V)
                        <div class="row">
                        <div class="  m-4 p-4 alert alert-danger">
                            {{$V}}
                        </div>
                        </div>
                    @endforeach
                @endif


                @yield('content')
            </div>

        </div>
    </div>

@endsection
