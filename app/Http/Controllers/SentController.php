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
        $sent = DB::table('receivers')
        ->join('rcdetails', 'receivers.id', '=', 'rcdetails.receiver_id')
        ->join('edocs', 'receivers.edoc_id', '=', 'edocs.id')
        ->select('receivers.*','edocs.topic','edocs.file')
        ->where( 'rcdetails.status','เอกสารที่อนุมัติแล้ว' )
        ->where('rcdetails.created_by',Auth::user()->id)
        ->groupBy('rcdetails.created_by' , 'rcdetails.receiver_id')
        ->get();

        $receive_details = DB::table('rcdetails')
        ->join('users', 'rcdetails.created_by', '=', 'users.id')
        ->join('managers', 'rcdetails.select_manager', '=', 'managers.id')
        ->select('receiver_id','created_by','select_manager','managers.DEP_ABBR')
        ->where('status','เอกสารที่อนุมัติแล้ว')
        ->where('created_by',Auth::user()->id)
        ->where('select_manager' , '!=' , Auth::user()->MANAGER_ID)
        ->get();

        return view('sent.index',['sents' => $sent
                                , 'receive_details' => $receive_details]);
    }
}
