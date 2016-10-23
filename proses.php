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

}

if ($modus == "modus") {

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

    for ($x = 0; $x < sizeof($arrayBaru); $x++) {
        echo $arrayBaru[$x];
    }

    
    
}


echo  "
    <p><a href='index.php'>Kembali ke Menu</a></p>
";

?>

</body>
</html>