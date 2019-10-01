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

class InboxController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // return '1';
        // $edocs = Edoc::where('created_by',Auth::user()->id)->get();
        $edocs = DB::table('edocs')
        ->select('edocs.*')
        // ->where( 'status','เอกสารที่ยังไม่ผ่านการอนุมัติ' )
        ->where( 'document','เอกสารสร้างเอง' )
        ->where('created_by',Auth::user()->id)
        ->get();

        return view('inbox.index',['edocs' => $edocs]);
    }

    public function indexforward()
    {
        // return '3';
        $edocs = DB::table('edocs')
        ->select('edocs.*')
        // ->where( 'status','เอกสารที่ยังไม่ผ่านการอนุมัติ' )
        ->where( 'document','เอกสารส่งต่อ' )
        ->where('created_by',Auth::user()->id)
        ->get();

        return view('inbox.indexforward',['edocs' => $edocs]);
    }

    public function addforward()
    {
        // return '1';
        $currentday = Carbon::now()->format('Y-m-d');
        //
        $currenttime = date_default_timezone_set('Asia/Bangkok');
        $currenttime = Carbon::now()->format('H:i');
        // $currenttime->addHours();
        //return $currenttime;;
        return view('inbox.addforward',['currentday' => $currentday , 'currenttime' => $currenttime]);
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
        $edoc->document = 'เอกสารสร้างเอง';
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
        // $edoc->save();

        if($request->speed == null ){
            // return '1';
            $client = new \GuzzleHttp\Client();
            // return '1';
            $pdf_to_img = "http://203.113.14.20:3000/pdftoimage/".$edoc->id;
            $pdf_to_img2 = $client->get($pdf_to_img);
        }
        else{
            // return '2';
            if($request->speed == 'ด่วน'){
                // return '2.1';
                // return $request->speed;
                $edoc->speed = $request->speed;
                $client = new \GuzzleHttp\Client();
                // return '1';
                $pdf_to_img = "http://203.113.14.20:3000/pdftoimage/".$edoc->id;
                $pdf_to_img2 = $client->get($pdf_to_img);
            }
            elseif($request->speed == 'ด่วนมาก'){
                // return '2.2';
                // return $request->speed;
                $edoc->speed = $request->speed;
                $client = new \GuzzleHttp\Client();
                // return '1';
                $pdf_to_img = "http://203.113.14.20:3000/pdftoimage/".$edoc->id;
                $pdf_to_img2 = $client->get($pdf_to_img);
            }
            else{
                // return '2.3';
                // return $request->speed;
                $edoc->speed = $request->speed;
                $client = new \GuzzleHttp\Client();
                // return '1';
                $pdf_to_img = "http://203.113.14.20:3000/pdftoimage/".$edoc->id;
                $pdf_to_img2 = $client->get($pdf_to_img);
            }
        }

        if($request->secert == null ){
            // return '1';
            $client = new \GuzzleHttp\Client();
            // return '1';
            $pdf_to_img = "http://203.113.14.20:3000/pdftoimage/".$edoc->id;
            $pdf_to_img2 = $client->get($pdf_to_img);
        }
        else{
            // return '2';
            if($request->secert == 'ลับ'){
                // return $request->secert;
                $edoc->secert = $request->secert;
                $client = new \GuzzleHttp\Client();
                // return '1';
                $pdf_to_img = "http://203.113.14.20:3000/pdftoimage3/".$edoc->id;
                $pdf_to_img2 = $client->get($pdf_to_img);
            }
            else{
                // return '1.1';
                // return $request->secert;
                $secert2 = $request->secert = null ;
                $edoc->secert = $secert2; $client = new \GuzzleHttp\Client();
                // return '1';
                $pdf_to_img = "http://203.113.14.20:3000/pdftoimage3/".$edoc->id;
                $pdf_to_img2 = $client->get($pdf_to_img);
            }
        }
        // return $edoc ;
        // $client = new \GuzzleHttp\Client();
        // // return '1';
        // $pdf_to_img = "http://203.113.14.20:3000/pdftoimage/".$edoc->id;
        // $pdf_to_img2 = $client->get($pdf_to_img);

        $edoc->save();

        // return $edoc ;

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
        // $client = new \GuzzleHttp\Client();
        // // return '1';
        // $pdf_to_img = "http://127.0.0.1:3000/pdftoimage/".$edoc->id;
        // $pdf_to_img2 = $client->get($pdf_to_img);
        // return $pdf_to_img;
        return redirect()->route('marksignature',['id' => $edoc->id]);

    }

    public function addforwardstore(Request $request )
    {
        // return $request;
        $edoc2 = new Edoc;
        // $edoc2->topic = $request->topic;
        $edoc2->part_num = $request->part_num;
        $edoc2->pos_abbr = $request->pos_abbr;
        $edoc2->edoc_type = $request->edoc_type;
        $edoc2->date = $request->date;
        $edoc2->time = $request->times;
        $edoc2->edoc_type = $request->edoc_type;
        $edoc2->objective = $request->objective;
        $edoc2->created_by = $request->user_id;
        $edoc2->retirement = $request->retirement;
        $edoc2->document = 'เอกสารส่งต่อ';
        $edoc2->status = 'เอกสารที่ยังไม่ผ่านการอนุมัติ';

        // return $edoc2;

        $edoc2->save();

        // return $edoc2;

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
        $text_to_img = "http://203.113.14.20:3000/mergedocsend/".$edoc2->id;
        $text_to_img2 = $client->get($text_to_img);

        return redirect()->route('readmarkrunnumber',['id' => $edoc2->id]);
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
        return view('inbox.marksignature',['edoc3' => $edoc3 ]);
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
       $result = Edoc::find($id);

       File::delete(base_path().'http://203.113.14.20:3000/pdffile/'.$result->file);
       $result->delete();

        if($result){
            return response()->json(['success' => '1']);
        }else{
            return response()->json(['success' => '0']);
        }
        // return back();

    }

}
