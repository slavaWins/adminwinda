@php
    use SlavaWins\AdminWinda\Library\RepresentBase;
    /** @var RepresentBase $rep */
@endphp

<div class="col-md-4   sidebarFloatind px-0 py-2  ">



    <span class="spanTitle">ОСНОВНОЕ  </span>
    <a href="{{route("admin")}}">Главная</a>
    <BR>

    @foreach(RepresentBase::GetRepesentsClasses() as $K=>$rep)
        <span class="spanTitle">
            <icongg class="material-symbols-outlined">{{$rep->iconGoogle??""}}</icongg>
            {{$rep->title}}
          <a href='{{route("admin.mpm.edit",  ['modelClass' => basename( get_class($rep)), 'id'=> 0])}}'> <icongg
                  class="material-symbols-outlined float-end">add</icongg></a>
        </span>

        <x-aw-sidebtn href='{{route("admin.mpm.list", $K)}}' icon="List">Спиоск</x-aw-sidebtn>
    @endforeach


    @if(!isset(RepresentBase::GetRepesentsClasses()['UserRepresent']))
        <span class="spanTitle">Пользователи  </span>
        <a href="{{route("admin.users.list")}}">Все
            <span class="badge bg-primary "> {{count(\App\Models\User::all())}}</span>
        </a>
    @endif

    @yield("sidebar")


    @foreach(\SlavaWins\AdminWinda\Library\ParsingAdminBlade::GetAdminExtendByType("sidebar") as $V)
        @include($V)
    @endforeach


</div>
