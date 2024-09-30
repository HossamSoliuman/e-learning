<?php

namespace Modules\Frontend\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Frontend\app\Models\BannerSection;

class BannerSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        checkAdminHasPermissionAndThrowException('section.management');

        $bannerSection = BannerSection::first();
        return view('frontend::banner-section.index', compact('bannerSection'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        checkAdminHasPermissionAndThrowException('section.management');

        $request->validate([
            'instructor_image' => ['nullable', 'image', 'max:2048'],
            'student_image' => ['nullable', 'image', 'max:2048']
        ], [
            'instructor_image.nullable' => __('The image is required.'),
            'instructor_image.image' => __('The image must be an image file.'),
            'instructor_image.max' => __('The image may not be greater than 2048 kilobytes.'),
            'student_image.nullable' => __('The image is required.'),
            'student_image.image' => __('The image must be an image file.'),
            'student_image.max' => __('The image may not be greater than 2048 kilobytes.'),
        ]);

        $bannerSection = BannerSection::updateOrCreate(['id' => 1]);
        if($request->hasFile('instructor_image')) {
            $fileName = file_upload($request->instructor_image, 'uploads/custom-images/', $bannerSection->instructor_image);
            $bannerSection->instructor_image = $fileName;
            $bannerSection->save();
        }

        if($request->hasFile('student_image')) {
            $fileName = file_upload($request->student_image, 'uploads/custom-images/', $bannerSection->student_image);
            $bannerSection->student_image = $fileName;
            $bannerSection->save();
        }

        return redirect()->back()->with(['messege' => __('Updated successfully'), 'alert-type' => 'success']);
    }

}
