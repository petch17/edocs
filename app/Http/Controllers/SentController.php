<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class SentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // $edocs = Edoc::where( 'status','เอกสารที่อนุมัติแล้ว' )->where('id',Auth::user()->id)->get();
        $edocs = DB::table('receivers')
        ->join('rcdetails', 'receivers.id', '=', 'rcdetails.receiver_id')
        ->select('receivers.*')
        ->where( 'receivers.status','ส่งแล้ว' )
        ->where('rcdetails.created_by',Auth::user()->id)
        ->groupBy('rcdetails.created_by' , 'rcdetails.receiver_id')
        ->get();

        return view('sent.index',['edocs2' => $edocs]);
    }
}
