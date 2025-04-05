<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\MasterControl;
class MasterControlController extends Controller
{
    public function index()
    {
        try
        {
            $data['title'] = "Create Master Control";
            $data['list'] = MasterControl::first();
            return view("admin.masterControl.index",$data);
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
                'github_link' => 'required|string|max:255',
                'linkedin_link' => 'required|string|max:255',
                'pricing_status' => 'required|integer',
            ]);
            if ($validator->fails())
            { 
                return back()->withErrors($validator)->withInput();
            }
            else
            {
                $gettingData = MasterControl::first();
                if($request->logo != "")
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
                    $fname = time().'logo.'.$request->logo->extension();  
                    $fileName =date('d-m-Y-H-i-s').$fname;
                    $request->logo->move(public_path('gallery'), $fileName);
                    $logo = "gallery/".$fileName;
                }
                else
                {
                    $logo = $request->oldlogo;
                }

                if($request->favicon != "")
                {
                    //delete exists profile image file
                    if(!empty($gettingData))
                    {
                    $image_path = public_path()."/".$gettingData->favicon;
                    if(file_exists($image_path))
                    {
                        @unlink($image_path);
                    }
                    }
                    $fname = time().'favicon.'.$request->favicon->extension();  
                    $fileName =date('d-m-Y-H-i-s').$fname;
                    $request->favicon->move(public_path('gallery'), $fileName);
                    $favicon = "gallery/".$fileName;
                }
                else
                {
                    $favicon = $request->oldfavicon;
                }

                if($request->resume != "")
                {
                    //delete exists profile image file
                    if(!empty($gettingData))
                    {
                    $image_path = public_path()."/".$gettingData->resume;
                    if(file_exists($image_path))
                    {
                        @unlink($image_path);
                    }
                    }
                    $fname = time().'resume.'.$request->resume->extension();  
                    $fileName =date('d-m-Y-H-i-s').$fname;
                    $request->resume->move(public_path('gallery'), $fileName);
                    $resume = "gallery/".$fileName;
                }
                else
                {
                    $resume = $request->oldresume;
                }

                if(!empty($gettingData))
                {
                    $update = MasterControl::where("id",$gettingData->id)->update([
                        "logo" => $logo,
                        "favicon" => $favicon,
                        "resume" => $resume,
                        "github_link" => $request->github_link,
                        "linkedin_link" => $request->linkedin_link,
                        "pricing_status" => $request->pricing_status,
                        "portfolio_quote" => $request->portfolio_quote,
                        "experience" => $request->experience,
                    ]);

                    if($update)
                    {
                        return back()->with("success","Master Control Updated Successfully!");
                    }
                }
                else
                {
                    $data = new MasterControl;
                    $data->logo = $logo;
                    $data->favicon = $favicon;
                    $data->resume = $resume;
                    $data->github_link = $request->github_link;
                    $data->linkedin_link = $request->linkedin_link;
                    $data->pricing_status = $request->pricing_status;
                    $data->portfolio_quote = $request->portfolio_quote;
                    $data->experience = $request->experience;
                    if($data->save())
                    {
                        return back()->with("success","Master Control Created Successfully!");
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
