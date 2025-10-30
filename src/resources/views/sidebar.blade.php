@php
    use SlavaWins\AdminWinda\Library\RepresentBase;
    use SlavaWins\AdminWinda\Library\ParsingAdminBlade;
@endphp

<div class="col-md-4   sidebarFloatind sidebarFloatindAdding px-0 py-2  ">


    <a href="{{route("admin")}}">Главная</a>
    <BR>


    @include('adminwinda::sidebar.represents-links')


    @include('adminwinda::sidebar.extends')
    

    @yield("sidebar")


</div>
