<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Edoc;
use DB;
use Auth;

class ReceiverController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // $edocs = Edoc::where( 'status','เอกสารที่อนุมัติแล้ว' )->where('id',Auth::user()->id)->get();
        $edocs = DB::table('edocs')
        ->join('edocdetails', 'edocs.id', '=', 'edocdetails.edoc_id')
        ->select('edocs.*')
        ->where( 'edocs.status','เอกสารที่อนุมัติแล้ว' )
        ->where('edocdetails.created_by',Auth::user()->id)
        ->groupBy('edocdetails.created_by' , 'edocdetails.edoc_id')
        ->get();


        return view('receiver.index',['edocs2' => $edocs]);
    }

    public function create($id)
    {

    }

    public function store(Request $request )
    {

    }

    public function show($id)
    {
        //
    }

}
