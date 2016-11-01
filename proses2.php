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


?>

</body>
</html>