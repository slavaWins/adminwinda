@php
    use SlavaWins\Formbuilder\Library\FElement;

   /*** @var $user \app\Models\Trash\Order */
@endphp


@extends('adminwinda::screen')




@section('content')

    <small>Инфа о пользователе #{{$user->id}}</small>
    <h1>{{$user->title ?? $user->name ?? "NA" }}</h1>

    <div class="row">

        <div class="col-4">
            <div class="card mb-4">
                <div class="card-body">
                    <h3>Общие данные</h3>
                    Email: {{$user->email??"NA"}}
                    <BR> Name: {{$user->name ??"NA"}}
                    <BR>Create: {{$user->created_at ??"NA"}}

                </div>
            </div>
        </div>

        @foreach(\SlavaWins\AdminWinda\Library\ParsingAdminBlade::GetAdminExtendByType("user-show") as $V)
            @include($V)
        @endforeach

    </div>
@endsection

