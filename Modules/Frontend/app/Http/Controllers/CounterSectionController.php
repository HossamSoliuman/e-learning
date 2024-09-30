<?php

namespace Modules\Frontend\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Frontend\app\Models\CounterSection;

class CounterSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        checkAdminHasPermissionAndThrowException('section.management');
        $counter = CounterSection::first();
        return view('frontend::counter-section.index', compact('counter'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('frontend::create');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        checkAdminHasPermissionAndThrowException('section.management');
        $validated = $request->validate([
            'total_student_count' => ['nullable', 'numeric', 'max:1000000000', 'min:0'],
            'total_instructor_count' => ['nullable', 'numeric', 'max:1000000000', 'min:0'],
            'total_courses_count' => ['nullable', 'numeric', 'max:1000000000', 'min:0'],
            'total_awards_count' => ['nullable', 'numeric', 'max:1000000000', 'min:0'],
            'title' => ['nullable', 'string',  'max:255'],
        ],[
            'total_student_count.max' => __('Total student count must be less than or equal to 1000000000'),
            'total_student_count.min' => __('Total student count must be greater than or equal to 0'),
            'total_instructor_count.max' => __('Total instructor count must be less than or equal to 1000000000'),
            'total_instructor_count.min' => __('Total instructor count must be greater than or equal to 0'),
            'total_courses_count.max' => __('Total courses count must be less than or equal to 1000000000'),
            'total_courses_count.min' => __('Total courses count must be greater than or equal to 0'),
            'total_awards_count.max' => __('Total awards count must be less than or equal to 1000000000'),
            'total_awards_count.min' => __('Total awards count must be greater than or equal to 0'),
            'title.max' => __('Title must be less than or equal to 255'),
        ]);

        CounterSection::updateOrCreate(['id' => 1], $validated);

        return redirect()->back()->with(['messege' => __('Updated successfully'), 'alert-type' => 'success']);
    }

}
