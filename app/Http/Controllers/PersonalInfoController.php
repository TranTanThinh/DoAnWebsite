<?php

namespace App\Http\Controllers;

use App\Models\PersonalInfo;
use Illuminate\Http\Request;

class PersonalInfoController extends Controller
{
    public function index()
    {
        $personalInfos = PersonalInfo::all();
        return view('Template.pages.personal_info', compact('personalInfos'));
    }
}

