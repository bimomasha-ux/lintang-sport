<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Halaman Profil
     */
   public function index(): View
{
    return view('profile.index', [
        'user' => auth()->user(),
    ]);
}

    /**
     * Halaman Edit Profil
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update Profil
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();

        // Update nama, email, dan telepon
        $user->fill($request->validated());

        // Jika email berubah, verifikasi email direset
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        // =====================================================
        // GANTI PASSWORD JIKA DIISI
        // =====================================================

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        // Simpan perubahan
        $user->save();

        // Kembali ke halaman profil
        return Redirect::route('profil.index')
            ->with('success', 'Profil berhasil diperbarui.');
    }

    /**
     * Hapus Akun
     */
    public function destroy(Request $request): RedirectResponse
    {
        // Validasi password sebelum menghapus akun
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        // Logout
        Auth::logout();

        // Hapus akun
        $user->delete();

        // Hapus session
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Kembali ke halaman utama
        return Redirect::to('/');
    }
}