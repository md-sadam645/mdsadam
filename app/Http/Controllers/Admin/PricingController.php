<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Pricing;
class PricingController extends Controller
{
    public function index()
    {
        try
        {
            $data['title'] = "Create Pricing";
            return view("admin.pricing.index",$data);
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
                'plan' => 'required|string|max:255',
                'title' => 'required|string',
                'subtitle' => 'required|string',
                'price' => 'required|integer',
                'serviceOne' => 'required|array',
                'serviceTwo' => 'required|array',
                'description' => 'required|string',
                'status' => 'required|integer',
            ]);
            if ($validator->fails())
            { 
                return back()->withErrors($validator)->withInput();
            }
            else
            {
                $price = new Pricing;
                $price->plan = $request->plan;
                $price->title = $request->title;
                $price->subtitle = $request->subtitle;
                $price->price = $request->price;
                $price->serviceOne = json_encode($request->serviceOne);
                $price->serviceTwo = json_encode($request->serviceTwo);
                $price->description = $request->description;
                $price->recommended = $request->recommended;
                $price->status = $request->status;
                if($price->save())
                {
                    return back()->with("success","Pricing Created Successfully!");
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
            $data['title'] = "View Pricing";
            $data['count'] = Pricing::count();
            $data['list'] = Pricing::latest()->paginate(5);
            return view("admin.pricing.view",$data);
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
            $data['title'] = "View In Details Pricing";
            $data['list'] = Pricing::where("id",$id)->first();
            return view("admin.pricing.viewDetails",$data);
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
            $data['title'] = "Edit Pricing";
            $data['list'] = Pricing::where("id",$id)->first();
            return view("admin.pricing.edit",$data);
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
                'plan' => 'required|string|max:255',
                'title' => 'required|string',
                'subtitle' => 'required|string',
                'price' => 'required|integer',
                'serviceOne' => 'required|array',
                'serviceTwo' => 'required|array',
                'description' => 'required|string',
                'status' => 'required|integer',
            ]);
            if ($validator->fails())
            { 
                return back()->withErrors($validator)->withInput();
            }
            else
            {
                $update = Pricing::where("id",$id)->update([
                    "plan" => $request->plan,
                    "title" => $request->title,
                    "subtitle" => $request->subtitle,
                    "price" => $request->price,
                    "serviceOne" => json_encode($request->serviceOne),
                    "serviceTwo" => json_encode($request->serviceTwo),
                    "description" => $request->description,
                    "recommended" => $request->recommended,
                    "status" => $request->status,
                ]);
                if($update)
                {
                    return back()->with("success","Pricing Updated Successfully!");
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
            if(Pricing::where("id",$id)->delete())
            {
                return back()->with("success","Pricing Deleted Successfully!");
            }
        }
        catch(\Exception $e)
        {
            return $e->getMessage();
        }
    }
}
