<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('frontend.pages.home');
    }
    public function purchase()
    {
        return view('frontend.pages.purchase');
    }
    public function order()
    {
        return view('frontend.pages.order');
    }
    public function profile()
    {
        return view('frontend.pages.profile');
    }
}
