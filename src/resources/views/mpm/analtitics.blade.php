@php
    use SlavaWins\Formbuilder\Library\FElement;

   /*** @var \SlavaWins\AdminWinda\Library\RepresentBase  $represent */
   /*** @var \MrProperter\Models\MPModel  $modelExample */
   /*** @var \MrProperter\Models\MPModel  $item */
@endphp


@extends('adminwinda::screen')




@section('content')

    <style>
        .colNav {
            font-size: 12px;
            padding-top: 10px;
            padding-bottom: 40px;
        }

        .colNav > nav > .flex {
            margin-bottom: 16px;
            float: right;
        }

        .colNav > nav > .hidden {
            margin-bottom: 16px;
            float: left;
        }

        .colNav svg {
            width: 20px;
        }
    </style>
    <h1 class="mb-4">
        <icongg class="material-symbols-outlined  " style="font-size: 45px;">Analytics</icongg>
        <BR> {{$represent->title}} / <small>Аналитика данных</small>
    </h1>



    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


    <div class="row       p-0">

        @foreach($analiticDigram as $K=>$data)

            <div class="col-4 mb-4 ">
                <div class="card">
                    <div class="card-body">
                        <h3>{{$data['name']}}</h3>
                        {{$modelExample->GetProperties()[$K]->descr ?? ""}} <BR> <BR>
                        <div>
                            <canvas id="myChart{{$K}}"></canvas>
                        </div>

                        <script>
                            const ctx{{$K}} = document.getElementById('myChart{{$K}}');

                            new Chart(ctx{{$K}}, {
                                type: 'pie',

                                data: JSON.parse('{!! \SlavaWins\AdminWinda\Http\Controllers\MpmAdminController::GeneratePieData($data['options'])!!}'),
                            });
                        </script>


                    </div>
                </div>
            </div>
        @endforeach


    </div>

@endsection


