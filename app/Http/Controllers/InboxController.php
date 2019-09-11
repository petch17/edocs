<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Objective;
use App\Edoc;
use File;
use PDF;
// use Imagick;

class InboxController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $edocs = Edoc::with('tbobjective')->where('status', 'เอกสารที่ยังไม่ผ่านการอนุมัติ')->get();
        // $edocs = Edoc::with('tbobjective')->get();
        return view('inbox.index',['edocs' => $edocs]);
    }

    public function create()
    {
        return view('inbox.create');
    }

    public function addcreate()
    {
        $goals = Objective::select('id','name')->get();
        return view('inbox.add',['goals' => $goals]);
    }

    public function addstore(Request $request)
    {

        $edoc = new Edoc;

        if ($request->hasFile('file')){
            // File::delete(base_path().'\\public\\edocfiles\\'.$edoc->file);
            $file = str_random(10).'.'.$request->file('file')->getClientOriginalExtension();
            $real_filename = $request->file('file')->getClientOriginalName();
            $request->file('file')->move('D://'.'nodeapi'.'/'.'uploads'.'/'.'pdffile'.'/', $file);
            // $request->file('file')->move(base_path().'/public/edocfiles/',$file);
            $edoc->file = $file;
            $edoc->real_filename = $real_filename;
        }
        $edoc->topic = $request->topic;
        $edoc->status = 'เอกสารที่ยังไม่ผ่านการอนุมัติ';
        $edoc->save();

        // return $edoc->id;
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
        // $data = Edoc::with('tbobjective')->find($id);
        // $data2 = [  'booknum' => $data->booknum,
        //             'date' => $data->date,
        //             'topic' => $data->topic,
        //             'position' => $data->position,
        //             'name' => $data->tbobjective->name
        //             ];

        // $pdf = PDF::loadView('myPDF', $data2);

        // return $pdf->stream();
    }
    public function marksignature($id){

        $edoc = Edoc::find($id);
        // $data = Edoc::select('signature')->find($id);
        return view('inbox.marksignature',['edoc' => $edoc]);
    }

    public function marksignaturestore(Request $request, $id){

        $edoc = Edoc::find($id);
        $edoc->getx = $request->getx;
        $edoc->gety = $request->gety;
        $edoc->save();

       return redirect()->route('sent.index');
    }

    public function destroy($id) {

        Edoc::destroy($id);
        return back();
    }
}
