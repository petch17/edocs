<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rcdetail;
use App\Receiver;
use Auth;

class ReadController extends Controller
{
    public function index()
    {
        // $edocs = Receiver::with('rcdetails')->where('status' , 'ยังไม่ส่ง')->where('created_by',Auth::user()->id)->get();
        $tbrc = Rcdetail::where('select_emp',Auth::user()->id)->get();
        $tbrecive = Receiver::where('status','ส่งแล้ว')->get();

        // $edocs = Edoc::with('tbobjective')->get();
        return view('read.index',['tbrc' => $tbrc],['tbrecive' => $tbrecive]);
    }

    public function create($id)
    {
        // return $id;
        // return view('sent.create',['edoc_id' => $id]);
    }

    public function destroy($id) {

    }
}
