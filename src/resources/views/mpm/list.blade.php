@php
    use SlavaWins\Formbuilder\Library\FElement;

    use SlavaWins\AdminWinda\Library\ParsingAdminBlade;
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

        ._showSideBtn {
            cursor: pointer;
        }

        .sidebarFloatind {
            transition: 0.2s;
        }

        .sidebarFloatindAdding {
            display: none;
            width: 74px;
            overflow: scroll;

        }

        .mrpListAdminTrFirst a {
            font-size: 12px;
            font-weight: 400;
            color: #888888;
        }
    </style>

    <script>
        function ShowMenuNavLeft() {
            $("._showSideBtn").hide();
            $(".sidebarFloatind").show();
            $(".sidebarFloatind").removeClass('sidebarFloatindAdding');
        }
    </script>
    <a onclick="ShowMenuNavLeft();" class="_showSideBtn">
        <svg width="31" class="svgBurger" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path d="M4.5 8H19.5" stroke-width="1.5" stroke-linecap="round"></path>
            <path d="M4.5 12H19.5" stroke-width="1.5" stroke-linecap="round"></path>
            <path d="M4.5 16H19.5" stroke-width="1.5" stroke-linecap="round"></path>
        </svg>
    </a>

    <h1>
        {{$represent->title}}
    </h1>


    <div class="row">

        <div class="col">
            <form method="GET">
                <div class="input-group mb-3  border border-2 rounded">
                        <span class="input-group-text border-0"><icongg
                                class="material-symbols-outlined">search</icongg></span>
                    <input type="text" name="s" class="form-control border-0" placeholder="Что ищем..."
                           value="{{request("s")??""}}" style="background: transparent;">
                    <button type="submit" class="input-group-text border-0" type="button" id="button-addon2">Найти
                    </button>
                </div>
            </form>
        </div>
        <div class="col">

        </div>
    </div>


    <div class="col">
        <div class="col aw-card mb-3 table-responsive mrpAdminDivOuterTable">


            <table class="table  bg-white ">
                <tr class="mrpListAdminTrFirst">

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

                    $_idKey = $item->getRouteKeyName();

                        $link = route("admin.mpm.edit", ['modelClass' => ParsingAdminBlade::Basename( get_class($represent)), 'id'=> $item->$_idKey ]);

                        if($represent->customUrlEdit){
                            $link = str_replace("{id}", $item->id, $represent->customUrlEdit);
                        }
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

                            <td>{!!  \SlavaWins\AdminWinda\Library\ParsingAdminBlade::MpmListAdminRenderValue($item, $K)  !!}  </td>
                        @endforeach

                        @foreach(\SlavaWins\AdminWinda\Library\ParsingAdminBlade::GetAdminExtendByType($represent->modelClass."-table-body") as $V)
                            @include($V,['item'=>$item, strtolower(ParsingAdminBlade::Basename($represent->modelClass))=>$item])
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
    </div>
@endsection


