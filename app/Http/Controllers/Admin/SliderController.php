<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Facades\Validator;
class SliderController extends Controller
{
    public function index()
    {
        try
        {
            $data['title'] = "Create Slider";
            $data['list'] = Slider::first();
            return view("admin.slider.index",$data);
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
                'name' => 'required|string|max:255',
                'tagline' => 'required|string|max:255',
                'designation' => 'required',
                'skill' => 'required',
                // 'image' => 'required',
                'description' => 'required',
            ]);
            if ($validator->fails())
            { 
                return back()->withErrors($validator)->withInput();
            }
            else
            {
                $gettingData = Slider::first();
                if($request->image != "")
                {
                    //delete exists profile image file
                    $image_path = public_path()."/".$gettingData->image;
                    if(file_exists($image_path))
                    {
                        @unlink($image_path);
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
                    $update = Slider::where("id",$gettingData->id)->update([
                        "tagline" => $request->tagline,
                        "name" => $request->name,
                        "designation" => json_encode($request->designation),
                        "skill" => json_encode($request->skill),
                        "description" => $request->description,
                        "image" => $image,
                    ]);

                    if($update)
                    {
                        return back()->with("success","Slider Updated Successfully!");
                    }
                }
                else
                {
                    $slider = new Slider;
                    $slider->tagline = $request->tagline;
                    $slider->name = $request->name;
                    $slider->designation = json_encode($request->designation);
                    $slider->skill = json_encode($request->skill);
                    $slider->description = $request->description;
                    $slider->image = $image;
                    if($slider->save())
                    {
                        return back()->with("success","Slider Created Successfully!");
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
            $data['title'] = "View Game";
            $data['count'] = Slider::count();
            $data['list'] = Slider::latest()->paginate(5);
            return view("admin.game.view",$data);
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
            $data['title'] = "Edit Game";
            $data['list'] = Slider::where("id",$id)->first();
            return view("admin.game.edit",$data);
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
                'name' => 'required|string|max:255',
                'start_time' => 'required',
                'close_time' => 'required',
                'result_time' => 'required',
            ]);
            if ($validator->fails())
            { 
                return back()->withErrors($validator)->withInput();
            }
            else
            {
                $update = Slider::where("id",$id)->update([
                    "name" => $request->name,
                    "start_time" => $request->start_time,
                    "close_time" => $request->close_time,
                    "result_time" => $request->result_time,
                    "desc_one" => $request->desc_one,
                    "desc_two" => $request->desc_two,
                    "desc_three" => $request->desc_three,
                ]);
                if($update)
                {
                    return back()->with("success","Game Updated Successfully!");
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
            if(Slider::where("id",$id)->delete())
            {
                return back()->with("success","Game Deleted Successfully!");
            }
        }
        catch(\Exception $e)
        {
            return $e->getMessage();
        }
    }
}
