<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller

{
    public function about()
    {
        $nama = "Nama Anda";
        $nim = "NIM Anda";
        $program_studi = "Program Studi Anda";
        $tahun_angkatan = "Tahun Angkatan Anda";

        return view('about.about', [
            'nama' => $nama,
            'nim' => $nim,
            'program_studi' => $program_studi,
            'tahun_angkatan' => $tahun_angkatan,
        ]);
    }
}

