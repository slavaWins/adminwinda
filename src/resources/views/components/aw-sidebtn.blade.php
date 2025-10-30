<a href="{{$href??"#"}}">

    @if($icon)
        @if(str_ends_with($icon, "svg"))
            <img src="{{$icon}}">
        @else
            <icongg class="material-symbols-outlined">{{$icon}}</icongg>
        @endif

    @endif

    {{$slot??"Ссылка без названия"}}

</a>
