<?php

namespace App\Services\Dashboard;

use App\Repositories\Dashboard\SettingRepository;
use App\Utils\ImageManagerUtils;

class SettingService
{
    protected $settingRepository, $imageManagerUtils;
    //
    public function __construct(SettingRepository $settingRepository, ImageManagerUtils $imageManagerUtils)
    {
        $this->settingRepository = $settingRepository;
        $this->imageManagerUtils = $imageManagerUtils;
    }

    // get setting
    public function getSetting($id)
    {
        $setting = $this->settingRepository->getSetting($id);
        if (!$setting) {
            return false;
        }
        return $setting;
    }

    // update settings
    public function updateSettings($data, $id)
    {
        $setting = self::getSetting($id);

        if (array_key_exists('logo', $data) && $data['logo'] != null) {
            $this->imageManagerUtils->removeImageFromLocal($setting->logo, 'settings');
            //  $data['logo'] = $this->imageManagerUtils->uploadSingleImage('/', $data['logo'], 'settings');
            $data['logo'] = $this->imageManagerUtils->saveResizeImage($data['logo'], 'settings', 500, 500);
        }

        if (array_key_exists('favicon', $data) && $data['favicon'] != null) {
            $this->imageManagerUtils->removeImageFromLocal($setting->favicon, 'settings');
            $data['favicon'] = $this->imageManagerUtils->saveResizeImage($data['favicon'], 'settings', 500, 500);
        }

        $setting = $this->settingRepository->updateSettings($setting, $data);
        if (!$setting) {
            return false;
        }
        return $setting;
    }
}
