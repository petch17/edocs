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

        
        // $image = $request->image;
        // $data2 = str_replace('data:image/png;base64,', '',$image);
        // $data2 = str_replace(' ', '+', $data2);
        // $data2 = base64_decode($data2);
        // $filename3 =  uniqid().'.png';

        // file_put_contents('X://'.'/upload'.'/'.'imageverify'.'/'.$filename3, $data2);
        // file_put_contents('Y://'.'/upload'.'/'.'imageverify'.'/'.$filename3, $data2);

        $receive->save();

        return redirect()->route('inbox.index');
    } 
    public function show($id)
    {
        //
    }
}
