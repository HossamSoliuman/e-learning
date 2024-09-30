<?php

namespace Modules\Frontend\app\Http\Controllers;

use App\Enums\RedirectType;
use App\Http\Controllers\Controller;
use App\Traits\RedirectHelperTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Frontend\app\Http\Requests\OurFeaturesSectionUpdateRequest;
use Modules\Frontend\app\Models\OurFeaturesSection;
use Modules\Frontend\app\Models\OurFeaturesSectionTranslation;
use Modules\Language\app\Enums\TranslationModels;
use Modules\Language\app\Models\Language;
use Modules\Language\app\Traits\GenerateTranslationTrait;

class OurFeaturesSectionController extends Controller
{
    use GenerateTranslationTrait, RedirectHelperTrait;

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        checkAdminHasPermissionAndThrowException('section.management');
        $code = request('code') ?? getSessionLanguage();
        if (! Language::where('code', $code)->exists()) {
            abort(404);
        }
        $languages = allLanguages();
        $ourFeature = OurFeaturesSection::first();
        return view('frontend::our-features-section.index', compact('ourFeature', 'languages', 'code'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OurFeaturesSectionUpdateRequest $request, $id) 
    {
        checkAdminHasPermissionAndThrowException('section.management');
        $ourFeature = OurFeaturesSection::updateOrCreate(
            ['id' => 1],
        );

        if ($request->hasFile('image_one')) {
            $file_name = file_upload($request->image_one, 'uploads/custom-images/', $ourFeature->image_one);
            $ourFeature->image_one = $file_name;
            $ourFeature->save();
        }

        if ($request->hasFile('image_two')) {
            $file_name = file_upload($request->image_two, 'uploads/custom-images/', $ourFeature->image_two);
            $ourFeature->image_two = $file_name;
            $ourFeature->save();
        }

        if ($request->hasFile('image_three')) {
            $file_name = file_upload($request->image_three, 'uploads/custom-images/', $ourFeature->image_three);
            $ourFeature->image_three = $file_name;
            $ourFeature->save();
        }

        if ($request->hasFile('image_four')) {
            $file_name = file_upload($request->image_four, 'uploads/custom-images/', $ourFeature->image_four);
            $ourFeature->image_four = $file_name;
            $ourFeature->save();
        }
        
        $translation = OurFeaturesSectionTranslation::where('our_features_section_id', $ourFeature->id)->exists();

        if (!$translation) {
            $this->generateTranslations(
                TranslationModels::OurFeature,
                $ourFeature,
                'our_features_section_id',
                $request,
            );
        }

        $this->updateTranslations(
            $ourFeature,
            $request,
            $request->except(['_token', 'image_one', 'image_two', 'image_three', 'image_four']),
        );

        return $this->redirectWithMessage(
            RedirectType::UPDATE->value,
            'admin.our-features-section.edit',
            [
                'our_features_section' => $ourFeature->id,
                'code' => allLanguages()->first()->code,
            ]
        );

    }
}
