@php
    use SlavaWins\AdminWinda\Library\RepresentBase;
    use SlavaWins\AdminWinda\Library\ParsingAdminBlade;
    /** @var RepresentBase $rep */
@endphp

<div class="col-md-4   sidebarFloatind sidebarFloatindAdding px-0 py-2  ">



    <span class="spanTitle">ОСНОВНОЕ  </span>
    <a href="{{route("admin")}}">Главная</a>
    <BR>

    @foreach(RepresentBase::GetRepesentsClasses() as $K=>$rep)
        <span class="spanTitle">
            <icongg class="material-symbols-outlined">{{$rep->iconGoogle??""}}</icongg>
            {{$rep->title}}

            @if($rep->isCanCreatedAuto)
                 <a href='{{route("admin.mpm.edit",  ['modelClass' => ParsingAdminBlade::Basename( get_class($rep)), 'id'=> 0])}}'> <icongg
                  class="material-symbols-outlined float-end">add</icongg></a>
            @endif
            @if($rep->isCanCreatedUrlCustom)
                 <a href='{{route($rep->isCanCreatedUrlCustom)}}'> <icongg
                  class="material-symbols-outlined float-end">add</icongg></a>
            @endif

        </span>

        <x-aw-sidebtn href='{{route("admin.mpm.list", $K)}}' icon="List">Список</x-aw-sidebtn>

        @if($rep->analiticsDiagramBySelect OR $rep->analiticsDiagramByValuesVariant)
            <x-aw-sidebtn href='{{route("admin.mpm.analtitics", $K)}}' icon="Analytics">Аналитика</x-aw-sidebtn>
        @endif
    @endforeach


    @if(!isset(RepresentBase::GetRepesentsClasses()['UserRepresent']))
        <span class="spanTitle">Пользователи  </span>
        <a href="{{route("admin.users.list")}}">Все
            <span class="badge bg-primary "> {{count(\App\Models\User::all())}}</span>
        </a>
    @endif


    @foreach(\SlavaWins\AdminWinda\Library\ParsingAdminBlade::GetAdminExtendByType("sidebar") as $V)
        @include($V)
    @endforeach

    @yield("sidebar")


</div>
