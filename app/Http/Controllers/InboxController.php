<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Manager;
use App\Edoc;
use File;
use DB;
use PDF;
use Auth;
// use Imagick;

class InboxController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // $edocs = Edoc::where( 'status','เอกสารที่ยังไม่ผ่านการอนุมัติ' )->where('id',Auth::user()->id)->get();
        // return $edocs;

        $edocs = DB::table('edocs')
            // ->join('edocdetails', 'edocs.id', '=', 'edocdetails.edoc_id')
            ->select('edocs.*')
            ->where( 'edocs.status','เอกสารที่ยังไม่ผ่านการอนุมัติ' )
            ->where('edocs.created_by',Auth::user()->id)
            // ->groupBy('edocdetails.created_by' , 'edocdetails.edoc_id')
            ->get();

        return view('inbox.index',['edocs' => $edocs]);

    }

    public function addforward()
    {
        // return '1';
        return view('inbox.addforward');
    }


    public function addforwardstore(Request $request )
    {
        return $request;
        $receive = new Receiver;
        $receive->date = $request->date;
        $receive->part_num = $request->part_num;
        $receive->edoc_type = $request->edoc_type;
        $receive->pos_abbr = $request->MAAGER_ID;
        $receive->edoc_id = $request->edoc_id;

        // return $receive;
        $receive->save();

        foreach($request->select_manager as $mng_id){

        $rcdetail = new Rcdetail;
        $rcdetail->receiver_id = $receive->id;
        $rcdetail->created_by = $request->user_id;
        $rcdetail->select_manager = $mng_id;

        $receive->status = 'เอกสารที่ยังไม่ผ่านการอนุมัติ';

        $rcdetail->save();

        }

        $client = new \GuzzleHttp\Client();
        $text_to_img = "http://203.113.14.20:3000/senddoc/".$receive->id;
        $text_to_img2 = $client->get($text_to_img);

        return redirect()->route('readmarkrunnumber',['id' => $receive->id]);
    }

    public function addcreate()
    {
        // เรียน
        // if(Auth::user()->MANAGER_ID == null){
        //     $manager2 = Manager::select( 'id','EMPCODE','TITLE_TH','FIRST_NAME_TH','LAST_NAME_TH')->get();
        //     // return '1';
        // }else{
        //     $manager2 = Manager::select( 'id','EMPCODE','TITLE_TH','FIRST_NAME_TH','LAST_NAME_TH')
        //     ->where('id' ,'!=', Auth::user()->MANAGER_ID)->get();
        //     // return '2';
        // }
        // return view('inbox.add',['manager2' => $manager2]);
        return view('inbox.add');

    }

    public function addstore(Request $request)
    {
        $edoc = new Edoc;
        $edoc->topic = $request->topic;
        $edoc->edoc_type = $request->edoc_type;
        $edoc->created_by = $request->user_id;
        $edoc->select_manager = $request->select_manager;
        $edoc->retirement = $request->retirement;
        $edoc->status = 'เอกสารที่ยังไม่ผ่านการอนุมัติ';

        if ($request->hasFile('file')){
            // File::delete(base_path().'\\public\\edocfiles\\'.$edoc->file);
            $file = str_random(10).'.'.$request->file('file')->getClientOriginalExtension(); //random flie name
            $real_filename = $request->file('file')->getClientOriginalName(); //real_filename
            $request->file('file')->move('D://'.'nodeapi'.'/'.'uploads'.'/'.'pdffile'.'/', $file); //ที่เก็บรูปของ serve
            // $request->file('file')->move(base_path().'/public/edocfiles/',$file); //ที่เก็บรูปของ เครื่องตัวเอง
            $edoc->file = $file;
            $edoc->real_filename = $real_filename;
        }
        $edoc->save();

        // ลูบวนเก็บค่าตาราง edoc_detail
        // foreach($request->sent_manager as $manager_id){
        // $edocdetail = new Edocdetail;
        // $edocdetail->edoc_id = $edoc->id;
        // $edocdetail->created_by = $request->user_id;
        // $edocdetail->sent_manager = $manager_id;
        // $edocdetail->status = 'เอกสารที่ยังไม่ผ่านการอนุมัติ';
        // $edocdetail->save();
        // }

        // return $edoc->id;
        // ส่วนการสร้างรูป (ฝั่งแอป)
        $client = new \GuzzleHttp\Client();
        $pdf_to_img = "http://203.113.14.20:3000/pdftoimage/".$edoc->id;
        $pdf_to_img2 = $client->get($pdf_to_img);
        // return $pdf_to_img;
        return redirect()->route('marksignature',['id' => $edoc->id]);

        // return redirect()->route('inbox.index');
    }

    public function show($id)
    {
        // $data = Edoc::find($id);

        // $pdf = "http://203.113.14.20:3000/pdffile/". $data->id;

        // // return $pdf;

        // $pdfs = PDF::loadView( 'myPDF' , $pdf );

        // return $pdfs->download();
    }
    public function markrunnumber($id){
        // return $id;
        $edoc = Edoc::find($id);
        // return '1';
        return view('read.markrunnumber',['edoc' => $edoc]);
    }

    public function markrunnumberstore(Request $request, $id){
        // return '1';
        // return $request;
        $receive = Edoc::find($id);
        $receive->getx = $request->getx;
        $receive->gety = $request->gety;
        $receive->save();

        $client = new \GuzzleHttp\Client();
        $text_to_img = "http://127.0.0.1:3000/mergedocsend/".$receive->id;
        $text_to_img2 = $client->get($text_to_img);


        $edoc = Edoc::find($id);
        return view('read.markforward',['edoc' => $edoc]);

    }

    public function markforward($id){
        // return $id;
        // return '1';
        $edoc2 = Edoc::find($id);
        return view('read.markforward',['edoc2' => $edoc2 ]);
    }

    public function markforwardstore(Request $request, $id){
        // return '1';
        // return $request;
        $receive = Edoc::find($id);
        $receive->getx = $request->getx;
        $receive->gety = $request->gety;
        $receive->save();

        //    return redirect()->route('receiver.marksignature');
        $client = new \GuzzleHttp\Client();
        $text_to_img = "http://127.0.0.1:3000/mergedocsend/".$receive->id;
        $text_to_img2 = $client->get($text_to_img);


        $edoc2 = Receiver::find($id);
        return view('read.marksignature',['edoc2' => $edoc2]);

    }

    public function marksignature($id){
        $edoc3 = Edoc::find($id);
        return view('read.marksignature',['edoc3' => $edoc3 ]);
    }

    public function marksignaturestore(Request $request, $id){

        $edoc3 = Edoc::find($id);
        $edoc3->getx = $request->getx;
        $edoc3->gety = $request->gety;
        $edoc3->save();

       return redirect()->route('inbox.index');
    }

    public function destroy($id) {

        // Edoc::destroy($id);
        // return back();
       $result = Edoc::find($id)->delete();

       File::delete(base_path().'http://203.113.14.20:3000/pdffile/'.$result->file);
       $result->delete();

        if($result){
            return response()->json(['success' => '1']);
        }else{
            return response()->json(['success' => '0']);
        }
        return back();

    }

}
