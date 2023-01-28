<?php

namespace SlavaWins\AdminWinda\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class IndexAdminController extends Controller
{


    public function index()
    {
        $xz = [];
        return view('adminwinda::page.index', compact(['xz']));
    }

}
