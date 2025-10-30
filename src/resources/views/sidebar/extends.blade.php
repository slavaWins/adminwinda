@php
    use SlavaWins\AdminWinda\Library\RepresentBase;
    use SlavaWins\AdminWinda\Library\ParsingAdminBlade;
    /** @var RepresentBase $rep */
@endphp


@foreach(\SlavaWins\AdminWinda\Library\ParsingAdminBlade::GetAdminExtendByType("sidebar") as $V)
    @include($V)
@endforeach
