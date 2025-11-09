<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\SettingRequest;
use App\Services\Dashboard\SettingService;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    protected $settingService;
    public function __construct(SettingService $settingService)
    {
        $this->settingService = $settingService;
    }

    // index
    public function index()
    {
        $title = __('settings.settings');
        return view('dashboard.settings.index', compact('title'));
    }

    // update
    public function update(SettingRequest $request ,$id)
    {
        $data = $request->except(['_token', '_method']);
        $settings = $this->settingService->updateSettings($data, $id);
        if (!$settings) {
            return response()->json(['status' => false]);
        }
        return response()->json(['status' => true]);
    }
}
