<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdvertisingAndPromotionController extends Controller
{
    public function showadvertising1()
    {
      
        return view('Template.pages.advertising1');
    }

    public function showadvertising2()
    {
      
        return view('Template.pages.advertising2');
    }

    public function showpromotion1()
    {
      
        return view('Template.pages.promotion1');
    }
    public function showpromotion2()
    {
      
        return view('Template.pages.promotion2');
    }
}

