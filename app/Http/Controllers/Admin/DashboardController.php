<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Portfolio;
use App\Models\Skill;
use App\Models\Feature;
use App\Models\Experience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $data['title'] = 'Dashboard';
        if(Auth::user()->role == 1)
        {
            $data['project'] = Portfolio::count();
            $data['skill'] = Skill::count();
            $data['feature'] = Feature::count();
            $data['experience'] = Experience::count();
            $data['contactUs'] = Contact::count();
        }
        return view('admin.dashboard.index',$data);
    }
}
