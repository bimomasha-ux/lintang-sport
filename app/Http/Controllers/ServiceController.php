<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();

        return view('services.index', compact('services'));
    }

    public function create()
    {
        return view('services.create');
    }

    public function store(Request $request)
    {
        Service::create([

            'nama' => $request->nama,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
            'durasi' => $request->durasi,

        ]);

        return redirect('/services')
                ->with('success', 'Layanan berhasil ditambahkan');
    }

    // FORM EDIT
    public function edit(Service $service)
    {
        return view('services.edit', compact('service'));
    }

    // UPDATE DATA
    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);

        $service->update([

            'nama' => $request->nama,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
            'durasi' => $request->durasi,

        ]);

        return redirect('/services')
                ->with('success', 'Layanan berhasil diupdate');
    }

    // HAPUS
    public function destroy($id)
    {
        $service = Service::findOrFail($id);

        $service->delete();

        return redirect('/services')
                ->with('success', 'Layanan berhasil dihapus');
    }
}