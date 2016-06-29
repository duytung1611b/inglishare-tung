<?php namespace Modules\User\Http\Controllers;

use Pingpong\Modules\Routing\Controller;

class UserController extends Controller {
	
	public function index()
	{
		return view('user::index');
	}
	
		public function getAdd() {
   		return view('user::admin/user/add');
   }

   public function postAdd(UserRequest $request){
   		$user = new User();
   		$user->username = $request->txtUsername;
   		$user->password = Hash::make($request->txtPassword);
   		$user->email = $request->txtEmail;
   		$user->level = $request->rdoLevel;
   		$user->remember_token = $request->_token;
   		$user->save();
   		return redirect()->route('user::admin.user.list');

	   	
	}   

   public function getList(){
 		$user = User::select('id', 'username', 'level')->get()->toArray();
   		return view('user::admin/user/list', compact('user'));
   }
}