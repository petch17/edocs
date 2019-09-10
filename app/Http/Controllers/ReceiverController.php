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

        $client = new \GuzzleHttp\Client();
        $text_to_img = "http://203.113.14.20:3000/senddoc/".$edoc->id;
        $text_to_img2 = $client->get($text_to_img);
        // return $text_to_img;

        return redirect()->route('inbox.index');
    } 
    public function show($id)
    {
        //
    }
}
