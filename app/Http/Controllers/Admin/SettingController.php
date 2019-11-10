<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\View\View;
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
        $settings = []; // Stub
        return View('admin.system_settings', ['section' => 'settings', 'settings' => $settings]);
    }
}
