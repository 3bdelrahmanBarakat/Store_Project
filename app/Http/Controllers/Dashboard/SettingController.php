<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\SettingUpdateRequest;
use App\Models\Setting;
use App\Utils\ImageUpload;


class SettingController extends Controller
{
    public function index()
    {
        return view('dashboard.settings.index');
    }

    public function update(SettingUpdateRequest $request, Setting $setting)
    {
        $setting->update($request->validated());

        if($request->has('logo'))
        {
            $logo = ImageUpload::uploadImage($request->logo, 200, 200,"logo/");
            $setting->update(['logo' => $logo]);
        }

        if($request->has('favicon'))
        {
            $favicon = ImageUpload::uploadImage($request->favicon, 100, 200,'favicon/');
            $setting->update(['favicon' => $favicon]);
        }



        return back()->with('sucess', "تم تحديث الاعدادات بنجاح");
    }
}
