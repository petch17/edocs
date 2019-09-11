<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Receiver;
use App\Edoc;

class ReceiverController extends Controller
{
    public function index()
    {
        // $receive = Receiver::with('tbedoc')->get();
        // return view('receiver.index',['receive' => $receive]);
    }

    public function create($id)
    {
        // return $id;
        return view('receiver.create',['edoc_id' => $id]);
    }

    public function store(Request $request)
    {
        // return $request;
        // $receive = Receiver::with('tbedoc')->find($id);
        $receive = new Receiver;
        $receive->date = $request->date;
        $receive->part_id = $request->part_id;
        $receive->edoc_type = $request->edoc_type;
        $receive->retirement = $request->retirement;
        $receive->edoc_id = $request->edoc_id;

        $receive->save();
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
        // $data2 = Edoc::find($id);
        // return '1';
        $receive = Receiver::find($id);
        $data2 = Edoc::find($receive->edoc_id);
        return view('receiver.markforward',['data2' => $data2
                                            ,'receive' => $receive]);
    }

    public function markforwardstore(Request $request, $id){
        // return '1';
        // return $request;
        $receive = Receiver::find($id);
        $receive;
        $receive->getx = $request->getx;
        $receive->gety = $request->gety;
        $receive->save();

    //    return redirect()->route('sent.index');

        $receive = Receiver::find($id);
        $data2 = Edoc::find($receive->edoc_id);
        return view('receiver.marksignature',['data2' => $data2
                                            ,'receive' => $receive]);

    }

    public function marksignature($id){

        $data = Edoc::find($id);
        // $data = Edoc::select('signature')->find($id);
        return view('inbox.marksignature',['data' => $data]);
    }

    public function marksignaturestore(Request $request, $id){
       
        $edoc = Edoc::find($id);
        $edoc->getx = $request->getx;
        $edoc->gety = $request->gety;
        $edoc->save();

       return redirect()->route('sent.index');
    }
}
