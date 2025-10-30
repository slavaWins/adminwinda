@php
    use SlavaWins\AdminWinda\Library\RepresentBase;
    use SlavaWins\AdminWinda\Library\ParsingAdminBlade;
@endphp

<div class="col-md-4   sidebarFloatind sidebarFloatindAdding    ">


    <a href="{{route("admin")}}">Главная</a>


    @include('adminwinda::sidebar.represents-links')


    @include('adminwinda::sidebar.extends')


    @yield("sidebar")


</div>
