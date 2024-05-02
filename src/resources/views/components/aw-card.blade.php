<div class="col card {{$class??""}}">
<div class=" aw-card card-body p-4  ">

    @if($icon)
        <span class="material-symbols-outlined iconRound "
              style="  ">{{$icon}}</span>
    @endif
    {{$slot??"Карта без названия"}}


    @if($val)
        <b> {{$val}}</b>
    @endif
</div>
</div>
