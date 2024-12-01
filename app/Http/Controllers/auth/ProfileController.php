<?php

namespace App\Http\Controllers\auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class profileController extends Controller
{
    function index()
    {
        return view("auth.profile.layout");
    }
    function changeImage(Request $request)
    {
        $user_id = Auth::user()->id;

        $userImage = Auth::user()->image;
        $old_full_path = public_path("upload/") . $userImage;

        $kelo = 1024 * 2;
        $request->validate([
            "image" => "required|file|max:$kelo",
        ]);
        if ($request->hasFile("image")) {

            if ($userImage != "def.jpeg") {
                unlink($old_full_path);
            }

            $file_data = $request->file("image");
            $image_name = time() . $file_data->getClientOriginalName();
            $location = public_path("/upload");
            $file_data->move($location, $image_name);
        } else {
            $image_name = "def.jpeg";
        }

        $user = User::find($user_id);
        $user->image = $image_name;
        $user->save();
        return redirect()->back()->with("image", "Change Image successfully");
    }
    function changeData(Request $request)
    {
        $user_id = Auth::user()->id;
        $request->validate([
            "name" => "required|string|min:3|max:255",
            "email" => "required|string|email|min:3|max:255|unique:users,email,$user_id",
        ]);

        $user = User::find($user_id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        return redirect()->back()->with("data", "Change Data successfully");
    }

    function changePassword(Request $request)
    {
        $request->validate([
            "current_password" => "required",
            'password' => "required|confirmed|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,}$/",
    ],[
        'password.regex' => 'The password must be more then 6 & contain at least one lowercase , one uppercase , one number, and one special character (@$!%*?&)',
    ]);
        $user_id = Auth::user()->id;
        $user_password = DB::table('users')->where('id', $user_id)->value('password');

        $current_password = $request->current_password;

        $value =   Hash::check($current_password,  $user_password);
        if ($value) {
            $user =   User::find($user_id);
            $user->password =  Hash::make($request->password);
            $user->save();
            return redirect()->back()->with("passwordd", "Change Password successfully");
        } else {
            return redirect()->back()->with("passwordd", "Wrong Password");
        }
    }

    function deleteAccount(Request $request)
    {
        $request->validate([
            "curren_password" => "required",
        ]);

        $user_id = Auth::user()->id;
        $user_password = DB::table('users')->where('id', $user_id)->value('password');

        $current_password = $request->curren_password;

        $value =   Hash::check($current_password,  $user_password);
        if ($value) {
            $userImage = Auth::user()->image;
            $old_full_path = public_path("upload/") . $userImage;

            if ($userImage != "def.jepg") {
                unlink($old_full_path);
            }

            $user = User::find($user_id);
            $user->delete();
            Auth::logout();
            return redirect()->route("login");
        } else {
            return redirect()->back()->with("del", "Wrong Password");
        }
    }

}
