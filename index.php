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

    if ($inputData) {
        // lakukan pengulangan sebanyak data yang akan dimasukan
        for ($i = 1; $i <= $jdata; $i++) { 
            echo "
                    <p>Masukan data$i:
                        <input type='text' name='data$i'>
                    </p>
            "; // akhir echo
        } // akhir pengulangan
    } //akhir kondisi    
    ?>
            <p>
                <input type="submit" name="proses" value="proses">
            </p>
    </form>

</body>

</html>