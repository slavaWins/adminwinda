@php

    use SlavaWins\EasyAnalitics\Models\EasyAnaliticsSetting;

      /** @var string $ind */
      $info  = EasyAnaliticsSetting::GetAnaliticsData($ind);

@endphp

@if($info)

    <div class="col-12 col-md-4 m-0 mb-4">

        <div class=" aw-card card-body p-4  ">

            <span style="font-size: 3em">{{number_format($info->data->last()->amount)}}</span>

            <BR> {{$info->setting->name}}
            <br>

            <span style="font-size: 0.4em;">За {{$info->data->last()->date_day}}</span>



        </div>


    </div>

@else
    Not found  {{$ind}} analitics!
@endif
