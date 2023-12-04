<?php

namespace App\Http\Controllers;

use App\Models\Agama;
use App\Models\pegawai;
use App\Models\JenisKelamin;
use App\Models\JenisPegawai;
use App\Models\StatusPegawai;
use App\Models\Pendidikan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class dashboard extends Controller
{

    public function index()
    {
        $pegawai = Pegawai::with('agama','jenisPegawai','statusPegawai','pendidikan','jenisKelamin')->paginate(10);
        return view('dashboard',compact('pegawai'));
        // return view('dashboard', compact('pegawai'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'nik'=> 'required',
            'id_jenisPegawai'=> 'required',
            'id_statusPegawai'=> 'required',
            'unit'=> 'required',
            'subUnit'=> 'required',
            'id_pendidikan'=> 'required',
            'tanggalLahir'=> 'required',
            'tempatLahir'=> 'required',
            'id_jenisKelamin'=> 'required',
            'id_agama'=> 'required'
        ]);
        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);
            $validated['gambar'] = $imageName;
        }

        Pegawai::create($validated);
        return redirect('dashboard');
    }
    public function create(Request $request)
    {
        $jenisPegawai = JenisPegawai::all();
        $statusPegawai = StatusPegawai::all();
        $pendidikan = Pendidikan::all();
        $jenisKelamin = JenisKelamin::all();
        $agama = Agama::all();
        $pegawai = Pegawai::all();
        return view('create',compact('pegawai','agama','jenisPegawai','statusPegawai','pendidikan','jenisKelamin'));
    }

    public function show(string $id)
    {

    }

    public function edit($id)
    {
        $jenisPegawai = JenisPegawai::all();
        $statusPegawai = StatusPegawai::all();
        $pendidikan = Pendidikan::all();
        $jenisKelamin = JenisKelamin::all();
        $agama = Agama::all();
        $pegawai = Pegawai::with('agama','jenisPegawai','statusPegawai','pendidikan','jenisKelamin')->find($id);
        return view('edit',compact(['pegawai','agama','jenisPegawai','statusPegawai','pendidikan','jenisKelamin']));

    }

    public function update(Request $request,$id)
    {
        $pegawai = Pegawai::find($id);

        $validated = $request->validate([
            'nama' => 'required',
            'nik'=> 'required',
            'id_jenisPegawai'=> 'required',
            'id_statusPegawai'=> 'required',
            'unit'=> 'required',
            'subUnit'=> 'required',
            'id_pendidikan'=> 'required',
            'tanggalLahir'=> 'required',
            'tempatLahir'=> 'required',
            'id_jenisKelamin'=> 'required',
            'id_agama'=> 'required'
        ]);
        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $imageName =time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);
            $pegawai->gambar = $imageName;
        }

        $pegawai->id_agama = $request->input('create');
        $pegawai->id_jenisPegawai = $request->input('create');
        $pegawai->id_statusPegawai = $request->input('create');
        $pegawai->id_pendidikan = $request->input('create');
        $pegawai->id_jenisKelamin = $request->input('create');

        $pegawai -> update($validated);
        return redirect('dashboard');


    }

    public function destroy(string $id)
    {
        $pegawai = Pegawai::find($id);
        $pegawai -> delete();
        return redirect('dashboard');
    }
}
