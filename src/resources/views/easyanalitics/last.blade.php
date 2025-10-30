@php

    use SlavaWins\EasyAnalitics\Models\EasyAnaliticsSetting;

      /** @var string $ind */
      $info  = EasyAnaliticsSetting::GetAnaliticsData($ind);

@endphp

@if($info)

    <div class="col-12 col-md-4 analyticBlock  ">

        <div class="  ">

            <span class="_val">{{number_format($info->data->last()->amount)}}</span>

            <BR>
            <span class="_name">{{$info->setting->name}} </span>

            <BR>
            <span class="_descr">{{$info->setting->descr}} </span>

            <br>

            <span class="_date">За {{$info->data->last()->date_day}}</span>


        </div>


    </div>

@else
    Not found  {{$ind}} analitics!
@endif
