<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    
    public function index()
    {
        return view('dashboard.settings.general');

    }//end of index

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'sometimes|nullable|email',
        ]);

        $requestData = $request->except(['_token', '_method']);

        if ($request->logo_one) {
            Storage::disk('local')->delete('public/uploads/' . setting('logo_one'));
            $request->logo_one->store('public/uploads');
            $requestData['logo_one'] = $request->logo_one->hashName();
        }

        if ($request->logo_tow) {
            Storage::disk('local')->delete('public/uploads/' . setting('logo_tow'));
            $request->logo_tow->store('public/uploads');
            $requestData['logo_tow'] = $request->logo_tow->hashName();
        }

        setting($requestData)->save();

        session()->flash('success', __('site.added_successfully'));
        return redirect()->back();

    }// end of store

}//end of controller