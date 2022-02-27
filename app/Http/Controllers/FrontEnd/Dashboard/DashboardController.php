<?php

namespace App\Http\Controllers\FrontEnd\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function company()
    {
        return view('front-end.dashboard.company');
    }
    public function staff()
    {
        return view('front-end.dashboard.staff');
    }
    public function staffBasic()
    {
        return view('front-end.dashboard.staff-basic');
    }
    public function staffQualification()
    {
        return view('front-end.dashboard.staff-qualification');
    }
}
