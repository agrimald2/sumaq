<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function index()
    {
        $name_view='GENERAR VENTA';
        return view('processes_tables.tbl_sales', compact('name_view'));
    }
}
