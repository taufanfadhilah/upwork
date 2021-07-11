<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use App\Imports\UsersImport;
use App\Imports\MingMartClothesImport;
class ExcelController extends Controller
{
    public function import(Request $request)
    {
        $start = microtime(true);
        Excel::import(new MingMartClothesImport, $request->excel);
        $end = microtime(true);
        $time = number_format(($end - $start), 2);
        return "This page loaded in $time seconds";
    }
}
