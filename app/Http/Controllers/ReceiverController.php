<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Manager;
use App\Edoc;
use App\Receiver;
use File;
use DB;
use PDF;
use Auth;
use Carbon\Carbon;

class ReceiverController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // return '3';
        $receivers = DB::table('receivers')
        ->select('receivers.*')
        // ->where( 'status','เอกสารที่ยังไม่ผ่านการอนุมัติ' )
        // ->where( 'document','เอกสารส่งต่อ' )
        ->where('created_by',Auth::user()->id)
        ->orderBy('id' , 'desc')
        ->get();

        return view('receiver.index',['receivers' => $receivers]);
    }

    public function create()
    {
        // return '1';
        $currentday = Carbon::now()->format('Y-m-d');
        //
        $currenttime = date_default_timezone_set('Asia/Bangkok');
        $currenttime = Carbon::now()->format('H:i');
        //return $currenttime;;
        return view('receiver.create',['currentday' => $currentday , 'currenttime' => $currenttime]);
    }

    public function receiverstore(Request $request)
    {
        $this->validate($request , [
            'part_num' => 'required',
            'pos_abbr' => 'required',
            'retirement' => 'required',
            'file' => 'required',
        ] ,
        [
            'part_num.required'    => 'กรุณากรอกเลขที่รับส่วนงาน',
            'pos_abbr.required'  => 'กรุณากรอกตัวย่อหน่วยงานของผู้รับ',
            'retirement.required'  => 'กรุณาเรียน',
            'file.required'  => 'กรุณาเลือกไฟล์',
        ]
        );
        // return $request;
        $receiver = new Receiver;
        // $receiver->topic = $request->topic;
        $receiver->part_num = $request->part_num;
        $receiver->pos_abbr = $request->pos_abbr;
        $receiver->edoc_type = $request->edoc_type;
        $receiver->date = $request->date;
        $receiver->times = $request->times;
        $receiver->edoc_type = $request->edoc_type;
        $receiver->objective = $request->objective;
        $receiver->created_by = $request->user_id;
        $receiver->retirement = $request->retirement;
        $receiver->select_manager = $request->MANAGER_ID;
        // $receiver->document = 'เอกสารส่งต่อ';
        $receiver->status = 'เอกสารรอดำเนินการ';

        if ($request->hasFile('file')){
            // File::delete(base_path().'\\public\\edocfiles\\'.$edoc->file);
            $file = str_random(10).'.'.$request->file('file')->getClientOriginalExtension(); //random flie name
            $real_filename = $request->file('file')->getClientOriginalName(); //real_filename
            $request->file('file')->move('D://'.'nodeapi'.'/'.'uploads'.'/'.'pdfsendfile'.'/', $file); //ที่เก็บรูปของ serve
            // $request->file('file')->move(base_path().'/public/edocfiles/',$file); //ที่เก็บรูปของ เครื่องตัวเอง
            $receiver->file = $file;
            $receiver->real_filename = $real_filename;
        }

        // return $receiver;

        $receiver->save();

        // return redirect()->route('receiver.index');

        // return $request;

        // วนเก็บค่า
        // foreach($request->select_manager as $mng_id){
        // $rcdetail = new Rcdetail;
        // $rcdetail->receiver_id = $receive->id;
        // $rcdetail->created_by = $request->user_id;
        // $rcdetail->select_manager = $mng_id;
        // $receive->status = 'เอกสารที่ยังไม่ผ่านการอนุมัติ';
        // $rcdetail->save();
        // }
        // end วนเก็บค่า

        $client = new \GuzzleHttp\Client();
        $pdf_to_img = "http://127.0.0.1:3000/senddoc/".$receiver->id; // api แปลง pdf เป็น รูป
        $pdf_to_img2 = $client->get($pdf_to_img);


        // $text_to_img = "http://127.0.0.1:3000/mergedocsend3/".$receiver->id; // api รวมรูป 2 รูปเป็นรูปเดียว
        // $text_to_img2 = $client->get($text_to_img);

        $pdf_to_img = "http://127.0.0.1:3000/senddoc3/".$receiver->id; // api แปลง pdf เป็น รูป
        $pdf_to_img2 = $client->get($pdf_to_img);

        // $text_to_img = "http://127.0.0.1:3000/senddoc2/".$receiver->id; // api แปลง text เป็น รูป
        // $text_to_img2 = $client->get($text_to_img);

        return redirect()->route('runnumber',['id' => $receiver->id ]);

    }

    public function show($id)
    {
        //
    }

    public function runnumber($id){
        // return $id;
        $receiver = Receiver::find($id);
        // return '1';
        return view('receiver.runnumber',['receiver' => $receiver]);
    }

    public function runnumberstore(Request $request, $id){
        // return '1';
        // return $request;
        $receiver = Receiver::find($id);
        // $receiver->signature = $receiver->id.'/merge.png';
        $receiver->getx = $request->getx;
        $receiver->gety = $request->gety;
        $receiver->save();

        $client = new \GuzzleHttp\Client();
        // $text_to_img = "http://127.0.0.1:3000/mergedocsend2/".$receiver->id; // api รวมรูป 2 รูปเป็นรูปเดียว
        // $text_to_img2 = $client->get($text_to_img);

        // $pdf_to_img = "http://127.0.0.1:3000/pdftoimage/".$receiver->id; // api แปลง pdf เป็น รูป (เรียกรูป ที่แปลงแล้วและรวมรูปทั้ง 2 รูปแล้ว มาโชว์)
        // $pdf_to_img2 = $client->get($pdf_to_img);

        $text_to_img = "http://127.0.0.1:3000/mergedocsend3/".$receiver->id; // api แปลง text เป็น รูป
        $text_to_img2 = $client->get($text_to_img);




        // $edoc = Receiver::find($id);
        $receiver->signature = $receiver->id.'/merge.png';
        $receiver->save();

        return view('receiver.marksignature',['receiver3' => $receiver]);

    }

    public function forward($id){
        // return $id;
        // return '1';
        $receiver2 = Receiver::find($id);
        return view('receiver.forward',['receiver2' => $receiver2 ]);
    }

    public function forwardstore(Request $request, $id){
        // return '1';
        // return $request;
        $receiver2 = Receiver::find($id);
        $receiver2->signature = $receiver2->id.'/merge.png';
        $receiver2->getx = $request->getx;
        $receiver2->gety = $request->gety;
        $receiver2->save();
        // return $receiver2->signature ;

        $client = new \GuzzleHttp\Client();
        $text_to_img = "http://127.0.0.1:3000/mergedocsend/".$receiver2->id; // api รวมรูป 2 รูปเป็นรูปเดียว
        $text_to_img2 = $client->get($text_to_img);

        // $pdf_to_img = "http://127.0.0.1:3000/pdftoimage/".$receiver2->id; // api แปลง pdf เป็น รูป (เรียกรูป ที่แปลงแล้วและรวมรูปทั้ง 2 รูปแล้ว มาโชว์)
        // $pdf_to_img2 = $client->get($pdf_to_img);


        // $receiver2 = Receiver::find($id);
        return view('receiver.marksignature',['receiver3' => $receiver2]);

    }

    public function receivermarksignature($id){
        $receiver3 = Receiver::find($id);
        return view('receiver.marksignature',['receiver3' => $receiver3 ]);
    }

    public function receivermarksignaturestore(Request $request, $id){

        $receiver3 = Receiver::find($id);
        $receiver3->signature = $receiver3->id.'/merge2.png';
        $receiver3->getx = $request->getx;
        $receiver3->gety = $request->gety;
        $receiver3->save();

        return redirect()->route('receiver.index');
    }

    public function destroy($id) {

        // Edoc::destroy($id);
        // return back();
       $result = Receiver::find($id);

       File::delete(base_path().'http://127.0.0.1:3000/pdffile/'.$result->file);
       $result->delete();

        if($result){
            return response()->json(['success' => '1']);
        }else{
            return response()->json(['success' => '0']);
        }
        // return back();

    }

}
