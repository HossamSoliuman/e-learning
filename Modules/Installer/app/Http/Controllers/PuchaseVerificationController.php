<?php

namespace Modules\Installer\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Modules\Installer\app\Enums\InstallerInfo;

class PuchaseVerificationController extends Controller
{
    public function __construct()
    {
        set_time_limit(8000000);
    }

    public function index()
    {
        InstallerInfo::writeAssetUrl();
        return view('installer::index');
    }
    public function validatePurchase(Request $request)
    {
        session()->flush();
        $request->validate([
            'purchase_code' => 'required|string',
        ]);

        try {
            // Bypass verification and simulate a successful response
            $response = [
                'success' => true,
                'message' => 'Verification bypassed successfully',
                'verification_hashed' => 'dummy-hashed-value',
                'last_updated_at' => now()->toDateTimeString(),
            ];

            session()->put('step-1-complete', true);

            // Simulate rewriting the license file
            if (InstallerInfo::rewriteHashedFile($response, $request->purchase_code)) {
                return response()->json(['success' => true, 'message' => $response['message']], 200);
            }

            return response()->json(['success' => false, 'message' => 'License File Rewrite Failed'], 200);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['success' => false, 'message' => 'Server Error'], 200);
        }
    }
}
