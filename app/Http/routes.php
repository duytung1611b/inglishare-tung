<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
// header('Access-Control-Allow-Origin:  *');
// header('Access-Control-Allow-Methods:  POST, GET, OPTIONS, PUT, DELETE');
// header('Access-Control-Allow-Headers:  Content-Type, X-Auth-Token, Origin, Authorization');
// Route::get('list',['uses' => 'UserController@getRegister']);

Route::get('/',function () {
    return view('index');
});

Route::group(['prefix'=>'api'], function () {
    Route::group(['prefix'=>'users'], function () {
        Route::get('test', ['as' => 'api.users.test' ,'uses'=>'UserController@test']);

        Route::get('list', ['as' => 'list2', 'uses'=>'UserController@getList2']);
        Route::pattern('id','[0-9]+');
        Route::get('login', ['as' => 'getLogin', 'uses' => 'Auth\AuthController@getLogin']);
        Route::post('login', ['uses' => 'Auth\AuthController@postLogin']);
        Route::get('dangky', ['as'=>'api.users.dangky', 'uses'=>'UserController@getRegister']);
        Route::post('register', ['as' => 'postUserReg', 'uses' => 'UserController@postRegister']);
        Route::get('{id}', ['as'=>'getUserId','uses'=>'UserController@getUser']);
    });

    Route::group(['middleware'=>['CheckLogin']],function(){
        Route::delete('users/{id}', ['as'=>'postUserId','uses'=>'UserController@delUser']);
        Route::put('users/{id}', ['as'=>'updateUser','uses'=>'UserController@putUser']);
        // GET LIST BY ADMIN
// <<<<<<< Updated upstream
        Route::get('users',['as'=>'getListUser','uses'=>'UserController@getList']);


// =======
        Route::get('usersSearch/{id}',['as'=>'getListUser','uses'=>'UserController@getList']);
// >>>>>>> Stashed changes
    });
});

Route::get('service',['as'=>'servicetest','uses'=>'SeviceController@service']);
Route::get('session',['as'=>'123','uses'=>'SeviceController@showProfile']);
Route::get('sendmail/{id}',['as'=>'345','uses'=>'SeviceController@sendEmailReminder']);



//    Route::get('delete/{id}', ['as' => 'admin.user.delete', 'uses' => 'UserController@getDelete']);
//    Route::get('edit/{id}', ['as' => 'admin.user.getEdit', 'uses' => 'UserController@getEdit']);
//    Route::post('edit/{id}', ['as' => 'admin.user.postEdit', 'uses' => 'UserController@postEdit']);
//    Route::get('delImg/{id}', ['as' => 'admin.user.getDelImg', 'uses' => 'UserController@getDelImg']);
//
//    Route::group(['prefix' => 'role'], function () {
//        Route::get('listall', ['as' => 'admin.role.listall', 'uses' => 'RoleController@index']);
//    });
//user API













Route::get('schema/drop', function () {
    Schema::drop('forgotPasswords');
});

Route::get('schema/add_column', function () {
     Schema::table('forgotpassword', function ($table) {
    
    $table->foreign('roleid')->references('id')->on('roles');
       });
});

