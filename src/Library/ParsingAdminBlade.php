<?php


namespace SlavaWins\AdminWinda\Library;


use Illuminate\Support\Facades\Route;
use MrProperter\Models\MPModel;
use SlavaWins\AdminWinda\Http\Controllers\UserAdminController;

class ParsingAdminBlade
{


    public static function Basename($nameFull){
        $nameFull = str_replace("\\","/", $nameFull);

        return basename($nameFull);
    }

    public static function MpmListAdminRenderValue(MPModel $item, $key){
        $prop = $item->GetProperties()[$key];

        $text = $item->GetProperties()[$key]->RenderValue() ?? "";


        if($prop->belongsToClass){
            if(! $prop->value)return $text;
            $href = route("admin.mpm.edit", ['modelClass' => ParsingAdminBlade::Basename( $prop->belongsToClass).'Represent', 'id'=> $prop->value]);


            $text = "<a href='$href'>$text</a>";
        }

        return $text;
    }



    public static function GetAdminExtendByType($bladeName)
    {
        $bladeName = strtolower($bladeName);
        $bladeName=ParsingAdminBlade::Basename($bladeName);

        $list = [];
        foreach (self::ScanAdminViewFoolder() as $K => $V) {
            $fname = $bladeName . '.blade.php';
            if (!file_exists($V . '/' . $fname)) continue;
            $list[] = $K . '.' . $bladeName;
        }
        return $list;
    }

    public static function ScanAdminViewFoolder()
    {
        $list = [];
        $path = resource_path("views");
        foreach (scandir($path) as $K => $V) if ($K > 1) {
            $thepath = $path . '/' . $V . '/admin-extend';
            if (!file_exists($thepath)) continue;
            $vpath = $V . '.admin-extend';
            $list[$vpath] = $thepath;
        }
        return $list;
    }
}
