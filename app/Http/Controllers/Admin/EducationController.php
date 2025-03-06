<?php

namespace App\Http\Controllers\admin;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Education;
class EducationController extends Controller
{
    public function index()
    {
        try
        {
            $data['title'] = "Create Education";
            return view("admin.resume.education.index",$data);
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
                'course_name' => 'required|string|max:255',
                'organization_name' => 'required|string',
                'duration' => 'required|string',
                'grade' => 'required|string',
                'percentage' => 'required|integer',
                'description' => 'required|string',
                'status' => 'required|integer',
            ]);
            if ($validator->fails())
            { 
                return back()->withErrors($validator)->withInput();
            }
            else
            {
                if(Education::create($request->all()))
                {
                    return back()->with("success","Education Created Successfully!");
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
            $data['title'] = "View Education";
            $data['count'] = Education::count();
            $data['list'] = Education::latest()->paginate(5);
            return view("admin.resume.education.view",$data);
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
            $data['title'] = "View In Details Education";
            $data['list'] = Education::where("id",$id)->first();
            return view("admin.resume.education.viewDetails",$data);
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
            $data['title'] = "Edit Education";
            $data['list'] = Education::where("id",$id)->first();
            return view("admin.resume.education.edit",$data);
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
                'course_name' => 'required|string|max:255',
                'organization_name' => 'required|string',
                'duration' => 'required|string',
                'grade' => 'required|string',
                'percentage' => 'required|integer',
                'description' => 'required|string',
                'status' => 'required|integer',
            ]);
            if ($validator->fails())
            { 
                return back()->withErrors($validator)->withInput();
            }
            else
            {
                $update = Education::where("id",$id)->update([
                    "course_name" => $request->course_name,
                    "organization_name" => $request->organization_name,
                    "duration" => $request->duration,
                    "grade" => $request->grade,
                    "percentage" => $request->percentage,
                    "description" => $request->description,
                    "status" => $request->status,
                ]);
                if($update)
                {
                    return back()->with("success","Education Updated Successfully!");
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
            if(Education::where("id",$id)->delete())
            {
                return back()->with("success","Education Deleted Successfully!");
            }
        }
        catch(\Exception $e)
        {
            return $e->getMessage();
        }
    }
}
