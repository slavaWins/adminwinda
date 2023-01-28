<div class="col aw-card {{$class??""}}">

    @if($icon)
        <span class="material-symbols-outlined iconRound "
              style="  ">{{$icon}}</span>
    @endif
    {{$slot??"Карта без названия"}}


    @if($val)
        <b> {{$val}}</b>
    @endif
</div>
