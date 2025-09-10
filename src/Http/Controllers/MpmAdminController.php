<?php

namespace SlavaWins\AdminWinda\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ResponseApi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use MrProperter\Models\MPModel;
use SlavaWins\AdminWinda\Library\ParsingAdminBlade;
use SlavaWins\AdminWinda\Library\RepresentBase;

class MpmAdminController extends Controller
{

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

        $inOnePage =  $represent->inOnePage ;

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

        if(!$represent->isCanDelete)return redirect()->back();

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

    public function copy($modelClass, $id)
    {
        /** @var RepresentBase $represent */
        $represent = RepresentBase::GetRepesentsClasses()[$modelClass] ?? null;
        if (!$represent) return redirect()->back();

        if(!$represent->isCanCopy)return redirect()->back();


        /** @var MPModel $item */
        $item = null;
        if ($id == 0) {
            return redirect()->back()->withErrors("Не найдено");

        } else {
            $item = $represent->modelClass::findOrFail($id);
        }


        if($item){

            $itemNew = $item->replicate();
            $itemNew->save();
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
            return redirect()->route('admin.mpm.edit', ['modelClass' => ParsingAdminBlade::Basename(get_class($represent)), 'id' => $item->id]);
        }


        return redirect()->back();
    }

}
