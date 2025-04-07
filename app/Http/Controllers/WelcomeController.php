<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
{
    $welcomeText = \App\Models\WebsiteContent::where('key', 'welcome_text')->first()->value ?? 'Welcome to Our Clinic';
    $aboutUsText = \App\Models\WebsiteContent::where('key', 'about_us')->first()->value ?? 'About Us';
    $contactText = \App\Models\WebsiteContent::where('key', 'contact')->first()->value ?? 'Contact Us';

    return view('welcome', compact('welcomeText', 'aboutUsText', 'contactText'));
}
}