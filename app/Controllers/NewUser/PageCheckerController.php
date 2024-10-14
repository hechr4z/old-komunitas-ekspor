<?php

namespace App\Controllers\NewUser;

use App\Controllers\BaseController;

class PageCheckerController extends BaseController
{
    public function index()
    {
        return view('NewUser/page-checker/index.php');
    }
}