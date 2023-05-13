<?php

namespace SlavaWins\AdminWinda\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ResponseApi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use MrProperter\Models\MPModel;
use SlavaWins\AdminWinda\Library\RepresentBase;

class MpmAdminController extends Controller
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
                    foreach ($props[$propKey]->options as $optionK => $optionName) {

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
                foreach ($props[$K]->options as $oK => $oV) {
                    $analiticDigram[$K]['options'][$oK] = [
                        'name' => $oV,
                        'count' => 0,
                    ];
                }
            }


            foreach ($q as $item) {


                foreach ($represent->analiticsDiagramBySelect as $propKey) {
                    foreach ($props[$propKey]->options as $optionK => $optionName) {
                        if ($item->$propKey == $optionK) {
                            $analiticDigram[$propKey]['options'][$optionK]['count'] += 1;
                        }
                    }
                }
            }

        }
        return view('adminwinda::mpm.analtitics', compact(['represent', 'modelExample', 'analiticDigram']));
    }


    public function list($modelClass)
    {
        /** @var RepresentBase $represent */
        $represent = RepresentBase::GetRepesentsClasses()[$modelClass] ?? null;
        if (!$represent) return redirect()->back();

        /** @var MPModel $modelExample */
        $modelExample = new $represent->modelClass();
        //$dataList = $modelExample->modelClass::all();
        $q = $represent->modelClass::where("id", ">", 0);

        $s = request("s") ?? "";
        if (!empty($s)) {
            $first = true;
            foreach ($modelExample->GetProperties() as $K => $V) {
                if ($V->typeData <> 'string' and $V->typeData <> 'text') continue;

                if ($first) {
                    $q = $represent->modelClass::where($K, 'LIKE', "%{$s}%");
                    $first = false;
                } else {
                    $q = $q->orWhere($K, 'LIKE', "%{$s}%");
                }

            }

            if (intval($s) > 0) {
                $q = $q->orWhere('id', intval($s));
            }
        }

        $sort = request("sort") ?? "";
        if (!empty($sort)) {
            $sortArrow = request("sortArrow") ?? "descr";
            if (request("sortArrow") == "DESC") {
                $q = $q->orderBy($sort, "DESC");
            } else {
                $q = $q->orderBy($sort, "ASC");
            }
        }

        $inOnePage = 22;

        $countPages = ceil($q->count() / $inOnePage);
        $dataList = $q->paginate($inOnePage);


        return view('adminwinda::mpm.list', compact(['represent', 'modelExample', 'dataList', 'countPages']));
    }


    public function edit($modelClass, $id)
    {
        /** @var RepresentBase $represent */
        $represent = RepresentBase::GetRepesentsClasses()[$modelClass] ?? null;
        if (!$represent) return redirect()->back();


        /** @var MPModel $item */
        $item = null;
        if ($id == 0) {
            $item = new $represent->modelClass();

        } else {
            $item = $represent->modelClass::findOrFail($id);
        }



        return view('adminwinda::mpm.edit', compact(['represent', 'item']));
    }


    public function delete($modelClass, $id)
    {
        /** @var RepresentBase $represent */
        $represent = RepresentBase::GetRepesentsClasses()[$modelClass] ?? null;
        if (!$represent) return redirect()->back();


        /** @var MPModel $item */
        $item = null;
        if ($id == 0) {
            return redirect()->back()->withErrors("Не найдено");

        } else {
            $item = $represent->modelClass::findOrFail($id);
        }

        if($item){
            $item->delete();
        }

        return redirect()->back();
    }

    public function editSave($modelClass, $id, $tag, Request $request)
    {

        /** @var RepresentBase $represent */
        $represent = RepresentBase::GetRepesentsClasses()[$modelClass] ?? null;
        if (!$represent) return redirect()->back();

        /** @var MPModel $item */
        $item = null;
        if ($id == 0) {
            $item = new $represent->modelClass();

        } else {
            $item = $represent->modelClass::findOrFail($id);
        }


        $validator = $item::GetValidatorRequest($request->toArray(), $tag);
        $validator->validate();


        $item->PropertyFillebleByTag($request->toArray(), $tag);
        $item->save();

        if ($id == 0) {
            return redirect()->route('admin.mpm.edit', ['modelClass' => basename(get_class($represent)), 'id' => $item->id]);
        }


        return redirect()->back();
    }

}
