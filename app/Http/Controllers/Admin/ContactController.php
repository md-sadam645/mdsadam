<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        try
        {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255',
                'mobile' => 'required|string|max:10|min:10',
                'subject' => 'required|string|max:255',
                'message' => 'required|string'
            ]);
            if ($validator->fails())
            { 
                return back()->withErrors($validator)->withInput();
            }
            else
            {
                if(Contact::create($request->all()))
                {   
                    $data =['name' =>$request->name,'email' =>$request->email,'mobile' =>$request->mobile,'subject' =>$request->subject,'message' =>$request->message];
                    $send = Mail::send('web.emailSend', ['data' => $data], function ($message) use ($request) {
                        $message->to('sabestianali@gmail.com');
                        $message->subject('Inquiry');
                      });
    
                    if($send)
                    {
                        return back()->with("success","Thank You ".$request->name.", You are very important to us, We will contact you as soon as we review your message.");
                    }
                }
            }
        }
        catch(\Exception $e)
        {
            return $e->getMessage();
        }
    }

    public function view()
    {
        try
        {
            $data['title'] = "View Contact-Us";
            $data['count'] = Contact::count();
            $data['list'] = Contact::latest()->paginate(5);
            return view("admin.contact.view",$data);
        }
        catch(\Exception $e)
        {
            return $e->getMessage();
        }
    }

    public function viewDetails($id)
    {
        try
        {
            $data['title'] = "View In Details Contact-Us";
            $data['list'] = Contact::where("id",$id)->first();
            return view("admin.contact.viewDetails",$data);
        }
        catch(\Exception $e)
        {
            return $e->getMessage();
        }
    }


    public function destroy($id)
    {
        try
        {
            if(Contact::where("id",$id)->delete())
            {
                return back()->with("success","Contact-Us Deleted Successfully!");
            }
        }
        catch(\Exception $e)
        {
            return $e->getMessage();
        }
    }
}
