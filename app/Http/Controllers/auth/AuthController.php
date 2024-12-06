<?php

namespace App\Http\Controllers\auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use GrahamCampbell\ResultType\Success;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\EmployeeController;

class AuthController extends Controller
{
    function login()
    {
        // return view('auth.login');
    }

    function store_login(Request $request)
    {
        $request->validate([
            'email' => "required|string|email",
            'password' => "required|string",
        ]);
        if (Auth::attempt($request->only('email', "password"))) {
            // $request->session()->regenerate();
            $user = Auth::user();
            // return redirect()->route('employee.index');
            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                'token' => $token,
                'Success'=>200,
                'msg'=>'logged succ',
            ]);
        } else {
            // return redirect()->back()->with("fail", "wrong Password or email");
            return response()->json([
                'msg'=>'wrong email or password',
            ]);
        }
    }

    // function show_register()
    // {
    //     return view('auth.register');
    // }
    function register(Request $request)
    {
        $size_mega = 1024 * 2; // for image
        $validator = Validator::make($request->all(), [
            'name' => "required|string|max:255|min:3",
            'email' => "required|string|max:255|min:3|email|unique:users,email",
            'password' => "required|confirmed|min:6|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,}$/",
            'image' => "file|max:$size_mega",
        ], [
            'password.regex' => 'The password must be at least 6 characters long, contain at least one lowercase letter, one uppercase letter, one number, and one special character (@$!%*?&).',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ], 422);
        }
        if ($request->hasFile("image")) {
            $data = $request->file("image");
            $image_name = time() . $data->getClientOriginalName();
            $location = public_path("upload");
            $data->move($location, $image_name);
        } else {
            $image_name = 'def.jpeg';
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), //for hashing the password
            'image' => $image_name,
        ]);
        // return redirect()->back()->with('done', ' the user added succssfully  ');
        $token = $user->createToken('API Token')->plainTextToken;

    return response()->json([
        'success' => true,
        'message' => 'User registered successfully',
        'token' => $token,
        'user' => $user,
    ], 201);
}


    function logout(Request $request){
        $request->user()->tokens->each(function ($token) {
            $token->delete();
        });

        return response()->json([
            'success' => true,
            'message' => 'Logged out successfully',
        ], 200);
    }
    // function logout(){
    //     Auth::logout();
    //     return redirect()->route('login');
    // }
}
