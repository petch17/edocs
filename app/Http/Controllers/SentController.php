<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Receiver;
use App\Objective;
use App\Edoc;

class SentController extends Controller
{
    public function index()
    {
        $edocs = Edoc::with('tbobjective')->where('status' , 'เอกสารที่อนุมัติแล้ว')->get();
        // $edocs = Edoc::with('tbobjective')->get();
        return view('sent.index',['edocs2' => $edocs]);
    }

    public function create($id)
    {
        return $id;
        // return view('sent.create',['edoc_id' => $id]);
    }
}
