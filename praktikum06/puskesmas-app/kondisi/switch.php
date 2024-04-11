<?php
$nilai = 90;

switch ($nilai) {
    case $nilai > 80 and $nilai < 90:
        echo "hebat sekaliii!!";  

    break;

    case $nilai >= 90 and $nilai < 100:
        echo "mantap bossque!!!";

        break;

    default:
        echo "anda kurang beruntung, coba lagi ya!";
    break;
}

?>