<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class ApproveController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // return '3';
       $approve = DB::table('edocs')
       ->select('edocs.*')
       ->where( 'status','เอกสารที่อนุมัติแล้ว' )
       ->where('created_by',Auth::user()->id)
       ->orderBy('id' , 'desc')
       ->get();

       return view('approve.index',['approves' => $approve]);
    }
}
