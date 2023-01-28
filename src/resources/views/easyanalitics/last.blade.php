@php

    use SlavaWins\EasyAnalitics\Models\EasyAnaliticsSetting;

      /** @var string $ind */
      $info  = EasyAnaliticsSetting::GetAnaliticsData($ind);

@endphp

@if($info)

    <div class="col m-0 mb-4">
        <x-aw-card value="{{number_format($info->data->last()->amount)}}" icon="Analytics">
            <small>За {{$info->data->last()->date_day}}</small>


            <BR> {{$info->setting->name}}
            <BR>

        </x-aw-card>
    </div>

@else
    Not found  {{$ind}} analitics!
@endif
