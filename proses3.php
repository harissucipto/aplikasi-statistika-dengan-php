<!DOCTYPE html>
<html>

<head>
    <title>Aplikasi sederhana sederhana</title>
</head>
<body>
<?
    $inputData = $_GET[inputData];
    $jdata = $_GET[banyakData];

?>
<h1>Aplikasi Statistika Sederhana</h1>
  <!-- banyak input datanya-->
    <form action="index.php" method="GET">
        <p>Jumlah Data
            <input type="text" name="jdata" value="<? echo $jdata ?>">
        </p>
        <p>
            <input type="submit" name="inputData" value="Masukan">
        </p>
    </form>

    <form action="proses3.php" method="GET">

    <? 
        // lakukan pengulangan sebanyak data yang akan dimasukan
        for ($i = 1; $i <= $jdata; $i++) { 
            $temp = $_GET["data$i"];
            echo "  
                    <p>Masukan data$i:
                        <input type='text' name='data$i' value='$temp'>
                    </p>
            "; // akhir echo
        } // akhir pengulangan

        echo "
        <p>Pilih Operasi: 
            <select name='operasi'> <!-- misalny kita bikin opsi satu dahulu untuk rata-rata -->
                <option value='pilihan'>Pilih Operasi</option>
                <option value='mean'>1. Mean / Rata - Rata</option>
                <option value='median'>2. Median</option>
                <option value='modus'>3. Modus</option>
                <option value='varians'>4. Varians</option>
                <option value='standar-deviasi'>5. Standar Deviasi</option>
                <option value='simpangan-baku'>6. Simpangan baku</option>
                <option value='sort-asc'>7. Sort-asc</option>
                <option value='sort-desc'>8. Sort-desc</option>
                <option value='min-max'>9. Min-Max</option>
                <option value='quartil'>10. Quartil</option>
                <option value='desil'>11. Desil</option>
                <option value='prsentil'>12. Prsentil</option>
                <option value='grafik'>13. Grafik</option>
            </select>
        </p>
        <p>
            <input type='hidden' name='banyakData' value='$jdata'>
            <input type='submit' name='proses' value='proses'>
        </p>
        </form>
        ";
    //akhir kondisi inputData

?>    
<?
// banyakdata itu namalain dari jumlahData.
// defeniskan variabel

// operasi yang tersedia.
$rataRata = $_GET[operasi];
$median = $_GET[operasi];
$modus = $_GET[operasi];
$varians = $_GET[operasi];
$simpanganbaku = $_GET[operasi];
$sortingAsc = $_GET[operasi];
$sortingDsc = $_GET[operasi];
$minmax = $_GET[operasi];
$quartil = $_GET[operasi];


// definisikan
$banyakData = $_GET[banyakData];
$data;
//ambil perdata
$indexdata = 0;
for ($i = 1; $i <= $banyakData; $i++) {
    $data[$indexdata] = $_GET["data$i"];
    $indexdata++;
}

$dataTerurut;
for ($i = 0; $i < $banyakData; $i++) {
    $dataTerurut[$i] = $data[$i];
}
sort($dataTerurut);

/*
echo "jumlah data $banyakData <br>";
echo "data biasa<br>";
for ($i = 0; $i < $banyakData; $i++) {
    echo $data[$i] . "<br> ";
}
echo "data terurut<br>";
for ($i = 0; $i < $banyakData; $i++) {
    echo $dataTerurut[$i] . "<br> ";
}
*/
function cetakArray($datanya, $kalimat) {
    echo $kalimat . ": ";
    for ($i = 0; $i < sizeof($datanya); $i++) {
        echo $datanya[$i];
        if ($i == (sizeof($datanya) - 1)) {
            echo " . ";
        } else {
            echo ",  ";
        }
    }
    echo "<br>";
}


function hitungMean($datanya) {
    $mBanyakData= sizeof($datanya);
    $mJumlahData = 0;
    for ($i = 0; $i < $mBanyakData; $i++) {
        $mJumlahData += $datanya[$i];
    }
    return $mJumlahData / $mBanyakData;
}
// test fungsi mean
echo "<br>mean : " . hitungMean($dataTerurut);

function hitungMedian($datanya) {
    // data Anda harus sudah terurut
    $mBanyakData= sizeof($datanya);
    if ($mBanyakData % 2 != 0) {
        return $datanya[(($mBanyakData + 1) / 2) -  1];
    } else {
        return ($datanya[($mBanyakData / 2) - 1] + $datanya[(($mBanyakData / 2) + 1) - 1]) / 2;
    }
}

echo "<br>Median: " . hitungMedian($dataTerurut);

function nilaiUniq($datanya) {
    $terindex = 0;
    $i = 0;
    $arrayBaru;
    for ($x = 1; $x <= sizeof($datanya); $x++) {
	    if ($datanya[$i] != $datanya[$x]) {
		    $arrayBaru[$terindex] = $datanya[$i];
            $terindex++;
            
	    }
        $i++;

    }
    return $arrayBaru;
}

function banyakPerKelas($datanya) {
    $kelasnya = nilaiUniq($datanya);
    $banyakPerkelasDatanya;
    $nilainya = 0;
    for ($i = 0; $i < sizeof($kelasnya); $i++) {
        for ($x = 0; $x < sizeof($datanya); $x++) {
            if ($kelasnya[$i] == $datanya[$x]) {
                $nilainya++;
            }
        }
        $banyakPerkelasDatanya[$i][0] = $kelasnya[$i];
        $banyakPerkelasDatanya[$i][1] = $nilainya;
        $nilainya = 0;
    }
    return $banyakPerkelasDatanya;
}

