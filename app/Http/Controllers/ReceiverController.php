<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Receiver;
use App\Edoc;

class ReceiverController extends Controller
{
    public function index()
    {
        $receive = Receiver::with('tbedoc')->get();
        return view('receiver.index',['receive' => $receive]);
    }

    public function create()
    {
        return view('receiver.create');
    }

    public function receivestore(Request $request)
    {
        $receive = Receiver::with('tbedoc')->find($id);
        $receive->date = $request->date;
        $receive->edoc_type = $request->edoc_type;
        $receive->retirement = $request->retirement;
        $receive->edoc_id = $request->edoc_id;

        $receive->save();

        return redirect()->route('inbox.index');
    } 
    public function show($id)
    {
        //
    }
}
