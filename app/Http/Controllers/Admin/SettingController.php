<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\SystemSetting;
use App\Http\Controllers\Controller;
use App\Alert;

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
            'admission_exam_date_nursing' => 'required|date_format:Y-m-d',
            'admission_exam_date_midwifery' => 'required|date_format:Y-m-d',
            'registration_number' => 'required',
            'Support_Email' => 'required|email',
            'Domain_Email' => [
                                'required',
                                'email',
                                'regex:/^[\w\.\-]+@oysconme\.edu\.ng$/i'
                            ],
        ]);

//dd($request->maintenance);
//dd($request->all());

        switch ($request->maintenance) {

          case "on":
            $request['maintenance'] = 'YES';
            break;

          default:
              $request['maintenance'] = 'NO';
            break;
        }
       //dd($request->all());

        foreach ($request->post() as $name => $value) {
            SystemSetting::where('name', $name)->update(['value' => $value]);
        }
        $notification = Alert::alertMe('Settings updated!!!', 'success');
          return redirect()->back()->with($notification);
    }
}
