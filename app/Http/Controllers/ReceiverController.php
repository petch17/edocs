<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Receiver;

class ReceiverController extends Controller
{
    public function index()
    {
        return view('receiver.index');
    }

    public function create()
    {
        return view('receiver.create');
    }

    public function addcreate()
    {
        //
    }

    public function addstore(Request $request)
    {
        //
    } 
    public function show($id)
    {
        //
    }
}
