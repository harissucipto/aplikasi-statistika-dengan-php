<?php

function hitungMean($datanya) {
    sort($datanya);
    $mBanyakData= sizeof($datanya);
    $mJumlahData = 0;
    for ($i = 0; $i < $mBanyakData; $i++) {
        $mJumlahData += $datanya[$i];
    }
    return $mJumlahData / $mBanyakData;
}

function hitungVarians($datanya) {
    sort($datanya);
    $hasilRata = hitungMean($datanya);
    $jumlahTotalPangkat = 0;
    for ($i = 0; $i < sizeof($datanya); $i++) {
        $temp1 = $datanya[$i] - $hasilRata;
        $temp1 = $temp1 * $temp1;
        $jumlahTotalPangkat += $temp1;
    }
    return $jumlahTotalPangkat / sizeof($datanya);
}

// contoh kita punya data statistika kita tulis dalam array
$arrayContoh = [6, 7, 8, 8, 10, 9];

// terus panggil fungsi hitungvarians untuk mengetahui hasilnya
$hasilnya = hitungVarians($arrayContoh);

// terus untuk melihat hasilnya cetak array hasilnya
echo "Varians : $hasilnya";
