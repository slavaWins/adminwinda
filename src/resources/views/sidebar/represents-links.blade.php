@php
    use SlavaWins\AdminWinda\Library\RepresentBase;
    use SlavaWins\AdminWinda\Library\ParsingAdminBlade;
    /** @var RepresentBase $rep */
@endphp


@foreach(RepresentBase::GetRepesentsClasses() as $K=>$rep)
    <span class="spanTitle">
            <icongg class="material-symbols-outlined">{{$rep->iconGoogle??""}}</icongg>
            {{$rep->title}}

        @if($rep->isCanCreatedAuto)
            <a href='{{route("admin.mpm.edit",  ['modelClass' => ParsingAdminBlade::Basename( get_class($rep)), 'id'=> 0])}}'> <icongg
                    class="material-symbols-outlined float-end">add</icongg></a>
        @endif
        @if($rep->isCanCreatedUrlCustom)
            <a href='{{($rep->isCanCreatedUrlCustom)}}'> <icongg
                    class="material-symbols-outlined float-end">add</icongg></a>
        @endif

        </span>

    <x-aw-sidebtn href='{{route("admin.mpm.list", $K)}}' icon="List">Список</x-aw-sidebtn>

    @if($rep->analiticsDiagramBySelect OR $rep->analiticsDiagramByValuesVariant)
        <x-aw-sidebtn href='{{route("admin.mpm.analtitics", $K)}}' icon="Analytics">Аналитика</x-aw-sidebtn>
    @endif
@endforeach

