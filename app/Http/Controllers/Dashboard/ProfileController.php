<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('dashboard.profile.edit');

    }// end of getChangeData

    public function update(ProfileRequest $request)
    {
        $requestData = $request->validated();

        if ($request->image) {

            if (auth()->user()->hasImage()) {
                Storage::disk('local')->delete('public/uploads/' . auth()->user()->image);
            }

            $request->image->store('public/uploads');
            $requestData['image'] = $request->image->hashName();

        }//end of if 

        auth()->user()->update($requestData);

        session()->flash('success', __('dashboard.updated_successfully'));
        return redirect()->back();

    }// end of postChangeData

}//end of controller
