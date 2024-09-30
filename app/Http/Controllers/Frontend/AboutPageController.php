<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Modules\Brand\app\Models\Brand;
use Modules\Faq\app\Models\Faq;
use Modules\Frontend\app\Models\AboutSection;
use Modules\Frontend\app\Models\CounterSection;
use Modules\Frontend\app\Models\FaqSection;
use Modules\Frontend\app\Models\HeroSection;
use Modules\Frontend\app\Models\NewsletterSection;
use Modules\Frontend\app\Models\OurFeaturesSection;
use Modules\Testimonial\app\Models\Testimonial;

class AboutPageController extends Controller
{
    function index() {
        $hero = HeroSection::first();
        $aboutSection = AboutSection::first();
        $counter = CounterSection::first();
        $ourFeatures = OurFeaturesSection::first();
        $newsletterSection = NewsletterSection::first();
        $brands = Brand::where('status', 1)->get();
        $reviews = Testimonial::all();
        $faqs = Faq::with('translation')->where('status', 1)->get();
        $faqSection = FaqSection::first();
        return view('frontend.pages.about-us', compact('aboutSection', 'counter', 'ourFeatures', 'newsletterSection', 'hero', 'brands', 'reviews', 'faqSection', 'faqs')); 
    }
}
