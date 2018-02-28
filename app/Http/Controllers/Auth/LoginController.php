<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Hash;

class LoginController extends Controller
{
    public function Login(Request $req)
    {
    	$this->validate($req,[
    		'email' => 'email|max:191|required',
    		'password' => 'min:4|max:32|required'
    	]);

    	$user = User::where('email', $req->email)->first();

    	if(!$user)
    	{
    		return back()->with('error','Wrong Details!');
    	}

        if (Hash::check($req->password . $req->email, $user->password))
    	{
    		Auth::login($user);
    		return redirect('/');
    	}

    	return back()->with('error','Wrong Details!');
    }

    public function logout()
    {
    	Auth::logout();

    	return redirect('/');
    }
}
