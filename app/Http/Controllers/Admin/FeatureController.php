<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Feature;
use Illuminate\Support\Facades\Validator;
class FeatureController extends Controller
{
    public function index()
    {
        try
        {
            $data['title'] = "Create Feature";
            // $data['list'] = Feature::first();
            return view("admin.feature.index",$data);
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
                'icon' => 'required|string|max:255',
                'title' => 'required|string|max:255',
                'description' => 'required',
            ]);
            if ($validator->fails())
            { 
                return back()->withErrors($validator)->withInput();
            }
            else
            { 
                if(Feature::create($request->all()))
                {
                    return back()->with("success","Feature Created Successfully!");
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
            $data['title'] = "View Feature";
            $data['count'] = Feature::count();
            $data['list'] = Feature::latest()->paginate(5);
            return view("admin.feature.view",$data);
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
            $data['title'] = "View In Details Feature";
            $data['list'] = Feature::where("id",$id)->first();
            return view("admin.feature.viewDetails",$data);
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
            $data['title'] = "Edit Feature";
            $data['list'] = Feature::where("id",$id)->first();
            return view("admin.feature.edit",$data);
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
                'icon' => 'required|string|max:255',
                'title' => 'required|string|max:255',
                'description' => 'required',
            ]);
            if ($validator->fails())
            { 
                return back()->withErrors($validator)->withInput();
            }
            else
            {
                $update = Feature::where("id",$id)->update([
                    "icon" => $request->icon,
                    "title" => $request->title,
                    "description" => $request->description,
                ]);
                if($update)
                {
                    return back()->with("success","Feature Updated Successfully!");
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
            if(Feature::where("id",$id)->delete())
            {
                return back()->with("success","Feature Deleted Successfully!");
            }
        }
        catch(\Exception $e)
        {
            return $e->getMessage();
        }
    }
}
