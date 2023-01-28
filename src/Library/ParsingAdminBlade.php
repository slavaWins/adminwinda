<?php


namespace SlavaWins\AdminWinda\Library;


use Illuminate\Support\Facades\Route;
use SlavaWins\AdminWinda\Http\Controllers\UserAdminController;

class ParsingAdminBlade
{


    public static function GetAdminExtendByType($bladeName)
    {
        $bladeName = strtolower($bladeName);
        $bladeName=basename($bladeName);

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
