<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Gender;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    function ShowRegister()
    {
        return view('register',['roles'=>Role::get()]);
    }
    function RegisterUser(Request $request)
    {

        $validatedData = $request->validate([
            'first_name' => 'required|max:25',
            'last_name' => 'required|max:25',
            'email' => 'required|max:100|email',
            'password' => 'required_with:confirm_password|same:confirm_password|min:8|regex:/[0-9]/',
            'confirm_password' => 'required',
            'role_id' => 'required',
            'gender_id' => 'required',
            'display_picture_link' => 'required|image|file|max:5000',
        ]);
        $validatedData['password'] =bcrypt($validatedData['password']);
        if ($request->file('display_picture_link')) {
            $validatedData['display_picture_link'] = $request->file('display_picture_link')->store('account-images');
        }
        Account::create($validatedData);
        return redirect(app()->getLocale() .'/home');
    }

    public function ShowLogin()
    {
        return view('login');
    }
    public function LoginUser(Request $request)
    {
        $credentials = $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required'
            ]
        );
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(App::getLocale() .'/home');
        }
        return back()->with('loginError','Login failed!');
    }
    public function LogoutUser(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return view('logout_success'); 
    }
}
