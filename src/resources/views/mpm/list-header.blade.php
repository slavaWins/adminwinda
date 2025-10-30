@php
    use SlavaWins\Formbuilder\Library\FElement;

    use SlavaWins\AdminWinda\Library\ParsingAdminBlade;
   /*** @var \SlavaWins\AdminWinda\Library\RepresentBase  $represent */
   /*** @var \MrProperter\Models\MPModel  $modelExample */
   /*** @var \MrProperter\Models\MPModel  $item */
@endphp

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
