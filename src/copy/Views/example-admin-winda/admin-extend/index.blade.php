@extends('adminwinda::screen')

@php

    use SlavaWins\EasyAnalitics\Models\EasyAnaliticsSetting;

    \SlavaWins\EasyAnalitics\Library\EasyAnaliticsHelper::Increment("example_admin_view", 1,"Просмотр админки", "Кто-то зашел на админку");
    \SlavaWins\EasyAnalitics\Library\EasyAnaliticsHelper::Increment("example_rand", rand(1,15),"Что-то рандомное", "Записываем рандомную метрику");
@endphp


@section('content')

    <h1>Панель управления</h1>
    <p>
        Панель управления - это простой и понятный инструмент для выполнения повседневных задач контент-менеджера. От
        простого редактирования информации до управления разделами проекта.</p>

    <br>

    <div class="row row-cols-4  mb-4">
        @foreach(EasyAnaliticsSetting::all() as $item)
                @include('adminwinda::easyanalitics.last',['ind' =>$item->ind])
        @endforeach
    </div>


    <div class="col aw-card mb-3">
        <h2>Воронка регистраций</h2>

        @include("easyanalitics::voronka", ['inds'=>['auth_phone_first','auth_code_first'],'name'=>""])
    </div>


    <div class="col aw-card mb-3">
        <h2>График</h2>
        <div>
            <canvas id="myChart"></canvas>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <script>
            const ctx = document.getElementById('myChart');

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                    datasets: [{
                        label: '# of Votes',
                        data: [12, 19, 3, 5, 2, 3],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>
    </div>

@endsection

