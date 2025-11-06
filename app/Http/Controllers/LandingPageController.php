<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LandingpageHero;
use App\Models\LandingpageWhyus;
use App\Models\LandingpageSubject;
use App\Models\LandingpageTestimony;
use App\Models\LandingpageFaq;
use App\Models\LandingpageContact;
use App\Models\LandingpageMethod;
use App\Models\LandingpageAchievement;
use App\Models\LandingpageRating;
use App\Models\Package;

class LandingPageController extends Controller
{
    public function index()
    {
        $hero = LandingpageHero::where('is_active', true)->first();
        $whyus = LandingpageWhyus::where('is_active', true)->orderBy('order')->get();
        $subjects = LandingpageSubject::where('is_active', true)->orderBy('order')->get();
        $methods = LandingpageMethod::where('is_active', true)->orderBy('order')->get();
        $achievements = LandingpageAchievement::where('is_active', true)->orderBy('order')->get();
        $testimonies = LandingpageTestimony::where('is_active', true)->orderBy('order')->get();
        $faqs = LandingpageFaq::where('is_active', true)->orderBy('order')->get();
        $contacts = LandingpageContact::where('is_active', true)->get();
        $rating = LandingpageRating::where('is_active', true)->first();
        $packages = Package::where('status', 'active')->orderBy('created_at', 'desc')->get();

        return view('index', compact('hero', 'whyus', 'subjects', 'methods', 'achievements', 'testimonies', 'faqs', 'contacts', 'rating', 'packages'));
    }
}
