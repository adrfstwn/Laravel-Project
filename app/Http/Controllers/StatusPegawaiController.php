<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;
use App\Models\StatusPegawai;

class StatusPegawaiController extends Controller
{
    public function index()
    {
        $statusPegawai = StatusPegawai::all();
        return view('statuspegawai/index',compact('statusPegawai'));
        // return view('dashboard', compact('pegawai'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_statusPegawai' => 'required',
        ], [
            'nama_statusPegawai.required' => 'Kolom nama Status Pegawai harus diisi',
        ]);

        $data = $request->except('_token');
        $data['nama_statusPegawai'] = $request->input('nama_statusPegawai'); // Mengambil nilai dari input 'nama_agama'

        StatusPegawai::create($data); // Membuat instansi Agama dengan data yang telah disiapkan

        return redirect()->route('statusPegawai.index');
    }
    public function create(Request $request)
    {
        $statusPegawai = StatusPegawai::all();
        return view('statusPegawai.create',compact('statusPegawai'));
    }

    public function show(string $id)
    {

    }

    public function edit($id)
    {
        $statusPegawai = statusPegawai::find($id);
        return view('statusPegawai.edit',compact(['statusPegawai']));

    }

    public function update(Request $request,$id)
    {
        $validated = $request->validate([
            'nama_statusPegawai' => 'required',
        ], [
            'nama_statusPegawai.required' => 'Kolom nama Status Pegawai harus diisi',
        ]);

        $statusPegawai = StatusPegawai::find($id);
        $statusPegawai -> update($request->except('_token'));
        return redirect('statusPegawai/index');
    }

    public function destroy(string $id)
    {
        $statusPegawai = StatusPegawai::find($id);
        $pegawaiAssociatedWithstatusPegawai = Pegawai::where('id_statusPegawai', $id)->get();
        foreach ($pegawaiAssociatedWithstatusPegawai as $pegawai) {
            $pegawai->id_statusPegawai = null;
            $pegawai->save();
        }
        $statusPegawai -> delete();
        return redirect('statusPegawai/index');
    }
}
