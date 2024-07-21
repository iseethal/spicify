<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;
use App\Models\Admin;


class AdminController extends Controller
{

    public function Dashboard()
    {
        return view('backend.dashboard');
    }

    public function Login()
    {
        return view('backend.login');
    }


    public function Save(Request $request)
    {
        // dd($request->all());
        $user = Admin::where('user_name', $request->user_name)->where('status', '<>' , 2)->exists();

        if($user == 1){

            $user_result = Admin::where('user_name', $request->user_name)->first();

            $decrypt_password = Crypt::decrypt($user_result->password);

            if ($request->password != $decrypt_password){

                return back()->with('error','Invalid Email Or Password');

            }
            else{

                $request->session()->put('user', $user_result);

                return redirect()->route('admin.dashboard')->with('error', 'Login Successfully');

            }
        }

        else {
            return back()->with('error','User does not exist');
        }
    }


    //  public function Register()
    // {
    //     return view('backend.register');
    // }

    // public function Save(Request $request)
    // {
    //     // dd($request->all());
    //     Admin::insert([

    //         'name' => $request->name,
    //         'role' => 1,
    //         'user_name' => $request->user_name,
    //         'password'=>Crypt::encrypt($request->password),
    //         'status' => 1,
    //         ]);

    //     return redirect()->route('admin.dashboard');

    // }

    public function SignOut(Request $request)
    {
        Session::flush();
        // return view('backend.login')->with('error','Logout Successfully');
        return redirect()->route('loggin')->with('error','Logout Successfully');

    }

    public function Profile(Request $request)
    {

        $profiles = Admin::get();

        $user      = session()->get('user');
        $user_name = $user->user_name;
        $role      = $user->role;
        if($role == 1) {
        return view('backend.profile', compact('profiles'));

        } else {

         return redirect()->back();

        }

    }


    public function ChangePassword(Request $request)
    {
        $id      = $request->id;
        $profile = Admin::findOrFail($id);

        return view('backend.change_password', compact('profile'));
    }

    public function UpdatePassword(Request $request, $id)
    {

        Admin::findOrFail($id)->update([

            'name'       => $request->name,
            'user_name'  => $request->user_name,
            'password'   =>Crypt::encrypt($request->password),
        ]);

        return redirect()->route('admin.profile')->with('success', 'password updated' );
    }



}
