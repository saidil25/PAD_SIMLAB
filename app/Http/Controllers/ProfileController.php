<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $toptitle = 'Fitur';
        $title = 'Kelola Profil';
        $subtitle = 'Edit Profil';

        $data_edit = User::where('id', auth()->user()->id)->first();

        return view('profil.edit', compact(
            'toptitle',
            'title',
            'subtitle',
            'data_edit',
        ));
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);

        $data_up = User::findOrFail(auth()->user()->id);

        if ($request->password) {
            $request->validate([
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);
            $dataUp['password'] = $request->password;
        }

        $dataUp['name'] = $request->name;
        $dataUp['nomor_hp'] = $request->nomor_hp;
        $dataUp['alamat'] = $request->alamat;
        $dataUp['email'] = $request->email;

        $data_up->update($dataUp);

        return redirect()->route('kelola_admin.index')->with(['success' => 'Data Berhasil Disimpan']);
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
