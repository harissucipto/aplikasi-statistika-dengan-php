
    <h1>Aplikasi Statistikaa Sederhana</h1>

    <!-- banyak input datanya-->
    <from action="index.php" method="GET">
        <p>Jumlah Data
            <input type="text" name="jdata">
        </p>
        <p>
            <input type="submit" name="inputData" value="Masukan">
        </p>
    </from>

    <?
    // ambil nilai yang telah dikirim 
    $inputData = $_GET[inputData];
    $jdata = $_GET[jdata];

    if ($inputData) {
        echo $inputData;
    }       
    ?>