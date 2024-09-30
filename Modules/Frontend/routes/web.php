<?php

use Illuminate\Support\Facades\Route;
use Modules\Frontend\app\Http\Controllers\AboutSectionController;
use Modules\Frontend\app\Http\Controllers\BannerSectionController;
use Modules\Frontend\app\Http\Controllers\ContactSectionController;
use Modules\Frontend\app\Http\Controllers\CounterSectionController;
use Modules\Frontend\app\Http\Controllers\FaqSectionController;
use Modules\Frontend\app\Http\Controllers\FeaturedCourseSectionController;
use Modules\Frontend\app\Http\Controllers\FeaturedInstructorController;
use Modules\Frontend\app\Http\Controllers\FrontendController;
use Modules\Frontend\app\Http\Controllers\HeroSectionController;
use Modules\Frontend\app\Http\Controllers\NewsLetterSectionController;
use Modules\Frontend\app\Http\Controllers\OurFeaturesSectionController;
use Modules\Frontend\app\Http\Requests\OurFeaturesSectionUpdateRequest;
use Modules\Frontend\app\Models\CounterSection;
use Modules\Frontend\app\Models\FeaturedCourseSection;
use Modules\Frontend\app\Models\OurFeturesSection;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => 'auth:admin', 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::resource('hero-section', HeroSectionController::class);
    Route::resource('about-section', AboutSectionController::class);
    Route::get('courses-by-category/{category_id}', [FeaturedCourseSectionController::class, 'coursesByCategory'])->name('courses-by-category');
    Route::resource('featured-course-section', FeaturedCourseSectionController::class);
    Route::resource('newsletter-section', NewsLetterSectionController::class);
    Route::resource('featured-instructor-section', FeaturedInstructorController::class);
    Route::resource('counter-section', CounterSectionController::class);
    Route::resource('faq-section', FaqSectionController::class);
    Route::resource('our-features-section', OurFeaturesSectionController::class);
    Route::resource('banner-section', BannerSectionController::class);
    Route::resource('contact-section', ContactSectionController::class);
});
