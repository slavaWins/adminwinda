<?php

namespace SlavaWins\AdminWinda\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserAdminController extends Controller
{


    public function index()
    {
        $users = User::all();
        return view('adminwinda::page.users-list', compact(['users']));
    }


    public function show(User $user)
    {
        return view('adminwinda::page.users-show', compact(['user']));

    }
}
