<!DOCTYPE html>
<html>

<head>
    <title>Aplikasi sederhana sederhana</title>
</head>
<body>
<h1>Aplikasi Statistika Sederhana</h1>

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

echo "jumlah data $banyakData <br>";
echo "data biasa<br>";
for ($i = 0; $i < $banyakData; $i++) {
    echo $data[$i] . "<br> ";
}
echo "data terurut<br>";
for ($i = 0; $i < $banyakData; $i++) {
    echo $dataTerurut[$i] . "<br> ";
}

function cetakArray($datanya, $kalimat) {
    echo $kalimat . ": ";
    for ($i = 0; $i < sizeof($datanya); $i++) {
        echo $datanya[$i];
        if ($i == (sizeof($datanya) - 1)) {
            echo " . ";
        } else {
            echo ", ";
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





// pembuktian
echo "<br>nilai rata - rata" . number_format(hitungMean($dataTerurut), 2);
echo "<br>nilai Median" . number_format(hitungMedian($dataTerurut), 2). "<br>";
$hasilke = hitungModus($dataTerurut);
cetakArray($hasilke, "modusnya");
?>

</body>
</html>