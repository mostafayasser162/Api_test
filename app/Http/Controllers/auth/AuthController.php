<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    function login()
    {
        return view('auth.login');
    }

    function store_login(Request $request)
    {
        $request->validate([
            'email' => "required|string|email",
            'password' => "required|string",
        ]);
        if (Auth::attempt($request->only('email', "password"))) {
            $request->session()->regenerate();
            return redirect()->route('employee.index');
        } else {
            return redirect()->back()->with("fail", "wrong Password or email");
        }
    }

    function show_register()
    {
        return view('auth.register');
    }
    function register(Request $request)
    {
        $size_mega = 1024 * 2; // for image
        $request->validate([
            'name' => "required|string|max:255|min:3",
            'email' => "required|string|max:255|min:3|email|unique:users,email",
            'password' => "required|confirmed|min:6|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,}$/",
            // for image
            'image' => "file|max:$size_mega",

    ], [
        'password.regex' => 'The password must be more then 6 & contain at least one lowercase , one uppercase , one number, and one special character (@$!%*?&)',
    ]);

        if ($request->hasFile("image")) {
            $data = $request->file("image");
            $image_name = time() . $data->getClientOriginalName();
            $location = public_path("upload");
            $data->move($location, $image_name);
            // $data = move
        } else {
            $image_name = 'def.jpeg';
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), //for hashing the password
            'image' => $image_name,
        ]);
        return redirect()->back()->with('done', ' the user added succssfully  ');
    }

    function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
