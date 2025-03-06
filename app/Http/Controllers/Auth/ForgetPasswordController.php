<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\auth\user as AuthUser;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ForgetPasswordController extends Controller
{
  /**
   * Write code on Method
   *
   * @return response()
   */
  public function showForgetPasswordForm()
  {
    $data['title'] = "Forgot Password";
    return view('user.forgetPassword.forget_password', $data);
  }

  /**
   * Write code on Method
   *
   * @return response()
   */
  public function submitForgetPasswordForm(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'email' => 'required|email|exists:users',
    ]);
    if ($validator->fails())
    {
      return back()->withErrors($validator)->withInput();
    }
    else
    {
      $user = User::where('email', $request->email)->first();
      if($user->role == 1)
      {
        $token = Str::random(64);

        DB::table('password_resets')->insert([
          'email' => $request->email,
          'token' => $token,
          'created_at' => Carbon::now()
        ]);

        $send = Mail::send('user.forgetPassword.forgetPasswordSend', ['token' => $token], function ($message) use ($request) {
          $message->to($request->email);
          $message->subject('Reset Password');
        });

        if($send)
        {
          $data['title'] = "Forgot Password";
          $data['list'] = 'We have e-mailed your password reset link!';
          return view('user.forgetPassword.forget_password', $data);
        } else {
          return back()->with("error", "Please try again!");
        }
      } else {
        return back()->with("error", "Invalid Access!");
      }
    }
  }

  /**
   * Write code on Method
   *
   * @return response()
   */
  public function showResetPasswordForm($token)
  {
    $data['title'] = "Reset Password";
    return view('user.forgetPassword.forgetPasswordLink', ['token' => $token], $data);
  }

  /**
   * Write code on Method
   *
   * @return response()
   */
  public function submitResetPasswordForm(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'email' => 'required|email|exists:users',
      'password' => 'required|string|min:6|confirmed',
      'password_confirmation' => 'required'
    ]);
    if ($validator->fails())
    {
      return back()->withErrors($validator)->withInput();
    }
    else
    {
    
      $userRole = User::where('email', $request->email)->first();
      if ($userRole->role == 1)
      {
        $updatePassword = DB::table('password_resets')
          ->where([
            'email' => $request->email,
            'token' => $request->passtoken,
          ])
          ->first();

        if(!$updatePassword){
          return back()->withInput()->with('error', 'Invalid token!');
        }

        $user = User::where('email', $request->email)
          ->update(['password' => Hash::make($request->password)]);
        if($user)
        {
          DB::table('password_resets')->where(['email' => $request->email])->delete();
          return redirect('/login')->with('success', 'Your password has been changed!');
        }
      }
    }
  }
}
