<?php

namespace App\Http\Controllers\Auth;

use GoozleHttp\Client;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


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
    protected $redirectTo = RouteServiceProvider::HOME;

    protected function redirectTo(){
      if(auth()->user()->role == 1){
          return redirect()->route('admin.dasboard');
      }
      elseif(auth()->user()->role == 2){
        return redirect()->route('editor.dasboard');
      }
      elseif(auth()->user()->role == 3){
        return redirect()->route('home');
      }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request){
        $input = $request->all();
       $this->validate($request,[
           'email'=>'required|email',
           'password'=>'required',
       ]);


       if(auth()->attempt(array('email'=>$input['email'],'password'=>$input['password']))){

            if(auth()->user()->role == 1){
                return redirect()->route('admin.dasboard');
            }
            elseif(auth()->user()->role == 2){
              return redirect()->route('editor.dasboard');
            }
            elseif(auth()->user()->role == 3){
              return redirect()->route('home');
            }

    }else{
      return redirect()->route('login');
    }
     

    }


    protected function authenticated(Request $request,$user){
      $client = DB::table('oauth_clients')->where('id',2)->first();
      $http = new Client;
      
      $response = $http->post(url('/outh_token'),[
         'form_params'=>[
           'grant_type'=>'password',
           'client_id'=>2,
           'client_secret'=>$client->secret,
           'username'=>$request->email,
           'password'=>$request->password,
           'providerusers',
         ]
      ]);
      return json_decode((string) $response->Getbody() ,true);

    }





}
