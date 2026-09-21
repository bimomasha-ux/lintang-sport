<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class PatientController extends Controller
{
    // =========================
    // 📋 LIST PELANGGAN
    // =========================
    public function index(Request $request)
    {
        $search = $request->search;

        $patients = User::where('role', 'user')
            ->when($search, function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                      ->orWhere('email', 'like', "%{$search}%")
                      ->orWhere('telepon', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->get();

        return view('patients.index', compact('patients'));
    }

    // =========================
    // ✏️ FORM EDIT PELANGGAN
    // =========================
  public function edit($id)
{
    $patient = User::findOrFail($id);

    return view('patients.edit', compact('patient'));
}

    // =========================
    // 💾 UPDATE PELANGGAN
    // =========================
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'telepon' => 'required|max:20',
        ]);

        $patient = User::findOrFail($id);

        $patient->update([
            'name' => $request->name,
            'email' => $request->email,
            'telepon' => $request->telepon,
        ]);

        return redirect()
            ->route('patients.index')
            ->with('success', 'Data pelanggan berhasil diperbarui.');
    }

    // =========================
    // 🗑 HAPUS PELANGGAN
    // =========================
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        // Admin tidak boleh dihapus
        if ($user->role == 'admin') {
            return back()->with('error', 'Admin tidak dapat dihapus.');
        }

        $user->delete();

        return redirect()
            ->route('patients.index')
            ->with('success', 'Data pelanggan berhasil dihapus.');
    }
}