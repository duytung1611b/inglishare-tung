<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use App\Models;
use App\Services\Impl\UserServices;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Response;
use App\Lib\userlib;
use App\Lib\ResponseCode;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Session;
use Hash;
use Illuminate\Support\Facades\Redirect;

// use Illuminate\Support\Facades\Auth;
// use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }


    //Duy Tùng
    public function getLogin(){

        return view('auth/login');

    }


    // public function login(Request $request){
    //     $a = $request->email;
    //     return $a;
    // }

    // public function checkAuth(Request $request)
    // {
    //     $auth = array(
    //             'email' =>  $request->input('email'),
    //             'password' =>  $request->input('password'),
    //             'userType' => 'normal',
    //         );
    //         return $auth;

    // }
    

    public function postLogin(Request $request){
        // echo $request->email;
        // $userType= $request->userType;

        if (true){
            $auth = array(
                'email' =>  $request->input('email'),
                'password' =>  $request->input('password'),
                'userType' => 'normal',
            );
            // var_dump($auth);

           



        $validator = Validator::make($request->all(), [
            'email' => 'email|required|max:255',
            // 'password'=>($request->userType=='normal')?'required':'',
            // 'userType'=>'required'
        ]);
 
        if($validator->fails()){
           return Response::json($validator->errors(),ResponseCode::InputInvalid);
           //ResponseRequest(200,);
        }

       // echo $auth['password'];
        $user = User::where('email',$auth['email'] )->first();
//            $userinfo=array(
//                'email'=>$user->email,
//                'password'=>$user->password
//);


        if($user && Hash::check($auth['password'],$user->password)){


            $user->api_token = str_random(60);

            $user->save();

            $time=time();
            Session::put('api_token',$time);

            $data=array();
            $data['token']=$user->api_token;
            $data['userInfo'] = collect($user)->only(User::$UserInfoFields);
            // return json_encode($data);
             return  redirect()->action('UserController@test');
            
            

        }
        else{

            return Response::json('email hoac password khong ton tai',403);
        }


            //echo Hash::make($request->input('txtpassword'));

        }



    }
}
