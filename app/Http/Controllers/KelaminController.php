<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;
use App\Models\JenisKelamin;

class KelaminController extends Controller
{
    public function index()
    {
        $jenisKelamin = JenisKelamin::all();
        return view('jeniskelamin/index',compact('jenisKelamin'));
        // return view('dashboard', compact('pegawai'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_jeniskelamin' => 'required',
        ], [
            'nama_jeniskelamin.required' => 'Kolom nama jenis kelamin harus diisi',
        ]);

        $data = $request->except('_token');
        $data['nama_jeniskelamin'] = $request->input('nama_jeniskelamin'); // Mengambil nilai dari input 'nama_agama'

        JenisKelamin::create($data); // Membuat instansi Agama dengan data yang telah disiapkan

        return redirect()->route('jenisKelamin.index');
    }
    public function create(Request $request)
    {
        $jenisKelamin = JenisKelamin::all();
        return view('jenisKelamin.create',compact('jenisKelamin'));
    }

    public function show(string $id)
    {

    }

    public function edit($id)
    {
        $jenisKelamin = JenisKelamin::find($id);
        return view('jenisKelamin.edit',compact(['jenisKelamin']));

    }

    public function update(Request $request,$id)
    {
        $validated = $request->validate([
            'nama_jeniskelamin' => 'required',
        ], [
            'nama_jeniskelamin.required' => 'Kolom nama jenis kelamin harus diisi',
        ]);

        $jenisKelamin = JenisKelamin::find($id);
        $jenisKelamin -> update($request->except('_token'));
        return redirect()->route('jenisKelamin.index');
    }

    public function destroy(string $id)
    {
        $jenisKelamin = JenisKelamin::find($id);
        $pegawaiAssociatedWithjenisKelamin = Pegawai::where('id_jenisKelamin', $id)->get();
        foreach ($pegawaiAssociatedWithjenisKelamin as $pegawai) {
            $pegawai->id_jenisKelamin = null;
            $pegawai->save();
        }
        $jenisKelamin -> delete();
        return redirect()->route('jenisKelamin.index');
    }
}
