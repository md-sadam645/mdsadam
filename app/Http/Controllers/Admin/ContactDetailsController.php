<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\ContactDetails;
class ContactDetailsController extends Controller
{
    public function index()
    {
        try
        {
            $data['title'] = "Create Contact Detail";
            $data['list'] = ContactDetails::first();
            return view("admin.contactDetail.index",$data);
        }
        catch(\Exception $e)
        {
            return $e->getMessage();
        }
    }

    public function add(Request $request)
    {
        try
        {
            $validator = Validator::make($request->all(), [
                // 'image' => 'required|string|max:255',
                'title' => 'required|string|max:255',
                'subtitle' => 'required|string|max:255',
                'email' => 'required|string|email|max:255',
                'mobile' => 'required|string|max:10|min:10',
                'description' => 'required',
            ]);
            if ($validator->fails())
            { 
                return back()->withErrors($validator)->withInput();
            }
            else
            {
                $gettingData = ContactDetails::first();
                if($request->image != "")
                {
                    //delete exists profile image file
                    if(!empty($gettingData))
                    {
                    $image_path = public_path()."/".$gettingData->image;
                    if(file_exists($image_path))
                    {
                        @unlink($image_path);
                    }
                    }
                    $fname = time().'.'.$request->image->extension();  
                    $fileName =date('d-m-Y-H-i-s').$fname;
                    $request->image->move(public_path('gallery'), $fileName);
                    $image = "gallery/".$fileName;
                }
                else
                {
                    $image = $request->oldImage;
                }

                if(!empty($gettingData))
                {
                    $update = ContactDetails::where("id",$gettingData->id)->update([
                        "title" => $request->title,
                        "subtitle" => $request->subtitle,
                        "email" => $request->email,
                        "mobile" => $request->mobile,
                        "description" => $request->description,
                        "image" => $image,
                    ]);

                    if($update)
                    {
                        return back()->with("success","Contact Detail Updated Successfully!");
                    }
                }
                else
                {
                    $slider = new ContactDetails;
                    $slider->title = $request->title;
                    $slider->subtitle = $request->subtitle;
                    $slider->email = $request->email;
                    $slider->mobile = $request->mobile;
                    $slider->description = $request->description;
                    $slider->image = $image;
                    if($slider->save())
                    {
                        return back()->with("success","Contact Detail Created Successfully!");
                    }
                }
            }
        }
        catch(\Exception $e)
        {
            return $e->getMessage();
        }
    }
}
