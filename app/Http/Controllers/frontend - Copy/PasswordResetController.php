<?php

namespace App\Http\Controllers\frontend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\ResetPasswordMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class PasswordResetController extends Controller
{

    public function ForgotPassword()
    {

        return view('password.forgot-password');
    }

    public function ResetPassword()
    {
        $reset_password    = session()->get('reset_password', []);

        if (session('reset_password')) {
            return view('password.password_confirmation');
        } else {
            return redirect()->back();
        }
    }

    public function StorePassword(Request $request)
    {

        $password              = $request->password;
        $password_confirmation = $request->password_confirmation;

        if($password == $password_confirmation){

            $reset_password    = session()->get('reset_password', []);
                foreach($reset_password as $item){
                    $user_id = $item['id'];
                }

            User::findOrFail($user_id)->update([

                'password' => Hash::make($password)
            ]);

            $reset_password = session()->forget('reset_password');

        }else {

            return redirect()->back()->with('message', 'Something went wrong');
        }


        return redirect()->route('login')->with('message', 'Your Password has been updated. Please login to continue.');
    }

    public function MailPassword(Request $request)
    {
        $email  = $request->email;
        $check_email = User::where('email', $email)->exists();

        if ($check_email == 1) {

            $check_email = User::where('email', $email)->exists();
            $name        = User::where('email', $email)->pluck('name')->first();
            $user_id     = User::where('email', $email)->pluck('id')->first();
            $otp         = rand(1,1000000);


            Mail::to($email)->send(new ResetPasswordMail($name, $otp));

            $reset_password    = session()->get('reset_password', []);

            $reset_password[$user_id] = [

                "id"  => $user_id,
                "otp" => $otp,

            ];

            session()->put('reset_password', $reset_password);

            return redirect()->route('password.forgot')->with('message', 'Reset password has been sent');

        } else if($request->otp != null){

            $reset_password    = session()->get('reset_password', []);
            foreach($reset_password as $item){
                $otp = $item['otp'];
            }
            if($otp == $request->otp){

                 return redirect()->route('password.reset');
            }else {
                return redirect()->back()->with('message', 'Please check your otp');
            }

        }  else {

            return redirect()->route('password.forgot')->with('message', 'We cant find a user with that email address.');
        }
    }
}
