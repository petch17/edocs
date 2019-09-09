<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Objective;
use App\Edoc;

class SentController extends Controller
{
    public function index()
    {
        // $edocs = Edoc::with('tbobjective')->where('เอกสารที่อนุมัติแล้ว')->get();
        $edocs = Edoc::with('tbobjective')->get();
        return view('sent.index',['edocs' => $edocs]);
    }
}
