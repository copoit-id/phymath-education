<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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

class LandingPageController extends Controller
{
    public function index()
    {
        // Get counts for each section
        $stats = [
            'hero' => LandingpageHero::count(),
            'whyus' => LandingpageWhyus::count(),
            'subjects' => LandingpageSubject::count(),
            'methods' => LandingpageMethod::count(),
            'achievements' => LandingpageAchievement::count(),
            'testimonies' => LandingpageTestimony::count(),
            'faqs' => LandingpageFaq::count(),
            'contacts' => LandingpageContact::count(),
            'ratings' => LandingpageRating::count(),
        ];

        return view('admin.landing.index', compact('stats'));
    }
}
