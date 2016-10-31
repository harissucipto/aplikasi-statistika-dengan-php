<!DOCTYPE html>
<html>

<head>
    <title>Aplikasi sederhana sederhana</title>
</head>

<body>
    <h1>Aplikasi Statistika Sederhana</h1>

    <!-- banyak input datanya-->
    <form action="index.php" method="GET">
        <p>Jumlah Data
            <input type="text" name="jdata">
        </p>
        <p>
            <input type="submit" name="inputData" value="Masukan">
        </p>
    </form>

    <form action="proses.php" method="GET">

    <? // mulai skrip php
    // ambil nilai yang telah dikirim 
    $inputData = $_GET[inputData];
    $jdata = $_GET[jdata];


    if ($inputData && $jdata > 0) {
        // lakukan pengulangan sebanyak data yang akan dimasukan
        for ($i = 1; $i <= $jdata; $i++) { 
            echo "
                    <p>Masukan data$i:
                        <input type='text' name='data$i'>
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
    } //akhir kondisi inputData

    ?>    
</body>

</html>