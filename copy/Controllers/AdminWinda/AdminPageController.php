<?php

    namespace App\Http\Controllers\AdminWinda;

    use App\Http\Controllers\Controller;
    use App\Models\ResponseApi;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Validator;

    class AdminPageController extends Controller
    {


        public function index() {


            return view('admin-layout-extend.index');

        }
    }
