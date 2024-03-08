<?php 

// buat fungsi
function hitungUmur($thn_lahir){
    // code fungsi
    $thn_sekarang = 2024;
    // hitung umur
    $umur = $thn_sekarang - $thn_lahir;
    // tampilin umur
    # echo $umur;
    // kembaliin umur
    return $umur;
}

// panggil fungsi
echo "Umur saya adalah " . hitungUmur(2004);

?>