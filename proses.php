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
$banyakData = $_GET[banyakData];
$rataRata = $_GET[operasi];
$median = $_GET[operasi];
$modus = $_GET[operasi];
$varians = $_GET[operasi];
$simpanganbaku = $_GET[operasi];
$sortingAsc = $_GET[operasi];
$sortingDsc = $_GET[operasi];
$minmax = $_GET[operasi];

// karena datanya banyak kita bikin jadi satu dengan array;
$data = [];
?>

<p>Data yang anda Masukan yaitu: </p>

<?
// mendefiniskan nilai ke  variable data sebanyak banyak data
echo "<p><b>";
for ($i = 1; $i <= $banyakData; $i++) {
    $data[$i] = $_GET["data$i"];
    echo $data[$i];
    if ($i != $banyakData) {
        echo " , ";
    } else {
        echo ".";
    }
}
echo "</b></p>";

// jika memilih operasi rata - rata;
if ($rataRata == "mean") {

    // rumus rata - rata adalah jumlah keseulurahan data dibagi
    // banyak data, jadi kita harus mendefensikan 3 variabel yakni
    // variable hasilRata-rata, jumlah keselurahan data, dan banyak data
    // karena banyak data telah didefenisakan(dicari)sebelumnya maka kita 
    // perlu dua variabel yaitu untuk hasilRata-rata dan vairabel
    // jumlah keselurahan data
    $jumKesData = 0;
    $hasilRatarata = 0;

    // lakukan looping untuk mencari jumlah keselurahan data
    for ($i = 1; $i <= sizeof($data); $i++) {
        $jumKesData += $data[$i];
    }

    // baru masuakan rumus

    $hasilRatarata = $jumKesData / $banyakData;
    $outputMean = number_format($hasilRatarata, 2);

    // cetak
    echo "
        <p>Anda Memilih operasi <b>Mean / Rata - Rata data </b></p>
        <p>jumlah Data / banyak Data = <b>Rata - Rata</b><p>
        <p> <b> $jumKesData / $banyakData = $outputMean</b> </p>

        <p>Jadi <b>Rata - rata</b> nya adalah <b>$outputMean</b></p>
    ";

} // end rata -rata / mean

if ($median == "median") {
    echo "anda memilih median";
    // sorting dulu sebelum melakukan operasi
    $susun = $data;
    $hasilMedian;
    sort($susun);

    if ($banyakData % 2 == 0) { // jika jumlahData genap 
        $medianproses1 = (sizeof($susun) / 2) - 1; // dikurang 1 dikarenakan index mulai dari 0
        $medianproses2 = $medianproses1 + 1;
        $hasilMedian = ($susun[$medianproses1] + $susun[$medianproses2]) / 2;
        $outputMedian = number_format($hasilMedian, 2);
        echo "mediannya adalah $outputMedian";
        
    } else { // jika jumlahData ganjil
        $hasilMedian = ((sizeof($susun) + 1) / 2) - 1; // dikurang 1 dikarenakan index mulai dari 0
         $outputMedian = number_format($susun[$hasilMedian], 2);
         echo "mediannya adalah $outputMedian"; 
    }

} // akhir operasi median.

if ($modus == "modus") {

    // cari kelasnya dulu
    $salin = $data;
    sort($salin);
    $i = 0;
    $index = 0;
    $arrayBaru = [];
    for ($x = 1; $x <= sizeof($salin); $x++) {
        if ($salin[$i] != $salin[$x]) {
	        $arrayBaru[$index] = $salin[$i];
            $index++;
	    } 
        $i++;
    }
    $banyakPer = [];
    // cari banyak data tiap kelas
    for ($i = 0; $i < sizeof($arrayBaru); $i++) {
        $tambah = 0;
        for ($x = 0; $x < sizeof($salin); $x++) {
            if ($arrayBaru[$i] == $salin[$x]) {
                $tambah+= 1;
            }
        }
        $banyakPer[$i] = $tambah;
    }

    // cari banyakPer yang palingtinggi nilainya berati modus.
    $filterhasilModus = $banyakPer;
    $hasilModus = [];
    $indexModus = 0;
    sort($filterhasilModus);
    $nilaiPalinTinggi = sizeof($filterhasilModus) - 1;


    // cetak modus.
    if ($filterhasilModus[$nilaiPalinTinggi] > 1) {
        for ($i = 0; $i < sizeof($banyakPer); $i++) {
                if ($filterhasilModus[$nilaiPalinTinggi] == $banyakPer[$i]) {
                    $hasilModus[$indexModus] = $arrayBaru[$i];
                    $indexModus++;
                }
         }
         echo "Modusnya yaitu: ";
         for ($i = 0; $i < sizeof($hasilModus); $i++) {
             if ($i == (sizeof($hasilModus) - 1)) {
                 echo number_format($hasilModus[$i], 2)  . " .";
             } else {
                 echo number_format($hasilModus[$i], 2)  . " , ";
             }
         }
         echo "<br>";
    }  else {
        echo "tidak ada modus di data ini";
    }
    
    /*
    // pengujian
    for ($x = 0; $x < sizeof($arrayBaru); $x++) {
        echo $arrayBaru[$x];
    }
    echo "<br>banyak data</br>";
    for ($x = 0; $x < sizeof($arrayBaru); $x++) {
        echo $banyakPer[$x];
    }

    */
} // akhiri operasi modus

