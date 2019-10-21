<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

class TrashController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
       // return '3';
       $trash = DB::table('edocs')
       ->select('edocs.*')
       ->where( 'trash','ลบทิ้ง' )
       ->where('created_by',Auth::user()->id)
       ->orderBy('id' , 'desc')
       ->get();

       return view('trash.index',['trashs' => $trash]);
    }

    public function update(Request $request,$id)
    {
        // return $request;
        DB::table('edocs')
            ->where('id', $id)
            ->update(['trash' => 'ใช้งาน']);

        return redirect()->route('trash.index');
    }
}
