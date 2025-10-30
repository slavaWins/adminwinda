@php
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


    </style>



    @include("adminwinda::mpm.list-header")

    <div class="  table-responsive mrpAdminDivOuterTable">


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
                    $linkCopy = route("admin.mpm.copy", ['modelClass' => ParsingAdminBlade::Basename( get_class($represent)), 'id'=> $item->$_idKey ]);
                    $linkDelete= route("admin.mpm.delete", ['modelClass' => ParsingAdminBlade::Basename( get_class($represent)), 'id'=> $item->$_idKey ]);



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

                    <td class="td_functions">
                        <a href="{{ $link }}">
                            Редактировать
                        </a>


                        @if($represent->isCanCopy)
                            <a href="{{ $linkCopy }}"
                               approvedModal="Вы действительно хотите копировать этот&nbsp;элемент?">
                                Копировать
                            </a>
                        @endif

                        @if($represent->isCanDelete)
                            <a href="{{ $linkDelete }}"
                               approvedModal="Вы действительно хотите удалить этот&nbsp;элемент?">
                                Удалить
                            </a>
                        @endif


                    </td>

                </tr>

            @endforeach
        </table>

        <div class="col-12 colNav">
            {{$dataList->appends(['s' => request("s")??"", 'sort' => request("sort")??"", 'sortArrow' => request("sortArrow")??""])->links()}}
        </div>

    </div>
@endsection


