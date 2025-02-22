<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show()
    {
        return view('auth.profile');
    }

    public function update(ProfileUpdateRequest $request)
    {
        // Task: fill in the code here to update name and email
        // Also, update the password if it is set
        $formFields = $request->validated();

        if (isset($formFields['password'])) {
            $formFields['password'] = bcrypt($formFields['password']);
        }

        Auth::user()->update($formFields);


        return redirect()->route('profile.show')->with('success', 'Profile updated.');
    }
}