// jika operasi varians
if ($varians == "varians") {
    // cari rata - rata

    $jumKesData = 0;
    $hasilRatarata = 0;
    // lakukan looping untuk mencari jumlah keselurahan data
    for ($i = 1; $i <= sizeof($data); $i++) {
        $jumKesData += $data[$i];
    }
    // baru masuakan rumus
    $hasilRatarata = $jumKesData / $banyakData;

    $proses1 = 0;
    for ($i = 1; $i <= sizeof($data); $i++) {
        $temp = $data[$i] - $hasilRatarata;
        $temp = $temp * $temp;
        $proses1 += $temp;
    }
    
    $hasilVarians = $proses1 / 7;
    echo "hasil varinsinya " .  number_format($hasilVarians, 2);
    

}

if ($simpanganbaku == "simpangan-baku") {
    $jumKesData = 0;
    $hasilRatarata = 0;
    // lakukan looping untuk mencari jumlah keselurahan data
    for ($i = 1; $i <= sizeof($data); $i++) {
        $jumKesData += $data[$i];
    }
    // baru masuakan rumus
    $hasilRatarata = $jumKesData / $banyakData;

    $proses1 = 0;
    for ($i = 1; $i <= sizeof($data); $i++) {
        $temp = $data[$i] - $hasilRatarata;
        $temp = $temp * $temp;
        $proses1 += $temp;
    }
    
    $hasilSimpanganBaku= sqrt($proses1 / 7);
    echo "hasil simpangan baku yaitu " .  number_format($hasilSimpanganBaku, 2);

}

if ($sortingAsc == "sort-asc") {
    $salin;
    for ($i = 1; $i <= sizeof($data); $i++) {
        $salin[$i] = $data[$i];
    }
    sort($salin);
    echo " hasil sorting ASC: ";

    for ($i = 0; $i < sizeof($data); $i++) {
        echo $salin[$i];
        if ($i < ($banyakData - 1)) {
            echo " , ";
        } else {
            echo ".";
        }
    }

}

if ($sortingDsc == "sort-desc") {
    $hasilSortingDsc;
    for ($i = 1; $i <= sizeof($data); $i++) {
        $hasilSortingDsc[$i] = $data[$i];
    }
    sort($hasilSortingDsc);
    $hasilSortingDsc= array_reverse($hasilSortingDsc);
    echo " hasil sorting DSC: ";

    for ($i = 0; $i < sizeof($data); $i++) {
        echo $hasilSortingDsc[$i];
        if ($i < ($banyakData - 1)) {
            echo " , ";
        } else {
            echo ".";
        }
    }

}

if ($minmax == "min-max") {
    $x = 0;
    $arraySalin;
    for ($i = 1; $i <= sizeof($data); $i++) {
        if ($i >= 1) {
            $arraySalin[$x] = $data[$i];
            $x++;
        }
    }
    sort($arraySalin);
    $hasilMin = $arraySalin[0];
    $hasilMax = $arraySalin[$banyakData - 1];
    echo "NIlai Min : " . $hasilMin;
    echo "<br>Nilai Max: " . $hasilMax;

}

echo  "
    <p><a href='index.php'>Kembali ke Menu</a></p>
";

?>

</body>
</html>