function palingBanyak($datanya) {
    $perData = banyakPerKelas($datanya);
    $nilaiPalingBanyak = 0;
    $nilaiPalingBanyak = $perData[0][1];
    for ($i = 0; $i < sizeof($perData); $i++) {
        if ($nilaiPalingBanyak < $perData[$i][1]) {
            $nilaiPalingBanyak = $perData[$i][1];
        }
    }
    return $nilaiPalingBanyak;
}

function hitungModus($datanya) {
    $nilaiPalingBanyak = palingBanyak($datanya);
    $objekKelas = banyakPerKelas($datanya);
    $indexnya = 0;
    $modusnya;
    for ($i = 0; $i < sizeof($objekKelas); $i++) {
        if ($nilaiPalingBanyak == $objekKelas[$i][1]) {
            $modusnya[$indexnya] = $objekKelas[$i][0];
            $indexnya++;
        };
    }
    return $modusnya;
}

function hitungVarians($datanya) {
    $hasilRata = hitungMean($datanya);
    $jumlahTotalPangkat = 0;
    for ($i = 0; $i < sizeof($datanya); $i++) {
        $temp1 = $datanya[$i] - $hasilRata;
        $temp1 = $temp1 * $temp1;
        $jumlahTotalPangkat += $temp1;
    }
    return $jumlahTotalPangkat / sizeof($datanya);
}


function hitungSimpanganBaku($datanya) {
    return sqrt(hitungVarians($datanya));
}

function salinArray($datanya) {
    $lokasinya;
    for ($i = 0; $i < sizeof($datanya); $i++) {
        $lokasinya[$i] = $datanya[$i];
    }
    return $lokasinya;
}

function hitungSortAsc($datanya) {
    $salinData = salinArray($datanya);
    sort($salinData);
    return $salinData;
}

function hitungSortDsc($datanya) {
    $salinData = salinArray($datanya);
    sort($salinData);
    $salinData = array_reverse($salinData);
    return $salinData;
}

function hitungMinum($datanya) {
    return min($datanya);
}

function hitungMaximum($datanya) {
    return max($datanya);
}

function hitungKuartil($datanya) {
    $hBanyakData = sizeof($datanya);
    $kuartil;
    if ($hBanyakData % 2 != 0) {
        if (($hBanyakData + 1) % 4 == 0) {
            $kuartil[0] = $datanya[ ( ($hBanyakData + 1) / 4 ) - 1];
            $kuartil[1] = $datanya[ ( 2 * ($hBanyakData + 1) / 4) - 1];
            $kuartil[2] = $datanya[ ( 3 * ($hBanyakData + 1) / 4) - 1];
        } else {
            $kuartil[0] = ($datanya[ ( ($hBanyakData - 1) / 4)  - 1] + $datanya[ ( ($hBanyakData + 3) / 4)  - 1]) / 2;
            $kuartil[1] = $datanya[( (2 * ($hBanyakData + 1) ) / 4) - 1];
            $kuartil[2] = (($datanya[ ( ((3 * $hBanyakData) + 1) / 4) - 1] + $datanya[ (((3 * $hBanyakData) + 5) / 4) -1])) / 2;
        }
    } else {
        if ($hBanyakData % 4 == 0) {
            echo "disni";
            $kuartil[0] = ($datanya[(($hBanyakData + 3) / 4) - 1] + $datanya[(($hBanyakData + 4) / 4) - 1]) / 2;
            $kuartil[1] = ($datanya[ (2 * ($hBanyakData + 1) / 4) - 1] + $datanya[ (2 * ($hBanyakData + 1) / 4)]) / 2;
            $kuartil[2] = ($datanya[ ( (3 * $hBanyakData + 2) / 4 ) - 1] + $datanya[ ( (3 * $hBanyakData + 2) / 4 )]) / 2;
        } else {
            $kuartil[0] = $datanya[(($hBanyakData + 2) / 4) - 1];
            $kuartil[1] = ( $datanya[ ($hBanyakData / 2) - 1] + $datanya[ ($hBanyakData / 2 + 1) - 1] ) / 2;
            $kuartil[2] = $datanya[ ( (3 * $hBanyakData + 2) / 4 ) - 1];
        }
    }
    return $kuartil;
}

function hitungDesil($datanya, $ke) {
    return $ke * sizeof($datanya) / 10;
}

function hitungPersentil($datanya, $ke) {
    return $ke * sizeof($datanya) / 100;
}


echo "<br>";
// pembuktian
echo "nilai rata - rata" . number_format(hitungMean($dataTerurut), 2) . "<br>";
echo "nilai Median" . number_format(hitungMedian($dataTerurut), 2). "<br>";
cetakArray(hitungModus($dataTerurut), "modusnya");
echo "nilai Varians" . number_format(hitungVarians($dataTerurut), 2). "<br>";
echo "nilai Simpangan Baku" . number_format(hitungSimpanganBaku($dataTerurut), 2). "<br>";
cetakArray(hitungSortAsc($data), "sorting:");
cetakArray(hitungSortDsc($data), "sorting dsc");
echo "Hitung minimum " . number_format(hitungMinum($dataTerurut), 2). "<br>";
echo "Hitung maximum " . number_format(hitungMaximum($dataTerurut), 2). "<br>";
cetakArray(hitungKuartil($dataTerurut), "kuartil");
echo "Hitung Desil ke 5 yaitu: " . number_format(hitungDesil($dataTerurut, 5), 2). "<br>";
echo "Hitung Persentil ke 5 yaitu: " . number_format(hitungPersentil($dataTerurut, 5), 2). "<br>";
?>
</body>
</html>