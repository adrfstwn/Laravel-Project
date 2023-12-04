<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;
use App\Models\JenisPegawai;

class JenisPegawaiController extends Controller
{
    public function index()
    {
        $jenisPegawai = JenisPegawai::all();
        return view('jenispegawai/index',compact('jenisPegawai'));
        // return view('dashboard', compact('pegawai'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_jenisPegawai' => 'required',
        ], [
            'nama_jenisPegawai.required' => 'Kolom nama Jenis Pegawai harus diisi',
        ]);

        $data = $request->except('_token');
        $data['nama_jenisPegawai'] = $request->input('nama_jenisPegawai'); // Mengambil nilai dari input 'nama_agama'

        JenisPegawai::create($data); // Membuat instansi Agama dengan data yang telah disiapkan

        return redirect()->route('jenisPegawai.index');
    }
    public function create(Request $request)
    {
        $jenisPegawai = JenisPegawai::all();
        return view('jenisPegawai.create',compact('jenisPegawai'));
    }

    public function show(string $id)
    {

    }

    public function edit($id)
    {
        $jenisPegawai = JenisPegawai::find($id);
        return view('jenisPegawai.edit',compact(['jenisPegawai']));

    }

    public function update(Request $request,$id)
    {
        $validated = $request->validate([
            'nama_jenisPegawai' => 'required',
        ], [
            'nama_jenisPegawai.required' => 'Kolom nama Jenis Pegawai harus diisi',
        ]);

        $jenisPegawai = JenisPegawai::find($id);
        $jenisPegawai -> update($request->except('_token'));
        return redirect('jenisPegawai/index');
    }

    public function destroy(string $id)
    {
        $jenisPegawai = JenisPegawai::find($id);
        $pegawaiAssociatedWithjenisPegawai = Pegawai::where('id_jenisPegawai', $id)->get();
        foreach ($pegawaiAssociatedWithjenisPegawai as $pegawai) {
            $pegawai->id_jenisPegawai = null;
            $pegawai->save();
        }
        $jenisPegawai -> delete();
        return redirect('jenisPegawai/index');
    }
}
