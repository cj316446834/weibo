<?php

namespace App\Http\Controllers;

use App\Notifications\FindPasswordNotify;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Notifications\Notifiable;
use Illuminate\Notifications\Notification;
use Ramsey\Uuid\Exception\NodeException;

class PasswordController extends Controller
{
    public function email()
    {
        return view('password.email');
    }

    protected function getUserByToken($token)
    {
        return User::where('activation_token',$token)->first();
    }

    public function send(Request $request)
    {
        $user = User::where('email',$request->email)->first();
        \Notification::send($user, new FindPasswordNotify($user->activation_token));
        return view('password.send');
    }

    public function edit($token)
    {
        $user = $this->getUserByToken($token);
        return view('password.edit',compact('user'));
    }

    public function update(Request $request)
    {
        $this->validate($request,[
            'password' => 'required|min:5|confirmed'
        ]);
        $user = $this->getUserByToken($request->token);
        $user->password = bcrypt($request->password);
        $user->save();
        session()->flash('success','密码修改成功');
        return redirect()->route('login');
    }
}
