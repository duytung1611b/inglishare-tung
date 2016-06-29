<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\User1;
use Hash;
use App\Services\Impl\UserServices;
use App\Lib\ResponseCode;
use App\Lib\RoleId;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Response;
use Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;

class UserController extends Controller{



  public function test(){
    return view('layouts/index');
  }

 public function getList2 () {
        // $user = User::orderBy('id','DESC')->get();
        // return Response::json($user);
    return view('admin/user/add');
    }

   public function getUser($id){

       $user= User::find($id);
       if($user)
       {
           return Response::json($user,ResponseCode::OK);
       }
       else
           return Response::json("User not found",ResponseCode::NotFound);
   }

    public function delUser($id){
        $currentUser=  Auth::guard('api')->user();//lấy mã api_token kiểm tra login
        $user=User::find($id);//lấy id qua request
echo $currentUser->role()->get()->first()->name;
        if($user)
            {
            // tra ve gia tri cua bang lien ket echo $user->is('user');

            if($id==$currentUser->id||$currentUser->is('admin'))
            {

                $currentUser->banned=1;
                $currentUser->save();
                return Response::json("succsess",ResponseCode::OK);
            }
            else{

                return Response::json("Not allow",ResponseCode::Forbidden);

            }
        }
        else
            return Response::json("User not found",ResponseCode::NotFound);
    }

   public  function postEdit(Request $request, $id){
   
   }
    // After Logined
   public function putUser(Request $request,$id){

       $currentUser=  Auth::guard('api')->user();//lấy mã api_token kiểm tra login


       $user=User::find($id);//lấy id qua request


       if($user){
           // tra ve gia tri cua bang lien ket echo $user->is('user');
            if($id==$currentUser->id)
            {

                //user thay doi thong tin cua minh
            $data=array
                (
                    'birthday'=>$request->input('birthday'),
                    'firstName'=>$request->input('firstName'),
                    'lastName'=>$request->input('lastName'),
                    'gender'=>$request->input('gender'),
                    'description'=>$request->input('description')
                );
                $validator = Validator::make($request->all(), [

                    'birthday'=>'required',
                    'firstName'=>'required|max:64',
                    'lastName'=>'required|max:64',
                    'gender'=>'required|in:male,female',
                    'description'=>'required'
                ]);
                if($validator->fails())
                {
                    return Response::json($validator->errors(),ResponseCode::InputInvalid);
                    //ResponseRequest(200,);
                }
                else
                    {
                        $user->birthday=$data['birthday'];
                        $user->firstName=$data['firstName'];
                        $user->lastName=$data['lastName'];
                        $user->gender=$data['gender'];
                        $user->description=$data['description'];
                        $user->save();
                        return Response::json($user,ResponseCode::OK);
                    }
            }
           else{
               return Response::json("Not allow",ResponseCode::Forbidden);
           }

     }
        else
            return Response::json("User not found",ResponseCode::NotFound);
   	}


     
    public function getRegister(){

        return view('admin/user/add');

    }


    public function postRegister(Request $request){
        if (true){
            $data = array(
                'email' =>  $request->input('email'),
                'password' =>  $request->input('password'),
                // 'userType'=>$request->input('userType'),
                // 'birthday'=>$request->input('birthday'),
                'firstName'=>$request->input('firstName'),
                'lastName'=>$request->input('lastName'),
                // 'gender'=>$request->input('gender')
            );
        }

        // var_dump($data);

        $validator = Validator::make($request->all(), [
            'email' => 'email|required|max:255|unique:users',
            'password'=>'required|max:32|min:6',
            // 'userType'=>'required|in:normal,facebook,google+',
            // 'birthday'=>'required',
            'firstName'=>'required|max:64',
            'lastName'=>'required|max:64',
            // 'gender'=>'required|in:male,female'
        ]);
        if($validator->fails()){
            return Response::json($validator->errors(),ResponseCode::InputInvalid);
            //ResponseRequest(200,);
        }
        else{
            $newUser=new User();
            $newUser->email=$data['email'];
            $newUser->password=Hash::make($data['password']);
            // $newUser->userType=$data['userType'];
            // $newUser->birthday=$data['birthday'];
            $newUser->firstName=$data['firstName'];
            $newUser->lastName=$data['lastName'];
            // $newUser->gender=$data['gender'];
            // $newUser->roleId= RoleId::user;
            $newUser->save();
            $user=array();
            $user = User::where('email',$data['email'])->first();

            $currentUser= Response::json($user,ResponseCode::OK);
            return $currentUser;
        }
    }
    public function getList(Request $request){
        //$data = $request->session()->all();

            return Session::get('api_token');
        $currentUser=  Auth::guard('api')->user();//lấy mã api_token kiểm tra login
            if($currentUser->is('admin'))//kiem tra xem co phai la admin khong
            {
               $request->all();
                $pageSize=10;
                $page=1;
                $roleId=2;

                $sortBy='id';
                $order='ASC';

                $data = User::where('banned',0);
                if(Input::has('pageSize')&&Input::get('pageSize')>0 )
                {
                    $pageSize=Input::get('pageSize');

                }

                if(Input::has('page'))
                {
                    $page=Input::get('page');

                }
                if(Input::has('roleId'))
                {

                    $roleId=Input::get('roleId');
                    $data = $data->where('roleId',$roleId);
                }

                 if(Input::has('sortBy'))
                 {
                     $sortBy=Input::get('sortBy');

                 }
                if(Input::has('order'))
                {
                    $order=Input::get('order');
                }


               $data=$data->skip(($page-1)*$pageSize)->take($pageSize)->orderBy($sortBy,$order);

                if(Input::has('fields'))
                {

                    $fields=Input::get('fields');
                    $fields=(explode(',',$fields));


                   $list=$data->get();
                    $multiplied = collect($list)->map(function ($item) use($fields) {
//                        $fields=Input::get('fields');
//                        $fields=(explode(',',$fields));
                        $item= collect($item)->only($fields);
                        return $item;
                    });



                    $result=Response::json($multiplied,ResponseCode::OK);
                  $result=array(
                      'User' =>  $multiplied,
                      'Page' =>  $page,
                      'Count'=>$list->count()
                  );
                return json_encode($result);
                }
                else
                $list=$data->get();
                $result=array(
                    'User' =>  $list,
                    'Page' =>  $page,
                    'Count'=>$list->count()
                  );
                return json_encode($result);
            }
            else{
            $result= Response::json("not Allow",ResponseCode::Forbidden);
                return $result;
            }

    }
}
