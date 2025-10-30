@php
    use SlavaWins\Formbuilder\Library\FElement;

   /*** @var $user \app\Models\User */
@endphp


@extends('adminwinda::screen')

<style>
    .analyticBlock{

        ._descr{
            display:none;
        }
        ._val{
            font-size: 40px;
        }
        ._name{
            font-size: 14px;
        }
        ._date{
            font-size: 12px;
        }
    }
</style>


@section('top')

    @foreach(\SlavaWins\AdminWinda\Library\ParsingAdminBlade::GetAdminExtendByType("index-top") as $V)
        @include($V)
    @endforeach

@endsection


@section('content')

    @foreach(\SlavaWins\AdminWinda\Library\ParsingAdminBlade::GetAdminExtendByType("index") as $V)
        @include($V)
    @endforeach

@endsection


