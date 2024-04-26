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


    </style>
    <h1>
        {{$represent->title}}
    </h1>
    <small>Выбрать из списка и отредактировать</small>
    <p>Чтобы использовать элемент управления для выполнения поиска, а не как инструмент для ввода данных, выберите
        вариант Поиск записи в форме на основе значения</p>


    <div class="row    ">

        @foreach(\SlavaWins\AdminWinda\Library\ParsingAdminBlade::GetAdminExtendByType($represent->modelClass."-show") as $V)
            <div class="col-12 col-md-6 col-xs-4 mb-3">

                @include($V,['user'=>$item])
            </div>
        @endforeach



        @foreach($item->GetAllTags() as $tag)

            @if(!in_array( $tag, $represent->ignoreTags) && !is_int($tag))
                <div class="col-12 col-md-6 col-xs-4 mb-3">
                    <div class=" aw-card ">


                        <div class="col">
                            <h3> {{$represent->tagTitle[$tag] ??  $tag}}

                            </h3>
                            <small> #{{$tag}}</small>
                        </div>

                        @php
                            $route_ = route('admin.mpm.edit.post', ["modelClass"=>ParsingAdminBlade::Basename(get_class($represent)),'id'=> $item->id ?? 0, 'tag'=>$tag] );
                        @endphp

                        <x-easy-form route="{{ $route_  }}" btn="Сохранить">


                            @php
                                $item->BuildInputAll($tag);
                            @endphp


                        </x-easy-form>

                    </div>
                </div>
            @endif
        @endforeach

    </div>
@endsection


