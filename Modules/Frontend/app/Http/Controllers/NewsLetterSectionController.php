<?php

namespace Modules\Frontend\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Frontend\app\Models\NewsletterSection;
use Modules\NewsLetter\app\Models\NewsLetter;

class NewsLetterSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        checkAdminHasPermissionAndThrowException('section.management');
        $newsletter = NewsletterSection::first();
        return view('frontend::newsletter-section.index', compact('newsletter'));
    }

   
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        checkAdminHasPermissionAndThrowException('section.management');

        if($request->hasFile('image')){
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            
            $fileName = file_upload($request->image);
            NewsletterSection::updateOrCreate(['id' => $id], ['image' => $fileName]);

        }

        return redirect()->back()->with(['messege' => __('Updated successfully'), 'alert-type' => 'success']);
    }
}
