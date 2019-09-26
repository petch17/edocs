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

        $edoc_details = DB::table('edocdetails')
        ->join('users', 'edocdetails.created_by', '=', 'users.id')
        ->join('managers', 'edocdetails.sent_manager', '=', 'managers.id')
        ->select('edoc_id','created_by','sent_manager','managers.DEP_ABBR')
        ->where('status','เอกสารที่อนุมัติแล้ว')
        ->where('created_by',Auth::user()->id)
        ->where('sent_manager' , '!=' , Auth::user()->MANAGER_ID)
        ->get();

        return view('receiver.index',['edocs2' => $edocs
                                    , 'edoc_details' => $edoc_details]);
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
