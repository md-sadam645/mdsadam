<?php

namespace App\Http\Controllers\admin;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Skill;
class SkillController extends Controller
{
    public function index()
    {
        try
        {
            $data['title'] = "Create Skill";
            return view("admin.resume.skill.index",$data);
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
                'category' => 'required|string|max:255',
                'name' => 'required|string',
                // 'percentage' => 'required|integer',
                'image' => 'required|mimes:jpg,png,jpeg',
                'status' => 'required|integer',
            ]);
            if ($validator->fails())
            { 
                return back()->withErrors($validator)->withInput();
            }
            else
            {
                
                $fname = time().'skill.'.$request->image->extension();  
                $fileName =date('d-m-Y-H-i-s').$fname;
                $request->image->move(public_path('skill'), $fileName);
                $imgUrl = "skill/".$fileName;
                
                $data = new Skill;
                $data->category = $request->category;
                $data->name = $request->name;
                $data->percentage = $request->percentage; 
                $data->image = $imgUrl; 
                $data->status = $request->status; 
                if($data->save())
                {
                    return back()->with("success","Skill Created Successfully!");
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
            $data['title'] = "View Skill";
            $data['count'] = Skill::count();
            $data['list'] = Skill::paginate(5);
            return view("admin.resume.skill.view",$data);
        }
        catch(\Exception $e)
        {
            return $e->getMessage();
        }
    }

    public function edit($id)
    {
        try
        {
            $data['title'] = "Edit Skill";
            $data['list'] = Skill::where("id",$id)->first();
            return view("admin.resume.skill.edit",$data);
        }
        catch(\Exception $e)
        {
            return $e->getMessage();
        }
    }

    public function update(Request $request ,$id)
    {
        try
        {
            $validator = Validator::make($request->all(), [
                'category' => 'required|string|max:255',
                'name' => 'required|string',
                'image' => 'required|mimes:jpg,png,jpeg',
                // 'percentage' => 'required|integer',
                'status' => 'required|integer',
            ]);
            if ($validator->fails())
            { 
                return back()->withErrors($validator)->withInput();
            }
            else
            {
                $gettingData = Skill::where("id",$id)->first();
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
                    $fname = time().'skill.'.$request->image->extension();  
                    $fileName =date('d-m-Y-H-i-s').$fname;
                    $request->image->move(public_path('skill'), $fileName);
                    $imgUrl = "skill/".$fileName;
                }else
                {
                    $imgUrl = $gettingData->image;
                }

                $update = Skill::where("id",$id)->update([
                    "category" => $request->category,
                    "name" => $request->name,
                    "percentage" => $request->percentage,
                    "image" => $imgUrl,
                    "status" => $request->status,
                ]);
                if($update)
                {
                    return back()->with("success","Skill Updated Successfully!");
                }
            }
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
            $gettingData = Skill::where("id",$id)->first();
            //delete exists profile image file
            if(!empty($gettingData))
            {
                $image_path = public_path()."/".$gettingData->image;
                if(file_exists($image_path))
                {
                    @unlink($image_path);
                }
            }

            if(Skill::where("id",$id)->delete())
            {
                return back()->with("success","Skill Deleted Successfully!");
            }
        }
        catch(\Exception $e)
        {
            return $e->getMessage();
        }
    }
}
