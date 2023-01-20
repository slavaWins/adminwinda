@php
    use SlavaWins\Formbuilder\Library\FElement;

   /*** @var $user \app\Models\User */
@endphp


@extends('adminwinda::screen')




@section('content')
    <h3>Выбрать из списка и отредактировать</h3>
    <h1>
        Поиск пользователей
    </h1>
    <p>Чтобы использовать элемент управления для выполнения поиска, а не как инструмент для ввода данных, выберите
        вариант Поиск записи в форме на основе значения</p>

    <table class="table  bg-white">
        <tr>
            <td>ИД</td>
            <td>Имя</td>
            <td>Создан</td>


            @foreach(\SlavaWins\AdminWinda\Library\ParsingAdminBlade::GetAdminExtendByType("users-table-header") as $V)
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

                @foreach(\SlavaWins\AdminWinda\Library\ParsingAdminBlade::GetAdminExtendByType("users-table-body") as $V)
                    @include($V)
                @endforeach
            </tr>
        @endforeach
    </table>

@endsection


