@php
    use SlavaWins\Formbuilder\Library\FElement;

   /*** @var $user \app\Models\User */
@endphp


@extends('adminwinda::screen')




@section('content')

    @foreach(\SlavaWins\AdminWinda\Library\ParsingAdminBlade::GetAdminExtendByType("index") as $V)
        @include($V)
    @endforeach

@endsection


