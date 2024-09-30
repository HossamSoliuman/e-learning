<?php

namespace Modules\InstructorRequest\app\Http\Controllers;

use App\Enums\RedirectType;
use App\Http\Controllers\Controller;
use App\Traits\RedirectHelperTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\InstructorRequest\app\Models\InstructorRequestSetting;

class InstructorRequestSettingController extends Controller
{
    use RedirectHelperTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        checkAdminHasPermissionAndThrowException('instructor.request.setting');

        $instructorRequestSetting = InstructorRequestSetting::first();
        return view('instructorrequest::instructor-request-setting.index', compact('instructorRequestSetting'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        checkAdminHasPermissionAndThrowException('instructor.request.setting');

        InstructorRequestSetting::updateOrCreate(['id' => $id],
            [
                'need_certificate' => $request->need_certificate,
                'need_identity_scan' => $request->need_identity_scan,
                'instructions' => $request->instructions,
                'bank_information' => $request->bank_information
            ]
        );

        return $this->redirectWithMessage(RedirectType::UPDATE->value, 'admin.instructor-request-setting.index');
    }
}
