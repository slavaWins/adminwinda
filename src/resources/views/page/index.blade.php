@php
    use SlavaWins\Formbuilder\Library\FElement;

   /*** @var $user \app\Models\User */
@endphp


@extends('adminwinda::screen')



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


