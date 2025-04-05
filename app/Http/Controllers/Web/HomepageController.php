<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use App\Models\Slider;
use App\Models\Portfolio;
use App\Models\Education;
use App\Models\Skill;
use App\Models\Experience;
use App\Models\Contact;
use App\Models\ContactDetails;
use App\Models\Pricing;
use App\Models\MasterControl;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {
        try
        {
            $data['title'] ='Homepage';
            $data['slider'] = Slider::first();
            $data['master'] = MasterControl::first();
            $data['feature'] = Feature::get();
            $data['mern'] = Portfolio::where('status',1)->where('subCat',"mern")->latest()->get();
            $data['reactNative'] = Portfolio::where('status',1)->where('subCat',"react-native")->latest()->get();
            $data['laravel'] = Portfolio::where('status',1)->where('subCat',"laravel")->latest()->get();
            $data['education'] = Education::latest()->get();
            $data['other'] = Skill::where('category','other')->get();
            $data['development'] = Skill::where('category','development')->latest()->get();
            $data['experience'] = Experience::latest()->get();
            $data['contactDetails'] = ContactDetails::first();
            $data['pricing'] = Pricing::get();
            return view('web/home/index',$data);
        }
        catch(\Exception $e)
        {
            $msg = "SQLSTATE[HY000] [2002] No connection could be made because the target machine actively refused it (SQL: select * from `sliders` limit 1)";
            $error = $e->getMessage();
            if($error == $msg)
            {
                return view('home');
            }
            else{
                return $error;
            }
        }
    }


    public function portfolioView()
    {
        $data['title'] ='Portfolio View';
        return view('web/portfolio/index',$data);
    }
}
