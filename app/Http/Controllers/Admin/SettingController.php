<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\SystemSetting;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    /**
     * Show all system settings
     * 
     * @return View
     */
    public function index()
    {
        $settings = [];
        foreach (SystemSetting::get() as $setting) {
            $settings[$setting->name] = $setting->value;
        }

        return View('admin.system_settings', ['section' => 'settings', 'settings' => $settings]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fee  $fee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'admission_open_date' => 'required|date_format:Y-m-d',
            'admission_close_date' => 'required|date_format:Y-m-d',
            'current_session' => 'required|regex:/\d{4}\/\d{4}/',
            'late_payment_fee' => 'required|numeric',
            'admission_payment_fee' => 'required|numeric',
            'acceptance_payment_fee' => 'required|numeric',
        ]);

        foreach ($request->post() as $name => $value) {
            SystemSetting::where('name', $name)->update(['value' => $value]);
        }

        return redirect()->route('settings.index')->with('success', 'Settings updated');
    }
}
