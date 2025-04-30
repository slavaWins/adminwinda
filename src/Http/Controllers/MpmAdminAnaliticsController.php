<?php

namespace SlavaWins\AdminWinda\Http\Controllers;

use App\Http\Controllers\Controller;
use MrProperter\Models\MPModel;
use SlavaWins\AdminWinda\Library\RepresentBase;

class MpmAdminAnaliticsController extends Controller
{


    public static function GeneratePieData($list)
    {
        $ar = [
            'labels' => [],
            'datasets' => [],
        ];

        $data = [];
        foreach ($list as $K => $V) {
            if ($V['count'] <= 0) continue;
            $ar['labels'][] = $V['name'];
            $data[] = $V['count'];

        }
        $ar['datasets'][] = [
            'label' => '#  шт',
            'data' => $data
        ];
        return json_encode($ar);
    }

    public function analtitics($modelClass)
    {

        /** @var RepresentBase $represent */
        $represent = RepresentBase::GetRepesentsClasses()[$modelClass] ?? null;
        if (!$represent) return redirect()->back();
        if (!$represent->analiticsDiagramBySelect && !$represent->analiticsDiagramByValuesVariant) return redirect()->back();


        /** @var MPModel $modelExample */
        $modelExample = new $represent->modelClass();

        $props = $modelExample->GetProperties();

        $cln = new $represent->modelClass();

        $analiticDigram = [];


        if ($represent->analiticsDiagramByValuesVariant) {
            $keys = collect($represent->analiticsDiagramByValuesVariant)->keys();
            $q = $cln::select($keys->toArray())->get();
            foreach ($keys as $K) {
                $analiticDigram[$K] = [];
                $analiticDigram[$K]['name'] = $props[$K]->label;
                foreach ($represent->analiticsDiagramByValuesVariant[$K] as $oV) {
                    $name = $oV;
                    if ($name === true) $name = "Да";
                    if ($name === false) $name = "Нет";
                    $analiticDigram[$K]['options'][$oV] = [
                        'name' => $name,
                        'count' => 0,
                    ];
                }
            }

            foreach ($q as $item) {
                foreach ($keys as $propKey) {
                    foreach ($represent->analiticsDiagramByValuesVariant[$K] as $optionK) {

                        if ($item->$propKey == $optionK) {
                            $analiticDigram[$propKey]['options'][$optionK]['count'] += 1;
                        }
                    }
                }
            }

        }

        if ($represent->analiticsDiagramByMulitioptions === "auto") $represent->analiticsDiagramByMulitioptions = null;
        if ($represent->analiticsDiagramBySelect === "auto") $represent->analiticsDiagramBySelect = null;


        /** Аналитика по мультиопшинам **/
        if ($represent->analiticsDiagramByMulitioptions) {

            $q = $cln::select($represent->analiticsDiagramByMulitioptions)->get();

            foreach ($represent->analiticsDiagramByMulitioptions as $K) {
                $analiticDigram[$K] = [];
                $analiticDigram[$K]['name'] = $props[$K]->label;
                foreach ($props[$K]->options as $oK => $oV) {
                    $analiticDigram[$K]['options'][$oK] = [
                        'name' => $oV,
                        'count' => 0,
                    ];
                }
            }


            foreach ($q as $item) {


                foreach ($represent->analiticsDiagramByMulitioptions as $propKey) {
                    $valueItem = $item->$propKey;
                    if (!$valueItem) continue;
                    if (is_string($valueItem)) $valueItem = json_decode($valueItem, true);
                    if (empty($valueItem)) continue;
                    foreach ($props[$propKey]->GetOptions() as $optionK => $optionName) {

                        if (isset($valueItem[$optionK])) {
                            $analiticDigram[$propKey]['options'][$optionK]['count'] += 1;
                        }
                    }
                }
            }

        }

        /** Аналитика по селектам **/
        if ($represent->analiticsDiagramBySelect) {


            $q = $cln::select($represent->analiticsDiagramBySelect)->get();


            foreach ($represent->analiticsDiagramBySelect as $K) {
                $analiticDigram[$K] = [];
                $analiticDigram[$K]['name'] = $props[$K]->label;

                if ($props[$K]->typeData == "checkbox") {
                    $analiticDigram[$K]['options'][0] = [
                        'name' => "Нет",
                        'count' => 0,
                    ];
                    $analiticDigram[$K]['options'][1] = [
                        'name' => "Да",
                        'count' => 0,
                    ];

                } else {
                    foreach ($props[$K]->GetOptions() as $oK => $oV) {
                        $analiticDigram[$K]['options'][$oK] = [
                            'name' => $oV,
                            'count' => 0,
                        ];
                    }
                }
            }


            foreach ($q as $item) {

                foreach ($represent->analiticsDiagramBySelect as $propKey) {

                    if ($props[$propKey]->typeData == "checkbox") {
                        $analiticDigram[$propKey]['options'][$item->$propKey]['count'] += 1;
                    } else {
                        foreach ($props[$propKey]->GetOptions() as $optionK => $optionName) {

                            if ($item->$propKey == $optionK) {
                                $analiticDigram[$propKey]['options'][$optionK]['count'] += 1;
                            }
                        }
                    }
                }
            }

        }
        return view('adminwinda::mpm.analtitics', compact(['represent', 'modelExample', 'analiticDigram']));
    }


}
