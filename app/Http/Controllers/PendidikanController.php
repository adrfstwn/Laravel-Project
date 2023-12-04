<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;
use App\Models\Pendidikan;


class PendidikanController extends Controller
{
    public function index()
    {
        $pendidikan = Pendidikan::all();
        return view('pendidikan/index',compact('pendidikan'));
        // return view('dashboard', compact('pegawai'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'jenjang' => 'required',
        ], [
            'jenjang.required' => 'Kolom nama Pendidikan harus diisi',
        ]);

        $data = $request->except('_token');
        $data['jenjang'] = $request->input('jenjang'); // Mengambil nilai dari input 'nama_agama'

        Pendidikan::create($data); // Membuat instansi Agama dengan data yang telah disiapkan

        return redirect()->route('pendidikan.index');
    }
    public function create(Request $request)
    {
        $pendidikan = Pendidikan::all();
        return view('pendidikan.create',compact('pendidikan'));
    }

    public function show(string $id)
    {

    }

    public function edit($id)
    {
        $pendidikan = Pendidikan::find($id);
        return view('pendidikan.edit',compact(['pendidikan']));

    }

    public function update(Request $request,$id)
    {
        $validated = $request->validate([
            'jenjang' => 'required',
        ], [
            'jenjang.required' => 'Kolom nama Pendidikan harus diisi',
        ]);

        $pendidikan = Pendidikan::find($id);
        $pendidikan -> update($request->except('_token'));
        return redirect('pendidikan/index');
    }

    public function destroy(string $id)
    {
        $pendidikan = Pendidikan::find($id);
        $pegawaiAssociatedWithpendidikan = Pegawai::where('id_pendidikan', $id)->get();
        foreach ($pegawaiAssociatedWithpendidikan as $pegawai) {
            $pegawai->id_pendidikan = null;
            $pegawai->save();
        }
        $pendidikan -> delete();
        return redirect('pendidikan/index');
    }
}
