@php
    use SlavaWins\Formbuilder\Library\FElement;

   /*** @var $user \app\Models\User */
@endphp


@extends('adminwinda::screen')




@section('content')

    

    <table class="table  bg-white">
        <tr>
            <td>ИД</td>
            <td>Имя</td>
            <td>Создан</td>


            @foreach(\SlavaWins\AdminWinda\Library\ParsingAdminBlade::GetAdminExtendByType("user-table-header") as $V)
               @include($V)
            @endforeach

        </tr>

        @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>

                <td>
                    <a href="{{route("admin.users.show", $user)}}">
                        {{$user->name ?? "No name" }}
                    </a>
                </td>
                <td>
                    {{$user->created_at }}
                </td>

                @foreach(\SlavaWins\AdminWinda\Library\ParsingAdminBlade::GetAdminExtendByType("user-table-body") as $V)
                    @include($V)
                @endforeach
            </tr>
        @endforeach
    </table>

@endsection


