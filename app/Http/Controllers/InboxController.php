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
use DateTime;

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
        // ->where( 'document','เอกสารสร้างเอง' )
        ->where('created_by',Auth::user()->id)
        ->orderBy('id' , 'desc')
        ->get();

        return view('inbox.index',['edocs' => $edocs]);
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
        // $edoc3 = Edoc::find($id);
        // return '10';
        $this->validate($request , [
                'topic' => 'required',
                'edoc_type' => 'required',
                'file' => 'required',
                // 'select_manager' => 'required',
            ] ,
            [
                'topic.required'    => 'กรุณากรอกชื่อเรื่อง',
                'edoc_type.required'  => 'กรุณาเลือกประเภทเอกสาร',
                'file.required'  => 'กรุณาอัพโหลดไฟล์',
                // 'select_manager.required'  => 'กรุณาเลือกผู้บริหารก่อน',
            ]
        );

        $edoc = new Edoc;
        $edoc->topic = $request->topic;
        $edoc->edoc_type = $request->edoc_type;
        $edoc->created_by = $request->user_id;
        $edoc->select_manager = $request->select_manager;
        // $edoc->document = 'เอกสารสร้างเอง';
        $edoc->status = 'เอกสารรอดำเนินการ';

        if ($request->hasFile('file')){
            // File::delete(base_path().'\\public\\edocfiles\\'.$edoc->file);
            $file = str_random(10).'.'.$request->file('file')->getClientOriginalExtension(); //random flie name
            $real_filename = $request->file('file')->getClientOriginalName(); //real_filename
            $request->file('file')->move('D://'.'nodeapi'.'/'.'uploads'.'/'.'pdffile'.'/', $file); //ที่เก็บรูปของ serve
            // $request->file('file')->move(base_path().'/public/edocfiles/',$file); //ที่เก็บรูปของ เครื่องตัวเอง
            $edoc->file = $file;
            $edoc->real_filename = $real_filename;
        }


        // return $request;
        $client = new \GuzzleHttp\Client();

        if($request->speed != null ){ //เช็ครับค่า ชั้นความความเร็ว
            // return '2';
                $edoc->speed = $request->speed;
                $edoc->save();

                if($request->secert != null ){ //เช็ครับค่า ชั้นความลับ
                    // return '1';
                    // return $edoc;
                    $edoc->secert = $request->secert;
                    $edoc->save();

                    $pdf_to_img = "http://127.0.0.1:3000/pdftoimage/".$edoc->id;
                    $pdf_to_img2 = $client->get($pdf_to_img);
                    // return $edoc;
                    // return $edoc->id;
                    $pdf_to_img = "http://127.0.0.1:3000/pdftoimage3/".$edoc->id;
                    $pdf_to_img2 = $client->get($pdf_to_img);
                    // return '1222';
                    return redirect()->route('marksignature',['id' => $edoc->id]);
                    }// end เช็ครับค่า ชั้นความลับ
                // return '1.1';
                // return $edoc;
                $pdf_to_img = "http://127.0.0.1:3000/pdftoimage/".$edoc->id;
                $pdf_to_img2 = $client->get($pdf_to_img);
                return redirect()->route('marksignature',['id' => $edoc->id]);
            }
            else{
                // return '2.3';
                // return $request->speed;
                $edoc->speed = $request->speed;
                $edoc->save();
                if($request->secert != null ){ //เช็ครับค่า ชั้นความลับ
                    // return '1...';
                    // return $edoc;
                    $edoc->secert = $request->secert;
                    $edoc->save();

                    $pdf_to_img = "http://127.0.0.1:3000/pdftoimage/".$edoc->id;
                    $pdf_to_img2 = $client->get($pdf_to_img);
                    // return $edoc;
                    // return $edoc->id;
                    $pdf_to_img2 = "http://127.0.0.1:3000/pdftoimage3/".$edoc->id;
                    $pdf_to_img3 = $client->get($pdf_to_img2);
                    // return '1222';
                    return redirect()->route('marksignature',['id' => $edoc->id]);

                } // end เช็ครับค่า ชั้นความลับ
                // return '1';
                // return $edoc;
                $pdf_to_img = "http://127.0.0.1:3000/pdftoimage/".$edoc->id;
                $pdf_to_img2 = $client->get($pdf_to_img);
                return redirect()->route('marksignature',['id' => $edoc->id]);
            }

         // end เช็ครับค่า ชั้นความความเร็ว
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
        // return redirect()->route('marksignature',['id' => $edoc->id]);

    }

    public function show($id)
    {
        // $data = Edoc::find($id);
        // $run = $data->file;
        // // return $run;

        // $pdf = "http://127.0.0.1:3000/pdffile/".$run;

        // // return $pdf;


        // $pdfs = PDF::loadView(  $pdf );

        // return $pdfs->download();
    }

    public function addforward()
    {
        // return '1';
        // $currentday = Carbon::now()->format('Y-m-d H:i');
        $now = new DateTime();
        $currentday = $now->format('Y-m-d H:i');
        //
        $currenttime = date_default_timezone_set('Asia/Bangkok');
        $currenttime = Carbon::now()->format('H:i');
        // $currenttime->addHours();
        //return $currenttime;;
        return view('inbox.addforward',['currentday' => $currentday , 'currenttime' => $currenttime]);
    }

    public function addforwardstore(Request $request )
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
        $edoc2->select_manager = $request->select_manager;
        $edoc2->document = 'เอกสารส่งต่อ';
        $edoc2->status = 'เอกสารรอดำเนินการ';

        if ($request->hasFile('file')){
            // File::delete(base_path().'\\public\\edocfiles\\'.$edoc->file);
            $file = str_random(10).'.'.$request->file('file')->getClientOriginalExtension(); //random flie name
            $real_filename = $request->file('file')->getClientOriginalName(); //real_filename
            $request->file('file')->move('D://'.'nodeapi'.'/'.'uploads'.'/'.'pdffile'.'/', $file); //ที่เก็บรูปของ serve
            // $request->file('file')->move(base_path().'/public/edocfiles/',$file); //ที่เก็บรูปของ เครื่องตัวเอง
            $edoc2->file = $file;
            $edoc2->real_filename = $real_filename;
        }

        // return $edoc2;

        $edoc2->save();

        // return $edoc2->file;

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
        $pdf_to_img = "http://127.0.0.1:3000/pdftoimage/".$edoc2->id; // api แปลง pdf เป็น รูป
        $pdf_to_img2 = $client->get($pdf_to_img);

        $text_to_img = "http://127.0.0.1:3000/senddoc2/".$edoc2->id; // api แปลง text เป็น รูป
        $text_to_img2 = $client->get($text_to_img);

        return redirect()->route('inboxmarkrunnumber',['id' => $edoc2->id]);

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
