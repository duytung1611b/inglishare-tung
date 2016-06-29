<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 6/24/2016
 * Time: 9:30 AM
 */
namespace App\Http\Controllers;
use App\Models\User;
use App\Services\Impl\UserServices;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Request;


class SeviceController extends Controller
{
    public function service()
    {
     //return UserServices::getAll();
 UserServices::getAll();
        if (Session::has('key')) {
            echo Session::get('hii');
        }

    }
    public function showProfile()
    {
        $value = session()->put('key','hihi');
        $data= session()->get('key');
        return $data;

        //
    }
    public function sendEmailReminder(Request $request, $id)
    {
        $user = User::findOrFail($id);

        Mail::send('emails.reminder', ['user' => $user], function ($m) use ($user) {
            $m->from('hoamk2016@gmail.com', 'Your Application');

            $m->to($user->email, $user->name)->subject('Your Reminder!');
        });
    }
}