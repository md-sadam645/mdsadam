<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function login()
    {
        $data['title'] ='Login';
        return view('admin/auth/login',$data);
    }

    //Start - Admin Login
    public function authAdmin(Request $request)
    {
        // return  $request;
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6',
        ]);
        if($validator->fails())
        {
            return back()->with('error',$validator->errors()->all());
        }

        $username = $request->email;
        $password = $request->password;

        $checkUser = User::where("email",$username)->first();
        if(!empty($checkUser))
        {
            if($checkUser->role == 1)
            {   
    
                //current date time
                $now = Carbon::now();
                $dateTime = $now->format('Y-m-d g:i A');
                if(Auth::attempt(['email' => $username, 'password' => $password]))
                {
                    $update = User::where("id",Auth::user()->id)->update(array(
                        "last_login" => $dateTime
                    ));
                    if($update)
                    {
                        return redirect('/dashboard')->with('success', 'Login Success');
                    } 
                }
                else
                {
                    return back()->with("error","Wrong password !");
                }
            
            }
            else
            {
                return back()->with("error","Access Denied!");
            }
        }
        else
        {
            return back()->with("error","User not registered!");
        }
    }
    //End - Super Admin & Admin  Login

    //Start -Admin  view Profile
    function myProfile()
    {
        $data['title'] ='My Profile';
        return view('admin.auth.myProfile',$data);
    }
    //End - Admin  view Profile

    //Start - Admin  Profile Update
    function profileUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            // 'email' => 'required|string|email|max:255|unique:users',
            'mobile' => 'required|string|min:10|max:10'
        ]);
        if($validator->fails())
        {
            return back()->with('error',$validator->errors()->all());
        }

        $userData = User::where("id",Auth::user()->id)->first();
        if($request->file("profile") != "")
        {
            //delete exists profile image file
            $image_path = public_path()."/".$userData->image;
            if(file_exists($image_path))
            {
                @unlink($image_path);
            }
            $fname = time().'.'.$request->profile->extension();  
            $fileName =date('d-m-Y-H-i-s').$fname;
            $request->profile->move(public_path('gallery'), $fileName);
            $profileImg= "gallery/".$fileName;
        }
        else
        {
            $profileImg = $userData->image;
        }

        $update = User::where("id",Auth::user()->id)->update(array(
            'image' => $profileImg,
            'name' => $request->name,
            'email' => $request->email,
            'mobile'=>$request->mobile
        ));
        if($update)
        {
            return back()->with('success','You have been successfully update profile!');
        }
    }
    //End - Admin  Profile Update

    //Start - Admin  Change Password
    function changePassword()
    {
        $data['title'] ='Change Password';
        return view('admin.auth.changePassword',$data);
    }
    //Start - Admin  Change Password

    //Start - Admin  Update Password
    function updatePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'current_password' => 'required|string|min:6',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required| min:6'
            
        ]);
        if($validator->fails())
        {
            return back()->with('error',$validator->errors()->all());
        }
        else
        {
            $user =  User::where("id", Auth::user()->id)->first();
            if($user && password_verify($request->current_password, $user->password))
            {
                $update = $user->update(array(
                    'password' =>  Hash::make($request['password_confirmation']),
                ));
                if($update)
                {
                    Auth::logout();
                    return redirect("/login")->with("success","Your password was changed !");
                }
            }
            else
            {
                return back()->with("error","Current Password Doesn't Matched !");
                
            }
        }
    }
    //End -Admin  Update Password

    // public function unauthorized(){
    //     Auth::logout();
    //     return redirect('login');
    //     echo "Unauthorized access from middleware"; 
    // }

    
    //Start - Admin  Logout
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
    //End - Admin  Logout
}
