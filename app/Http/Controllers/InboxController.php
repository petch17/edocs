<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Manager;
use App\Edoc;
use App\Edocdetail;
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

            // return $edocs;

        return view('inbox.index',['edocs' => $edocs]);

    }

    public function create()
    {
        return view('inbox.create');
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

        // // return $manager2;

        // return view('inbox.add',['manager2' => $manager2]);
        // return view('inbox.add',compact('manager'));
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

    public function marksignature($id){

        $edoc = Edoc::find($id);
        return view('inbox.marksignature',['edoc' => $edoc]);
    }

    public function marksignaturestore(Request $request, $id){

        $edoc = Edoc::find($id);
        $edoc->getx = $request->getx;
        $edoc->gety = $request->gety;
        $edoc->save();

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
