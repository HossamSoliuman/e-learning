<?php

namespace Modules\Frontend\app\Http\Controllers;

use App\Enums\RedirectType;
use App\Http\Controllers\Controller;
use App\Traits\RedirectHelperTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Frontend\app\Http\Requests\AboutSectionUpdateRequest;
use Modules\Frontend\app\Models\AboutSection;
use Modules\Frontend\app\Models\AboutSectionTranslation;
use Modules\Frontend\app\Models\HeroSectionTranslation;
use Modules\Language\app\Enums\TranslationModels;
use Modules\Language\app\Models\Language;
use Modules\Language\app\Traits\GenerateTranslationTrait;

class AboutSectionController extends Controller
{
    use GenerateTranslationTrait, RedirectHelperTrait;

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
        $languages = allLanguages();
        $aboutSection = AboutSection::first();
        return view('frontend::about-section.index', compact('languages', 'code', 'aboutSection'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AboutSectionUpdateRequest $request, $id)
    {

        checkAdminHasPermissionAndThrowException('section.management');

        $aboutSection = AboutSection::updateOrCreate(
            ['id' => 1],
            [
                'video_url' => $request->video_url,
                'button_url' => $request->button_url,
            ]
        );

        if ($request->hasFile('image')) {
            $file_name = file_upload($request->image, 'uploads/custom-images/', $aboutSection->image);
            $aboutSection->image = $file_name;
            $aboutSection->save();
        }

        $translation = AboutSectionTranslation::where('about_section_id', $aboutSection->id)->exists();

        if (!$translation) {
            $this->generateTranslations(
                TranslationModels::AboutSection,
                $aboutSection,
                'about_section_id',
                $request,
            );
        }

        $this->updateTranslations(
            $aboutSection,
            $request,
            $request->all(),
        );

        return $this->redirectWithMessage(
            RedirectType::UPDATE->value,
            'admin.about-section.edit',
            [
                'about_section' => $aboutSection->id,
                'code' => allLanguages()->first()->code,
            ]
        );
    }

}
