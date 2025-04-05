<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Portfolio;
use Illuminate\Support\Facades\Validator;

class PortfolioController extends Controller
{
    public function index()
    {
        try
        {
            $data['title'] = "Create Portfolio";
            return view("admin.portfolio.index",$data);
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
                'pname' => 'required|string|max:255',
                'category' => 'required|string|max:255',
                'plink' => 'required|string',
                'profile' => 'required|mimes:jpg,png,jpeg',
                'slider' => 'required|array',
                'slider.*' => 'file|mimes:jpg,png,jpeg',
                'subCat' => 'required|string|not_in:select category',
                'description' => 'required',
            ]);
            if ($validator->fails())
            { 
                return back()->withErrors($validator)->withInput();
            }
            else
            { 
                if($request->profile != "")
                {
                    $fname = time().'.'.$request->profile->extension();  
                    $fileName =date('d-m-Y-H-i-s').$fname;
                    $request->profile->move(public_path('portfolio'), $fileName);
                    $profile = "portfolio/".$fileName;
                }

                if($request->slider != "")
                {
                    for($i=0; $i<count($request->slider); $i++)
                    {
                        // echo $request->slider[$i];
                        $fname = time().$i.'.'.$request->slider[$i]->extension();  
                        $fileName = date('Y-m-d-H-i-s').$i.$fname;
                        $request->slider[$i]->move(public_path('portfolio'), $fileName);
                        $slider[] = "portfolio/".$fileName;
                    }
                }

                $data = new Portfolio;
                $data->pname = $request->pname;
                $data->category = $request->category;
                $data->plink = $request->plink;
                $data->subCat = $request->subCat;
                $data->profile = $profile;
                $data->slider = json_encode($slider);
                $data->description = $request->description;

                if($data->save())
                {
                    return back()->with("success","Portfolio Created Successfully!");
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
            $data['title'] = "View Portfolio";
            $data['count'] = Portfolio::count();
            $data['list'] = Portfolio::paginate(5);
            return view("admin.portfolio.view",$data);
        }
        catch(\Exception $e)
        {
            return $e->getMessage();
        }
    }

    public function portfolioData(Request $request)
    {
        try
        {
            return Portfolio::where("id",$request->id)->first();
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
            $data['title'] = "View In Details Portfolio";
            $data['list'] = Portfolio::where("id",$id)->first();
            return view("admin.portfolio.viewDetails",$data);
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
            $data['title'] = "Edit Portfolio";
            $data['list'] = Portfolio::where("id",$id)->first();
            return view("admin.portfolio.edit",$data);
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
                'pname' => 'required|string|max:255',
                'category' => 'required|string|max:255',
                'plink' => 'required|string',
                'description' => 'required',
                'subCat' => 'required|string|not_in:select category',
            ]);
            if ($validator->fails())
            { 
                return back()->withErrors($validator)->withInput();
            }
            else
            {
                if($request->profile != "")
                {
                    //delete exists profile image
                    $image_path = public_path()."/".$request->oldProfile;
                    if(file_exists($image_path))
                    {
                        @unlink($image_path);
                    }

                    $fname = time().'.'.$request->profile->extension();  
                    $fileName =date('d-m-Y-H-i-s').$fname;
                    $request->profile->move(public_path('portfolio'), $fileName);
                    $profile = "portfolio/".$fileName;
                }
                else
                {
                    $profile =  $request->oldProfile; 
                }

                if($request->slider != "")
                {
                    $sliderImg = json_decode($request->oldSlider);
                    for($i=0; $i<count($sliderImg); $i++)
                    {
                        //delete exists slider image
                        $image_path = public_path()."/".$sliderImg[$i];
                        if(file_exists($image_path))
                        {
                            @unlink($image_path);
                        }
                    }

                    for($i=0; $i<count($request->slider); $i++)
                    {
                        $fname = time().$i.'.'.$request->slider[$i]->extension();  
                        $fileName = date('Y-m-d-H-i-s').$i.$fname;
                        $request->slider[$i]->move(public_path('portfolio'), $fileName);
                        $allSlider[] = "portfolio/".$fileName;
                    }

                    $slider = json_encode($allSlider);
                }
                else
                {
                    $slider = $request->oldSlider; 
                }

                $update = Portfolio::where("id",$id)->update([
                    "pname" => $request->pname,
                    "category" => $request->category,
                    "plink" => $request->plink,
                    "subCat" => $request->subCat,
                    "profile" => $profile,
                    "slider" => $slider,
                    "description" => $request->description,
                ]);
                if($update)
                {
                    return back()->with("success","Portfolio Updated Successfully!");
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
            $data = Portfolio::where("id",$id)->first();
            $pImage_path = public_path()."/".$data->profile;
            if(file_exists($pImage_path))
            {
                @unlink($pImage_path);
            }


            $sliderImg = json_decode($data->slider);
            for($i=0; $i<count($sliderImg); $i++)
            {
                //delete exists slider image
                $sImage_path = public_path()."/".$sliderImg[$i];
                if(file_exists($sImage_path))
                {
                    @unlink($sImage_path);
                }
            }

            if(Portfolio::where("id",$id)->delete())
            {
                return back()->with("success","Portfolio Deleted Successfully!");
            }
        }
        catch(\Exception $e)
        {
            return $e->getMessage();
        }
    }


    public function status($id)
    {
        try
        {
            $data = Portfolio::where("id",$id)->first();
            if($data->status == 1)
            {
                $status = 0;
                $msg = "Inactive";
            }
            else
            {
                $status = 1;
                $msg = "Active";
            }

            $update = Portfolio::where("id",$id)->update(['status' => $status]);
            if($update)
            {
                return back()->with("success","Portfolio ".$msg. " Successfully!");
            }
        }
        catch(\Exception $e)
        {
            return $e->getMessage();
        }
    }
}
