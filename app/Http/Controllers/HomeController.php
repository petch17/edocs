<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Manager;
use Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return redirect()->route('inbox.index');
        // return view('home');
    }

    public function SCMNG()
    {
        // return '1';
        if(Auth::user()->MANAGER_ID == null){
        $manager = Manager::select( 'id','EMPCODE','TITLE_TH','FIRST_NAME_TH','LAST_NAME_TH')->get();
        }
        else{
            $manager = Manager::select( 'id','EMPCODE','TITLE_TH','FIRST_NAME_TH','LAST_NAME_TH')->get();
            // return $manager;
            // return '2';
        }
        return view('selectMNG',['manager' => $manager]);

    }

    public function SCMNGstore(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $user->MANAGER_ID =  $request->MANAGER_ID;
        // return $user;
        $user->save();

        return redirect()->route('inbox.index');
        // return view('home');
    }
}
