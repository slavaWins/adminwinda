<a href="{{$href??"#"}}">

    @if($icon)
        <icongg class="material-symbols-outlined  ">{{$icon}}</icongg>
    @endif
    {{$slot??"Ссылка без названия"}}

</a>
