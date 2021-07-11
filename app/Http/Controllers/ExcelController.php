<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExcelController extends Controller
{
    public function import(Request $request)
    {
        return $request->all();
    }
}
