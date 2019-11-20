<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

class TrashController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
       // return '3';
       $trash = DB::table('edocs')
       ->select('edocs.*')
       ->where( 'trash','ลบทิ้ง' )
       ->where('created_by',Auth::user()->id)
       ->orderBy('id' , 'desc')
       ->get();

       return view('trash.index',['trashs' => $trash]);
    }

    public function restoretrash( $id )
    {
        // return $request;
        DB::table('edocs')
            ->where('id', $id)
            ->update(['trash' => 'ใช้งาน']);

        return redirect()->route('trash.index');
    }

    public function destroy($id) {


        // return '1';
        $result = Edoc::find($id);

        File::delete(base_path().'http://127.0.0.1:3000/pdffile/'.$result->file);
        $result->delete();

        if($result){
            return response()->json(['success' => '1']);
        }else{
            return response()->json(['success' => '0']);
        }

    }
}
