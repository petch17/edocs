<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\User;
use App\Empcode;
use Illuminate\Support\Facades\Auth;
use Session;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function webLoginPost(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        // return $credentials;

            //Soap
            $client = new \SoapClient("http://10.3.12.26/WebServices/TOTAuthentication.asmx?WSDL",[
                "trace" => 1,
                "exceptions" =>1,
                "cache_wsdl" =>0
            ]);

            $params = [
                'username' => $request->input('email'),
                'password'   => $request->input('password'),
                'authenType' => 'INTRANET',
            ];

            $data = $client->AuthenAndGetInfo4($params);
            $data_ = json_decode(json_encode($data),TRUE);


            if(!isset($data->AuthenAndGetInfo4Result->any)){
                // return '1';
                // Session::flash('status', 'username wrong!');
                // retx`urn redirect()->route('login');//->with('status', 'Profile updated!');
            return Redirect::back()->with('artlogin','User name หรือ Password ไม่ถูกต้อง')->withInput(Input::all());

            }
            $xml_string = $data->AuthenAndGetInfo4Result->any;
            $xml = simplexml_load_string($xml_string);
            $json = json_encode($xml);
            $array = json_decode($json,TRUE);

            // return $array;

            $empcode = Empcode::select('empcode')->where('EMPCODE', $array['NewDataSet']['LOGIN_EMPLOYEE']['EMPCODE'])->count();
            // return $empcode;
            if($empcode > 0){
                // return '5';
                return Redirect::back()->with('formanager','กรุณา login ผ่านโทรศัพท์')->withInput(Input::all());
            }

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            // return $request->password;
            // return '6';
            return redirect()->route('inbox.index');


        }else{
            // return $array;
            // return '1';

            $data = User::select('id', 'email','password')->where('email', $request->email);
            $empcode = $data->count();
            // $array['NewDataSet']['LOGIN_EMPLOYEE']['EMPCODE'];
            // $edocs = User::where('EMPCODE', $array['NewDataSet']['LOGIN_EMPLOYEE']['EMPCODE'])->count();
            // $tbintranetusers->type = 'manager';
            if($empcode > 0){
                //have idcard
                // if($array['NewDataSet']['LOGIN_EMPLOYEE']['CURR_DEP_ABBR'] != $data->first()->CURR_DEP_ABBR){
                //     $IntranetUsersTB = User::findOrFail($data->first()->id);
                //     $IntranetUsersTB->CURR_DEP_ABBR = $array['NewDataSet']['LOGIN_EMPLOYEE']['CURR_DEP_ABBR'];
                //     $IntranetUsersTB->save();
                // }
                if(bcrypt($request->input('password')) != $data->first()->password){
                    $IntranetUsersTB = User::findOrFail($data->first()->id);
                    $IntranetUsersTB->password = bcrypt($request->input('password'));
                    $IntranetUsersTB->save();
                }
            }
            else{
                // return "1";
                $tbintranetusers = new User();
                // return $tbintranetusers;

                if( $empcode == 0 ){
                    // return "1";
                    // $tb = new User();

                    $tbintranetusers->EMPCODE = $array['NewDataSet']['LOGIN_EMPLOYEE']['EMPCODE'];
                    $tbintranetusers->TITLE_TH = $array['NewDataSet']['LOGIN_EMPLOYEE']['TITLE_TH'];
                    $tbintranetusers->FIRST_NAME_TH = $array['NewDataSet']['LOGIN_EMPLOYEE']['FIRST_NAME_TH'];
                    $tbintranetusers->LAST_NAME_TH =  $array['NewDataSet']['LOGIN_EMPLOYEE']['LAST_NAME_TH'];
                    $tbintranetusers->TITLE_EN = $array['NewDataSet']['LOGIN_EMPLOYEE']['TITLE_EN'];
                    $tbintranetusers->FIRST_NAME_EN = $array['NewDataSet']['LOGIN_EMPLOYEE']['FIRST_NAME_EN'];
                    $tbintranetusers->LAST_NAME_EN =  $array['NewDataSet']['LOGIN_EMPLOYEE']['LAST_NAME_EN'];
                    $tbintranetusers->EMAILINTRA =  $array['NewDataSet']['LOGIN_EMPLOYEE']['EMAIL'];
                    $tbintranetusers->POS_ABBR =  $array['NewDataSet']['LOGIN_EMPLOYEE']['POS_ABBR'];
                    $tbintranetusers->POS_FULL =  $array['NewDataSet']['LOGIN_EMPLOYEE']['POS_FULL'];
                    $tbintranetusers->DEP_ABBR =  $array['NewDataSet']['LOGIN_EMPLOYEE']['DEP_ABBR'];
                    $tbintranetusers->DEP_FULL =  $array['NewDataSet']['LOGIN_EMPLOYEE']['DEP_FULL'];
                    $tbintranetusers->HIERACHY_CODE =  $array['NewDataSet']['LOGIN_EMPLOYEE']['HIERACHY_CODE'];
                    $tbintranetusers->ID4DIGIT =  $array['NewDataSet']['LOGIN_EMPLOYEE']['ID4DIGIT'];
                    // $tbintranetusers->USER_NAME =  $array['NewDataSet']['LOGIN_EMPLOYEE']['USER_NAME'];

                    // return $tbemployee;
                    $tbintranetusers->save();

                }
                else{
                   // return "2";
                    return Redirect::back()->with('formanager','กรุณา login ผ่านโทรศัพท์')->withInput(Input::all());
                }

                // $tbintranetusers->tel =  isset($array['NewDataSet']['LOGIN_EMPLOYEE']['MTEL']) ? $array['NewDataSet']['LOGIN_EMPLOYEE']['MTEL'] : "";
                // $tbintranetusers->mtel =  isset($array['NewDataSet']['LOGIN_EMPLOYEE']['MMOBILE']) ? $array['NewDataSet']['LOGIN_EMPLOYEE']['MMOBILE'] : "";

                $tbintranetusers->email =  $array['NewDataSet']['LOGIN_EMPLOYEE']['USER_NAME'];
                $tbintranetusers->password = bcrypt($request->input('password'));
                $tbintranetusers->remember_token = str_random(10);
                // $tbintranetusers->role_id = 30;
                $tbintranetusers->save();
            }
        }

        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])){
            $user = Auth::user();
        }

        // return redirect()->route('problemchangelocate');
        return redirect()->route('inbox.index');
    }
}
