<!DOCTYPE html>
<html>

<head>
    <title>Aplikasi sederhana sederhana</title>
</head>
<body>
<h1>Aplikasi Statistika Sederhana</h1>

<?
// defeniskan variabel
$rataRata = $_GET[operasi];
$median = $_GET[operasi];
$banyakData = $_GET[banyakData];
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
    for ($i = 1; $i <= $banyakData; $i++) {
        $jumKesData += $data[$i];
    }

    // baru masuakan rumus

    $hasilRatarata = $jumKesData / $banyakData;

    // cetak
    echo "
        <p>Anda Memilih operasi <b>Mean / Rata - Rata data </b></p>
        <p>jumlah Data / banyak Data = <b>Rata - Rata</b><p>
        <p> <b> $jumKesData / $banyakData = $hasilRatarata</b> </p>

        <p>Jadi <b>Rata - rata</b> nya adalah <b>$hasilRatarata</b></p>
    ";

} // end rata -rata / mean

if ($median == "median") {

}



echo  "
    <p><a href='index.php'>Kembali ke Menu</a></p>
";

?>

</body>
</html>