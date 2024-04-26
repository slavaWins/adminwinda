<?php

namespace SlavaWins\AdminWinda\Library;


use MrProperter\Models\MPModel;

class  RepresentBase
{

    public $iconGoogle = "face";
    public $descr = "Общий список пользователей проекта";
    public $title = "Пользователи";
    public $modelClass = null;

    /** @var array $analiticsDiagramBySelect Перечисли массивом ['xz','myType'] поля  $config->Select() и по ним будут созданы диаграммы аналитики */
    public $analiticsDiagramByMulitioptions = 'auto';
    public $analiticsDiagramBySelect = 'auto';
    public $analiticsDiagramByValuesVariant = null;
    public $ignoreTags = [];
    public $tagTitle = [
        'approve'=>"Модерация",
        'qa'=>"Раздел тестера",
        'profile'=>"Профиль",
        'profile_notify_if'=>"Настройки уведомлений"
    ];


    /*

    НЕапример поле estimate может быть вот таких вариантов, это как селект только хз
        public $analiticsDiagramByValuesVariant = ['estimate' => [1, 2, 3, 4, 5]];

     */

    /** @var bool $image Выводить ли картинку в админке? Если да, то она будет выведена через  GetImagePreview */
    public $image = false;

    public function GetImagePreview($model)
    {
        return null;
    }

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

            $listClasses[ParsingAdminBlade::Basename($cln)] = $cl;
        }
        return $listClasses;
    }

    public function __construct()
    {
        if (class_exists($this->modelClass)) {
            if ($this->analiticsDiagramBySelect == 'auto') {

                $this->analiticsDiagramBySelect = [];
                /** @var MPModel $modelExample */
                $modelExample = new $this->modelClass();
                foreach ($modelExample->GetProperties() as $K => $V) {
                    if ($V->typeData == "select") {
                        $this->analiticsDiagramBySelect[] = $K;
                    }
                }

                if (empty($this->analiticsDiagramBySelect)) $this->analiticsDiagramBySelect = null;
            }


            if ($this->analiticsDiagramByMulitioptions == 'auto') {

                $this->analiticsDiagramByMulitioptions = [];
                /** @var MPModel $modelExample */
                $modelExample = new $this->modelClass();
                foreach ($modelExample->GetProperties() as $K => $V) {
                    if ($V->typeData == "multioption") {
                        $this->analiticsDiagramByMulitioptions[] = $K;
                    }
                }

                if (empty($this->analiticsDiagramByMulitioptions)) $this->analiticsDiagramByMulitioptions = null;
            }
        }

    }

}
