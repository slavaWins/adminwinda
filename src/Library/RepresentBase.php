<?php

namespace SlavaWins\AdminWinda\Library;


use MrProperter\Models\MPModel;

class  RepresentBase
{

    public $iconGoogle = "face";
    public $descr = "Общий список пользователей проекта";
    public $title = "Пользователи";
    public $modelClass = null;


    public static function GetRepesentsClasses()
    {
        $listClasses = [];
        foreach (scandir(app_path("Admin/Represents")) as $K => $file) if ($K > 1) {
            if ($file == "RepresentBase.php") continue;

            $cln = '\App\Admin\Represents\\' . $file;

            $cln = str_replace('.php', '', $cln);

            if (!class_exists($cln)) continue;

            /** @var RepresentBase $cl */
            $cl = new $cln();

            $listClasses[basename($cln)] = $cl;
        }
        return $listClasses;
    }

}
