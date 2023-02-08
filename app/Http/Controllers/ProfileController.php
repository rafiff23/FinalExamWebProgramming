<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    //
    function ShowProfile()
    {
        $user = auth()->user();
        return view('profile', [
            'user' => $user,
            'roles' => Role::get()
        ]);
    }

    function EditProfile(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|max:25',
            'last_name' => 'required|max:25',
            'email' => 'required|max:100|email',
            'password' => 'required_with:confirm_password|same:confirm_password|min:8|regex:/[0-9]/',
            'gender_id' => 'required',
            'display_picture_link' => 'image|file|max:5000',
        ]);
        $validatedData['password'] = bcrypt($validatedData['password']);
        if ($request->file('display_picture_link')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['display_picture_link'] = $request->file('display_picture_link')->store('account-images');
        }
        Account::where('account_id',auth()->user()->account_id)->update($validatedData);
        return view('saved');
    }
}
