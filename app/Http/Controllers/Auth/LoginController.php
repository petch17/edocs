<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
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
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            // return $request->email;
                return redirect()->route('inbox.index');
        }else{
            // return '1';
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
                Session::flash('status', 'username wrong!');
                return redirect()->route('login');//->with('status', 'Profile updated!');

            }

            $xml_string = $data->AuthenAndGetInfo4Result->any;
            $xml = simplexml_load_string($xml_string);
            $json = json_encode($xml);
            $array = json_decode($json,TRUE);

            return $array;
            // return '1';

            $data = User::select('id', 'email','password')->where('email', $request->email);
            $empcode = $data->count();
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

            $tbintranetusers = new User();
            // return $tbintranetusers;
            $tbintranetusers->EMPCODE = $array['NewDataSet']['LOGIN_EMPLOYEE']['EMPCODE'];
            $tbintranetusers->title = $array['NewDataSet']['LOGIN_EMPLOYEE']['TITLE_TH'];
            $tbintranetusers->fname = $array['NewDataSet']['LOGIN_EMPLOYEE']['FIRST_NAME_TH'];
            $tbintranetusers->lname =  $array['NewDataSet']['LOGIN_EMPLOYEE']['LAST_NAME_TH'];
            $tbintranetusers->EMAILINTRA =  $array['NewDataSet']['LOGIN_EMPLOYEE']['EMAIL'];
            $tbintranetusers->tel =  isset($array['NewDataSet']['LOGIN_EMPLOYEE']['MTEL']) ? $array['NewDataSet']['LOGIN_EMPLOYEE']['MTEL'] : "";
            $tbintranetusers->mtel =  isset($array['NewDataSet']['LOGIN_EMPLOYEE']['MMOBILE']) ? $array['NewDataSet']['LOGIN_EMPLOYEE']['MMOBILE'] : "";

            $tbintranetusers->email =  $array['NewDataSet']['LOGIN_EMPLOYEE']['USER_NAME'];
            $tbintranetusers->password = bcrypt($request->input('password'));
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
