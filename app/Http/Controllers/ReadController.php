<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Receiver;
use App\Rcdetail;
use App\Edoc;
use App\Manager;
use App\User;
use Auth;
use DB;

class ReadController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $tbrc = DB::table('edocdetails')
        ->join('edocs', 'edocs.id', '=', 'edocdetails.edoc_id')
        ->join('users', 'edocdetails.sent_manager', '=', 'users.MANAGER_ID')
        ->join('managers', 'users.MANAGER_ID', '=', 'managers.id')
        ->select('edocs.*','edocdetails.created_by','managers.TITLE_TH','managers.FIRST_NAME_TH','managers.LAST_NAME_TH')
        ->where( 'edocdetails.status','เอกสารที่อนุมัติแล้ว' )
        ->where('edocdetails.sent_manager',Auth::user()->MANAGER_ID)
        ->groupBy('edocdetails.sent_manager' , 'edocdetails.edoc_id')
        ->get();

        // return $tbrc;

        return view('read.index',['tbrc' => $tbrc]);
    }

    public function create($id)
    {
        // return $id;
        $employee = User::select( 'id','EMPCODE','TITLE_TH','FIRST_NAME_TH','LAST_NAME_TH')
            ->where('id' ,'!=', Auth::user()->id)
            ->where('MANAGER_ID' , Auth::user()->MANAGER_ID)
            ->get();

        return view('read.create',['employee' => $employee , 'edoc_id' => $id]);
        // return view('receiver.create');
    }

    public function store(Request $request )
    {
        // return $request;
        // $Manager = User::find($request->MAAGER_ID);
        // return  $request;
        // $Manager_DEP = $Manager->DEP_ABBR;

        $receive = new Receiver;
        $receive->date = $request->date;
        $receive->part_num = $request->part_num;
        $receive->edoc_type = $request->edoc_type;
        $receive->pos_abbr = $request->MAAGER_ID;
        $receive->edoc_id = $request->edoc_id;

        // return $receive;
        $receive->save();

        foreach($request->select_emp as $emp_id){

        $rcdetail = new Rcdetail;
        $rcdetail->receiver_id = $receive->id;
        $rcdetail->created_by = $request->user_id;
        $rcdetail->select_emp = $emp_id;

        // return $rcdetail;
        $rcdetail->save();

        }

        //  return $request;
        // $receive = Receiver::with('tbedoc')->find($id);

        // return $receive->edoc_id;

        $client = new \GuzzleHttp\Client();
        $text_to_img = "http://203.113.14.20:3000/senddoc/".$receive->id;
        $text_to_img2 = $client->get($text_to_img);
        // return $text_to_img;

        // return redirect()->route('inbox.index');
        return redirect()->route('readmarkrunnumber',['id' => $receive->id]);
    }

    public function show($id)
    {
        //
    }

    public function markrunnumber($id){
        // return $id;
        // $edoc2 = Edoc::find($id);
        // return '1';
        $receive = Receiver::find($id);
        $edoc2 = Edoc::find($receive->edoc_id);
        return view('read.markrunnumber',['edoc2' => $edoc2 ,'receive' => $receive]);
    }

    public function markrunnumberstore(Request $request, $id){
        // return '1';
        // return $request;
        $receive = Receiver::find($id);
        $receive->getx = $request->getx;
        $receive->gety = $request->gety;
        $receive->save();

        $client = new \GuzzleHttp\Client();
        $text_to_img = "http://127.0.0.1:3000/mergedocsend/".$receive->id;
        $text_to_img2 = $client->get($text_to_img);


        $receive2 = Receiver::find($id);
        $edoc3 = Edoc::find($receive2->edoc_id);
        return view('read.markforward',['edoc3' => $edoc3 ,'receive2' => $receive2]);

    }

    public function markforward($id){
        // return $id;
        // return '1';
        $receive = Receiver::find($id);
        $edoc2 = Edoc::find($receive->edoc_id);
        return view('read.markforward',['edoc2' => $edoc2 ,'receive' => $receive]);
    }

    public function markforwardstore(Request $request, $id){
        // return '1';
        // return $request;
        $receive = Receiver::find($id);
        $receive->getx = $request->getx;
        $receive->gety = $request->gety;
        $receive->save();

        //    return redirect()->route('receiver.marksignature');
        $client = new \GuzzleHttp\Client();
        $text_to_img = "http://127.0.0.1:3000/mergedocsend/".$receive->id;
        $text_to_img2 = $client->get($text_to_img);


        $receive2 = Receiver::find($id);
        $edoc3 = Edoc::find($receive2->edoc_id);
        return view('read.marksignature',['edoc3' => $edoc3 ,'receive2' => $receive2]);

    }

    public function marksignature($id){

        // $data = Edoc::find($id);
        // $data = Edoc::select('signature')->find($id);
        $receive2 = Receiver::find($id);
        $edoc3 = Edoc::find($receive2->edoc_id);
        return view('read.marksignature',['edoc3' => $edoc3 ,'receive2' => $receive2]);
    }

    public function marksignaturestore(Request $request, $id){

        $receive = Receiver::find($id);
        $receive->getx = $request->getx;
        $receive->gety = $request->gety;

        $receive->status = 'ยังไม่ส่ง';

        $receive->save();

       return redirect()->route('read.index');
    }
}
