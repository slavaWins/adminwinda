<div class="col-md-4   sidebarFloatind px-0 py-4  ">

    <span class="spanTitle" style="">Параметры</span>

    <BR><BR>

    <span class="spanTitle">ОСНОВНОЕ  </span>
    <a href="{{route("admin")}}">Главная</a>
    <BR>

    <span class="spanTitle">Пользователи  </span>
    <a href="{{route("admin.users.list")}}">Все
        <span class="badge bg-primary "> {{count(\App\Models\User::all())}}</span>
    </a>


    @yield("sidebar")


    @foreach(\SlavaWins\AdminWinda\Library\ParsingAdminBlade::GetAdminExtendByType("sidebar") as $V)
        @include($V)
    @endforeach


</div>
