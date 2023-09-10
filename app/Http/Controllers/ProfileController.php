<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.profile', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        // return Redirect::route('profile.edit')->with('status', 'profile-updated');

        return redirect()->back()->with('success', "Profile information updated successfully!");
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

    /**
     * Profile image update
     */

     public function image_update(Request $request)
     {
         $request->validate([
             'profile' => ['required', 'mimes:jpg,png,jpeg', 'max:2048'],
         ]);
     
         $Photo = time() . '_' . $request->profile->getClientOriginalName() . '.' . $request->profile->extension();
         $request->profile->move(public_path('uploads'), $Photo);

         // Get the currently authenticated user
         $user = $request->user();

         if($user->image){
            $path = public_path('uploads/'.$user->image);
            unlink($path);
           }
     
         // Update the profile attribute with the new image file name
         $user->image = $Photo;
         $user->save();
     
         return redirect()->back()->with('success', "Image uploaded successfully!");
     }
     
}
