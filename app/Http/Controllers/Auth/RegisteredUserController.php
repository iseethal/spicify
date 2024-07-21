<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Mail\VerificationMail;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $verify_email    = session()->get('verify_email', []);

        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);



        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        // dd($user->toArray());

        $id    = $user->id;
        $otp   = rand(1, 1000000);
        $name  = $request->name;

        Mail::to($request->email)->send(new VerificationMail($name, $otp));

        $verify_email    = session()->get('verify_email', []);

        $verify_email[$id] = [

            "id"  => $id,
            "otp" => $otp,

        ];

        session()->put('verify_email', $verify_email);

        return redirect()->route('otp.get')->with('message', 'Verification mail has been sent');

    }

    public function GetOtp()
    {
        $verify_email    = session()->get('verify_email', []);

        if ($verify_email != null) {

            return view('auth.get_otp');
        } else {

            return redirect()->back();
        }
    }

    public function VerifyOtp(Request $request)
    {
        if ($request->otp != null) {

            $verify_email    = session()->get('verify_email', []);

            foreach ($verify_email as $item) {
                $otp   = $item['otp'];
                $id    = $item['id'];

            }
            $user = User::where('id',$id)->select('name','email','updated_at','created_at','id')->first();

            if ($otp == $request->otp) {

                $verify_email = session()->forget('verify_email');

                event(new Registered($user));

                Auth::login($user);

                return redirect(RouteServiceProvider::HOME);

                return redirect()->route('frontend.home');
            } else {
                return redirect()->back()->with('message', 'Please check your otp');
            }
        }
    }
}
