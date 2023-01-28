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
    <h1>
        {{$represent->title}}
    </h1>
    <small>Выбрать из списка и отредактировать</small>
    <p>Чтобы использовать элемент управления для выполнения поиска, а не как инструмент для ввода данных, выберите
        вариант Поиск записи в форме на основе значения</p>


    <div class="row  ">
        <div class="col-5 aw-card mb-3">

            <div class="row ">
                <div class="col">
                    <h3>{{$represent->title}}</h3>
                </div>

            </div>


            <form method="POST"
                  action="{{ route('admin.mpm.edit.post', ["modelClass"=>basename(get_class($represent)),'id'=> $item->id ?? 0] ) }}">
                @csrf


                @php
                    $item->BuildInputAll();
                @endphp

                <button type="submit" class="mt-4 btn btn-primary col-12 p-3 shadow-0 btn-submit-auth">
                    Отправить
                </button>

            </form>

        </div>

        @foreach(\SlavaWins\AdminWinda\Library\ParsingAdminBlade::GetAdminExtendByType($represent->modelClass."-show") as $V)
            @include($V,['user'=>$item])
        @endforeach
    </div>
@endsection


