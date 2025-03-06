<?php

namespace App\Http\Controllers\admin;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Experience;
class ExperienceController extends Controller
{
    public function index()
    {
        try
        {
            $data['title'] = "Create Experience";
            return view("admin.resume.experience.index",$data);
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
                'designation' => 'required|string|max:255',
                'company_name' => 'required|string',
                'location' => 'required|string',
                'duration' => 'required|string',
                'description' => 'required|string',
                'status' => 'required|integer',
            ]);
            if ($validator->fails())
            { 
                return back()->withErrors($validator)->withInput();
            }
            else
            {
                if(Experience::create($request->all()))
                {
                    return back()->with("success","Experience Created Successfully!");
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
            $data['title'] = "View Experience";
            $data['count'] = Experience::count();
            $data['list'] = Experience::latest()->paginate(5);
            return view("admin.resume.experience.view",$data);
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
            $data['title'] = "View In Details Experience";
            $data['list'] = Experience::where("id",$id)->first();
            return view("admin.resume.experience.viewDetails",$data);
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
            $data['title'] = "Edit Experience";
            $data['list'] = Experience::where("id",$id)->first();
            return view("admin.resume.experience.edit",$data);
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
                'designation' => 'required|string|max:255',
                'company_name' => 'required|string',
                'location' => 'required|string',
                'duration' => 'required|string',
                'description' => 'required|string',
                'status' => 'required|integer',
            ]);
            if ($validator->fails())
            { 
                return back()->withErrors($validator)->withInput();
            }
            else
            {
                $update = Experience::where("id",$id)->update([
                    "designation" => $request->designation,
                    "company_name" => $request->company_name,
                    "location" => $request->location,
                    "duration" => $request->duration,
                    "description" => $request->description,
                    "status" => $request->status,
                ]);
                if($update)
                {
                    return back()->with("success","Experience Updated Successfully!");
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
            if(Experience::where("id",$id)->delete())
            {
                return back()->with("success","Experience Deleted Successfully!");
            }
        }
        catch(\Exception $e)
        {
            return $e->getMessage();
        }
    }
}
