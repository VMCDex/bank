<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $email = Setting::get('application_email', 'manager@bank.com');
        return view('admin.settings.index', compact('email'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'application_email' => 'required|email|max:255'
        ]);

        Setting::set('application_email', $request->application_email);

        return redirect()->back()->with('success', 'Email успешно обновлён!');
    }
}
