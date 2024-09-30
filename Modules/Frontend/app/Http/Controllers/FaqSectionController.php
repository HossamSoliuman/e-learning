<?php

namespace Modules\Frontend\app\Http\Controllers;

use App\Enums\RedirectType;
use App\Http\Controllers\Controller;
use App\Traits\RedirectHelperTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Frontend\app\Models\FaqSection;
use Modules\Frontend\app\Models\FaqSectionTranslation;
use Modules\Language\app\Enums\TranslationModels;
use Modules\Language\app\Models\Language;
use Modules\Language\app\Traits\GenerateTranslationTrait;

class FaqSectionController extends Controller
{
    use GenerateTranslationTrait, RedirectHelperTrait;

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        checkAdminHasPermissionAndThrowException('section.management');

        $faqSection = FaqSection::first();
        $code = request('code') ?? getSessionLanguage();
        if (! Language::where('code', $code)->exists()) {
            abort(404);
        }
        $languages = allLanguages();

        return view('frontend::faq-section.index', compact('faqSection', 'languages', 'code'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        checkAdminHasPermissionAndThrowException('section.management');

        $faqSection = FaqSection::updateOrCreate(
            ['id' => 1]
        );

        if ($request->hasFile('image')) {
            $file_name = file_upload($request->image, 'uploads/custom-images/', $faqSection->image);
            $faqSection->image = $file_name;
            $faqSection->save();
        }

        $translation = FaqSectionTranslation::where('faq_section_id', $faqSection->id)->exists();

        if (!$translation) {
            $this->generateTranslations(
                TranslationModels::FaqSection,
                $faqSection,
                'faq_section_id',
                $request,
            );
        }

        $this->updateTranslations(
            $faqSection,
            $request,
            $request->except(['_token', 'image']),
        );

        return $this->redirectWithMessage(
            RedirectType::UPDATE->value,
            'admin.faq-section.edit',
            [
                'faq_section' => $faqSection->id,
                'code' => allLanguages()->first()->code,
            ]
        );

    }
}
