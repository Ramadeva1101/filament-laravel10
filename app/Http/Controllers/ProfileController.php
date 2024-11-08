<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the pengguna's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'pengguna' => $request->pengguna(),
        ]);
    }

    /**
     * Update the pengguna's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->pengguna()->fill($request->validated());

        if ($request->pengguna()->isDirty('email')) {
            $request->pengguna()->email_verified_at = null;
        }

        $request->pengguna()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the pengguna's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('penggunaDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $pengguna = $request->pengguna();

        Auth::logout();

        $pengguna->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
