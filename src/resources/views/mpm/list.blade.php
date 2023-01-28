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

    <div class="col aw-card mb-3">

        <div class="row">
            <div class="col">
                <h3>{{$represent->title}}</h3>
            </div>
            <div class="col">
                <form method="GET">
                    <div class="input-group mb-3  border border-2 rounded">
                        <span class="input-group-text border-0"><icongg
                                class="material-symbols-outlined">search</icongg></span>
                        <input type="text" name="s" class="form-control border-0" placeholder="Что ищем..."
                               value="{{request("s")??""}}">
                        <button type="submit" class="input-group-text border-0" type="button" id="button-addon2">Найти
                        </button>
                    </div>
                </form>
            </div>
        </div>


        <table class="table  bg-white">
            <tr>

                @if($represent->image)
                    <td>Превью</td>
                @endif


                @php
                    $arrayPropertys = [];

                    $arrayPropertys['id']=(object)['label'=>"ИД"];
                    foreach ($modelExample->GetByTag( 'admin') as $K=>$V){
                          $arrayPropertys[$K]=$V;
                    }
                @endphp

                @foreach($arrayPropertys as $K=>$V)
                    @php
                        $isSort = request("sort") == $K;
                        $sortArrow = request("sortArrow") ??"DESC";
                        if($sortArrow=="DESC"){
                            $sortArrow="ASC";
                        }else{
                            $sortArrow="DESC";
                        }

                        $href = [  'sort'=>$K, 'sortArrow'=>$sortArrow, 's'=>request('s')];
                        $href=http_build_query($href);

                    @endphp
                    <td><a href="?{{$href}}">
                            @if($isSort)
                                @if($sortArrow=="DESC")
                                    ⬆️
                                @else
                                    ⬇️
                                @endif
                            @endif

                            {{$V->label ?? ""}}
                            <br>
                            <small>{{$K}}</small>
                        </a>
                    </td>
                @endforeach


                @foreach(\SlavaWins\AdminWinda\Library\ParsingAdminBlade::GetAdminExtendByType($represent->modelClass."-table-header") as $V)
                    @include($V)
                @endforeach

                <td>
                    Управление
                </td>
            </tr>

            @foreach($dataList as $item)

                @php
                    $link = route("admin.mpm.edit", ['modelClass' => basename( get_class($represent)), 'id'=> $item->id]);
                @endphp
                <tr>

                    @if($represent->image)
                        <td class="p-1">
                            @if($represent->GetImagePreview($item))
                                <div class="rounded"
                                     style="background: url('{{$represent->GetImagePreview($item)}}') center; height: 54px;width: 54px; background-size: cover;">

                                </div>

                            @else
                                <BR>
                                ⚠️ нет
                            @endif
                        </td>
                    @endif

                    <td>
                        <a href="{{ $link }}">
                            {{$item->id}}
                        </a>
                    </td>

                    @foreach($item->GetByTag( 'admin') as $K=>$V)
                        <td>{{$item->GetProperties()[$K]->RenderValue() ?? ""}}  </td>
                    @endforeach

                    @foreach(\SlavaWins\AdminWinda\Library\ParsingAdminBlade::GetAdminExtendByType($represent->modelClass."-table-body") as $V)
                        @include($V,['item'=>$item, strtolower(basename($represent->modelClass))=>$item])
                    @endforeach

                    <td>
                        <a href="{{ $link }}">
                            Редактировать
                        </a>
                    </td>

                </tr>

            @endforeach
        </table>

        <div class="col-12 colNav">
            {{$dataList->appends(['s' => request("s")??"", 'sort' => request("sort")??"", 'sortArrow' => request("sortArrow")??""])->links()}}
        </div>
    </div>
@endsection


