<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\Kelurahan;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list_pasien = Pasien::all();
        return view('pasien.index', ['list_pasien'=>$list_pasien]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $list_kelurahan = Kelurahan::all();
        $pasien = new Pasien();
        return view('pasien.form', ['pasien'=>$pasien, 'list_kelurahan'=>$list_kelurahan]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        // Validasi data inputan
        $request->validate([
            'kode' => 'required',
            'nama' => 'required',
            'tmp_lahir' => 'required',
            'tgl_lahir' => 'required',
            'kelurahan_id' => 'required',
        ]);

        if($request->id){
            Pasien::find($request->id)->update($request->all());
            return redirect(route('pasien.index'))->with('pesan', 'Data berhasil diupdate');
        }else {
        Pasien::create($request->all());
        return redirect(route('pasien.index'))->with('pesan', 'Data berhasil disimpan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Pasien $pasien)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pasien = Pasien::find($id);
        $list_kelurahan = Kelurahan::all();
        return view('pasien.form', ['pasien'=>$pasien, 'list_kelurahan'=>$list_kelurahan]);
    }

    public function view($id)
    {
        $pasien = Pasien::find($id);
        return view('pasien.view', ['pasien'=>$pasien]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pasien $pasien)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        Pasien::find($id)->delete();
        return redirect(route('pasien.show'))->with('pesan', 'Data berhasil dihapus');
    }
}