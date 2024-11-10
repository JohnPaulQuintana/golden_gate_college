<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        // dd($request);
        $user = $request->user();

        if (!$user) {
            return back()->withErrors(['error' => 'User not found.']);
        }

        $user->fill($request->validated());

        // Check if a file is uploaded
        if ($request->hasFile('profile')) {
            // Define the directory inside 'public'
            $directory = 'profiles';

            // Generate a unique file name with the original extension
            $file = $request->file('profile');
            $uniqueFileName = Str::uuid() . '.' . $file->getClientOriginalExtension();

            // Store the file in the 'public' disk (storage/app/public)
            $filePath = $file->storeAs($directory, $uniqueFileName, 'public');

            // Update the user's profile with the relative file path
            $user->profile = 'storage/' . $filePath; // Save the relative file path
        }

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
