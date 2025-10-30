@php
    use SlavaWins\AdminWinda\Library\RepresentBase;
    use SlavaWins\AdminWinda\Library\ParsingAdminBlade;
    /** @var RepresentBase $rep */


@endphp


@foreach(RepresentBase::GetRepesentsClasses() as $K=>$rep)

    @php
        $hrefAdding = null;

     if($rep->isCanCreatedAuto)$hrefAdding = route("admin.mpm.edit",  ['modelClass' => ParsingAdminBlade::Basename( get_class($rep)), 'id'=> 0]);
     if($rep->isCanCreatedUrlCustom)$hrefAdding = $rep->isCanCreatedUrlCustom;

    @endphp

    
    <div class="representSection">


        <span class="spanTitle">

            @if(str_ends_with($rep->iconGoogle ?? "",".svg"))

                <img src="{{$rep->iconGoogle}}"/>
            @else
                <icongg class="material-symbols-outlined">{{$rep->iconGoogle??""}}</icongg>
            @endif

            {{$rep->title}}



       </span>

        <a href="{{route("admin.mpm.list", $K)}}">Список</a>

        @if($rep->analiticsDiagramBySelect OR $rep->analiticsDiagramByValuesVariant)
            <a href="{{route("admin.mpm.analtitics", $K)}}">Аналитика</a>
        @endif

        @if($hrefAdding)
            <a href="{{$hrefAdding}}">Добавить</a>
        @endif
    </div>
@endforeach

