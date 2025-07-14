<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginPage()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $isValid = Auth::attempt(['email' => $request->email, 'password' => $request->password]);

        if($isValid) {
            return redirect()->route('home');
        }

        return redirect()->back()->with(['status' => false, 'message' => 'Email or password is invalid !']);
    }

    public function showRegisterPage()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $photo_url = '';

        if($request->hasFile('photo')) {
            $photo_url = $request->file('photo')->store('users/photos');
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'photo_url' => $photo_url,
        ]);

        Auth::loginUsingId($user->id);

        return redirect()->route('home');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('home');
    }
}
