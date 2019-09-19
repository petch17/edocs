<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Receiver;
use App\Rcdetail;
use App\Edoc;
use App\User;
use Auth;

class ReceiverController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $edocs = Edoc::with('tbobjective')->where('status' , 'เอกสารที่อนุมัติแล้ว')->where('created_by',Auth::user()->id)->get();
        // $edocs = Edoc::with('tbobjective')->get();
        return view('receiver.index',['edocs2' => $edocs]);
    }

    public function create($id)
    {
        // return $id;
        $employee = User::select( 'id','EMPCODE','TITLE_TH','FIRST_NAME_TH','LAST_NAME_TH')->get();
        return view('receiver.create',['employee' => $employee],['edoc_id' => $id]);
        // return view('receiver.create');
    }

    public function store(Request $request )
    {
        // return $request;

        $receive = new Receiver;
        $receive->date = $request->date;
        $receive->part_id = $request->part_id;
        $receive->edoc_type = $request->edoc_type;
        // $receive->retirement = $request->retirement;
        $receive->edoc_id = $request->edoc_id;

        // return $receive;
        $receive->save();

        foreach($request->select_emp as $emp_id){

        $rcdetail = new Rcdetail;
        $rcdetail->reciver_id = $receive->id;
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
        return redirect()->route('markforward',['id' => $receive->id]);
    }

    public function show($id)
    {
        //
    }

    public function markforward($id){
        // return $id;
        // $edoc2 = Edoc::find($id);
        // return '1';
        $receive = Receiver::find($id);
        $edoc2 = Edoc::find($receive->edoc_id);
        return view('receiver.markforward',['edoc2' => $edoc2
                                            ,'receive' => $receive]);
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
        return view('receiver.marksignature',['edoc3' => $edoc3
        ,'receive2' => $receive2]);

    }

    public function marksignature($id){

        // $data = Edoc::find($id);
        // $data = Edoc::select('signature')->find($id);
        $receive2 = Receiver::find($id);
        $edoc3 = Edoc::find($receive2->edoc_id);
        return view('receiver.marksignature',['edoc3' => $edoc3
                                              ,'receive2' => $receive2]);
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
