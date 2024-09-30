<?php

namespace Modules\Frontend\app\Http\Controllers;

use App\Enums\RedirectType;
use App\Http\Controllers\Controller;
use App\Traits\RedirectHelperTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;
use Modules\Frontend\app\Http\Requests\HeroSectionUpdateRequest;
use Modules\Frontend\app\Models\HeroSection;
use Modules\Frontend\app\Models\HeroSectionTranslation;
use Modules\Language\app\Enums\TranslationModels;
use Modules\Language\app\Models\Language;
use Modules\Language\app\Traits\GenerateTranslationTrait;

class HeroSectionController extends Controller
{
    use GenerateTranslationTrait, RedirectHelperTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        checkAdminHasPermissionAndThrowException('section.management');

        $code = request('code') ?? getSessionLanguage();
        if (!Language::where('code', $code)->exists()) {
            abort(404);
        }
        $languages = allLanguages();
        return view('frontend::hero-section.index', compact('languages', 'code'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('frontend::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        checkAdminHasPermissionAndThrowException('section.management');
        

        $heroSection = HeroSection::updateOrCreate(
            ['id' => 1],
            [
                'action_button_url' => $request->action_button_url,
                'video_button_url' => $request->video_button_url,
            ]
        );

        if ($request->hasFile('banner_image')) {
            $file_name = file_upload($request->banner_image, 'uploads/custom-images/', $heroSection->banner_image);
            $heroSection->banner_image = $file_name;
            $heroSection->save();
        }
        if ($request->hasFile('banner_background')) {
            $file_name = file_upload($request->banner_background, 'uploads/custom-images/', $heroSection->banner_background);
            $heroSection->banner_background = $file_name;
            $heroSection->save();
        }
        if ($request->hasFile('hero_background')) {
            $file_name = file_upload($request->hero_background, 'uploads/custom-images/', $heroSection->hero_background);
            $heroSection->hero_background = $file_name;
            $heroSection->save();
        }
        $translation = HeroSectionTranslation::where('hero_section_id', $heroSection->id)->exists();

        if (!$translation) {
            $this->generateTranslations(
                TranslationModels::HeroSection,
                $heroSection,
                'hero_section_id',
                $request,
            );
        }

        return $this->redirectWithMessage(
            RedirectType::UPDATE->value,
            'admin.hero-section.index',
            [
                'hero_section' => $heroSection->id,
                'code' => allLanguages()->first()->code,
            ]
        );
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('frontend::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        checkAdminHasPermissionAndThrowException('section.management');

        $code = request('code') ?? getSessionLanguage();
        if (!Language::where('code', $code)->exists()) {
            abort(404);
        }
        $heroSection = HeroSection::first();
        $languages = allLanguages();

        return view('frontend::hero-section.edit', compact('heroSection', 'languages', 'code'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(HeroSectionUpdateRequest $request, $id)
    {

        checkAdminHasPermissionAndThrowException('section.management');

        $heroSection = HeroSection::updateOrCreate(
            ['id' => 1],
            [
                'action_button_url' => $request->action_button_url,
                'video_button_url' => $request->video_button_url,
            ]
        );

        if (Cache::get('setting')?->site_theme == 'theme-one') {
            if ($request->hasFile('banner_image')) {
                $file_name = file_upload($request->banner_image, 'uploads/custom-images/', $heroSection->banner_image);
                $heroSection->banner_image = $file_name;
                $heroSection->save();
            }
            if ($request->hasFile('banner_background')) {
                $file_name = file_upload($request->banner_background, 'uploads/custom-images/', $heroSection->banner_background);
                $heroSection->banner_background = $file_name;
                $heroSection->save();
            }
            if ($request->hasFile('hero_background')) {
                $file_name = file_upload($request->hero_background, 'uploads/custom-images/', $heroSection->hero_background);
                $heroSection->hero_background = $file_name;
                $heroSection->save();
            }
        } elseif (Cache::get('setting')?->site_theme == 'theme-two') {
            if ($request->hasFile('banner_image')) {
                $file_name = file_upload($request->banner_image, 'uploads/custom-images/', $heroSection->h_two_banner_image);
                $heroSection->h_two_banner_image = $file_name;
                $heroSection->save();
            }
            if ($request->hasFile('banner_background')) {
                $file_name = file_upload($request->banner_background, 'uploads/custom-images/', $heroSection->h_two_banner_background);
                $heroSection->h_two_banner_background = $file_name;
                $heroSection->save();
            }
            if ($request->hasFile('hero_background')) {
                $file_name = file_upload($request->hero_background, 'uploads/custom-images/', $heroSection->h_two_hero_background);
                $heroSection->h_two_hero_background = $file_name;
                $heroSection->save();
            }
        }

        if ($request->hasFile('enroll_students_image')) {
            $file_name = file_upload($request->enroll_students_image, 'uploads/custom-images/', $heroSection->enroll_students_image);
            $heroSection->enroll_students_image = $file_name;
            $heroSection->save();
        }

        $translation = HeroSectionTranslation::where('hero_section_id', $heroSection->id)->exists();

        if (!$translation) {
            $this->generateTranslations(
                TranslationModels::HeroSection,
                $heroSection,
                'hero_section_id',
                $request,
            );
        }

        $this->updateTranslations(
            $heroSection,
            $request,
            $request->all(),
        );

        return $this->redirectWithMessage(
            RedirectType::UPDATE->value,
            'admin.hero-section.edit',
            [
                'hero_section' => $heroSection->id,
                'code' => allLanguages()->first()->code,
            ]
        );
    }
}
