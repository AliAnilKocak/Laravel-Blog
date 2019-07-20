<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login_form()
    {
        return view('admin.login');
    }
    public function login()
    {
        $this->validate(request(), [
            'username' => 'required',
            'password' => 'required',
        ]);
        //dd(Hash::make('deneme'));
        if (auth()->attempt(['username' => request('username'), 'password' => request('password')])) {
            request()->session()->regenerate();
            return redirect()->intended('/admin/home');
        } else {
            $errors = ['email' => 'Hatalı Giriş'];
            return back()->withErrors($errors);
        }
    }
}
