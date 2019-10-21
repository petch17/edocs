<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class NotallowedController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // return '3';
       $notallowed = DB::table('edocs')
       ->select('edocs.*')
       ->where( 'status','เอกสารที่ไม่ผ่านการอนุมัติ' )
       ->where('created_by',Auth::user()->id)
       ->orderBy('id' , 'desc')
       ->get();

       return view('notallowed.index',['notalloweds' => $notallowed]);
    }
}
