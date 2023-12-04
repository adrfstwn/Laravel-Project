<?php

namespace App\Http\Controllers;

use App\Models\Agama;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AgamaController extends Controller
{

    public function index()
    {
        $agama = Agama::all();
        return view('agama/index',compact('agama'));
        // return view('dashboard', compact('pegawai'));
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'nama_agama' => 'required',
        ], [
            'nama_agama.required' => 'Kolom nama agama harus diisi',
        ]);

        $data = $request->except('_token');
        $data['nama_agama'] = $request->input('nama_agama'); // Mengambil nilai dari input 'nama_agama'

        Agama::create($data); // Membuat instansi Agama dengan data yang telah disiapkan

        return redirect()->route('agama.index');
    }
    public function create(Request $request)
    {
        $agama = Agama::all();
        return view('agama.create',compact('agama'));
    }

    public function show(string $id)
    {

    }

    public function edit($id)
    {
        $agama = Agama::find($id);
        return view('agama.edit',compact(['agama']));

    }

    public function update(Request $request,$id)
    {

        $validated = $request->validate([
            'nama_agama' => 'required',
        ], [
            'nama_agama.required' => 'Kolom nama agama harus diisi',
        ]);

        $agama = Agama::find($id);
        $agama->nama_agama = $request->nama_agama;
        $agama -> update($request->except('_token'));
        return redirect('agama/index');
    }

    public function destroy(string $id)
    {
        $agama = Agama::find($id);
        $pegawaiAssociatedWithAgama = Pegawai::where('id_agama', $id)->get();
        foreach ($pegawaiAssociatedWithAgama as $pegawai) {
            $pegawai->id_agama = null;
            $pegawai->save();
        }
        $agama -> delete();
        return redirect('agama/index');
    }
}
