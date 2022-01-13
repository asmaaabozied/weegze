<?php

namespace App\Http\Controllers\User;

use App\Mail\SendPassword;
use App\Models\Generalsetting;
use App\Models\User;
use Illuminate\Http\Request;
use App\Classes\GeniusMailer;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Validator;

class ForgotController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showForgotForm()
    {
        return view('user.forgot');
    }

    public function forgot(Request $request)
    {
        $gs = Generalsetting::findOrFail(1);
        $input = $request->all();
        if (User::where('email', '=', $request->email)->count() > 0) {
            // user found
            $admin = User::where('email', '=', $request->email)->firstOrFail();
            $autopass = str_random(8);
            $input['password'] = bcrypt($autopass);
            $admin->update($input);
            $subject = "Reset Password Request";
            $msg = "Your New Password is : " . $autopass;
            if ($gs->is_smtp == 1) {
                Mail::to($request->email)->send(new SendPassword($autopass));
//          $data = [
//                  'to' => $request->email,
//                  'subject' => $subject,
//                  'body' => $msg,
//          ];
//
//          $mailer = new GeniusMailer();
//          $mailer->sendCustomMail($data);
            } else {
//          $headers = "From: ".$gs->from_name."<".$gs->from_email.">";
//          mail($request->email,$subject,$msg,$headers);

                Mail::to($gs->from_email)->send(new SendPassword($autopass));

            }

            session()->flash('success', __('site.Your Password Reseted Successfully. Please Check your email for new Password.'));
            return back();
//            return response()->json('Your Password Reseted Successfully. Please Check your email for new Password.');
        } else {
            // user not found

            session()->flash('success', __('site.No Account Found With This Email'));
            return back();
//            return response()->json(array('errors' => [0 => 'No Account Found With This Email.']));
        }
    }

}
