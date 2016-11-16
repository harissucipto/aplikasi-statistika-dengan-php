<!DOCTYPE html>
<html>

<head>
    <title>Aplikasi Statistika Sederhana</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/modif.css">
    <script src="js/jquery-1.11.1.min.js"></script>
</head>

<body>
    <div class="container">
        <div id="header" class="jumbotron">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-center">
                        <a href="index.php">
                            <h1 class="warna">Aplikasi Statistika Sederhana</h1>
                        </a>
                    </div>
                </div>
                <div class="col-md-6 col-md-offset-3 text-center">
                    <h3>Dibuat Oleh:</h3>
                    <div class="row">
                        <div class="col-md-4 col-xs-4">
                            <div class="thumbnail">
                                <img src="images/AGUNG.png" class="img-circle small" width="150px">
                            </div>
                        </div>
                        <div class="col-md-4 col-xs-4">
                            <div class="thumbnail">
                                <img src="images/HARIS.PNG" class="img-circle" width="150px">
                            </div>
                        </div>
                        <div class="col-md-4 col-xs-4">
                            <div class="thumbnail">
                                <img src="images/MEFPRI.PNG" class="img-circle" width="150px">
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
            </div>
        </div>
        <div class='row text-center'>
            <h3>BANYAK DATA YANG DIBUTUHKAN : </h3>

        </div>
        <div id="input" class="row">
            <div class="col-md-11 text-center">
                <?
                    $x = $_GET[jdata];


                ?>
                    <br>
                    <form class="form-horizontal" action="index.php#input" method="GET">
                        <div id="kedua" class="form-group form-group-lg">
                            <div class="col-xs-3 control-label" for="jdata">
                                <h3 class='khusus'>Jumlah Data</h3>
                            </div>
                            <div class="col-xs-6">
                                <?
                                    if ($x) {
                                         echo "<input class='form-control' type='number' id='jdata' name='jdata' value='$x'>";
                                    } else {
                                        echo "<input class='form-control' type='number' id='jdata' name='jdata' placeholder='Masukan Banyak Data'>";
                                    }
                                ?>
                            </div>
                            <div class="col-xs-3">
                                <input class="btn btn-default btn-primary btn-lg btn-block" type="submit" id="formGroupInputLarge" value='OK' name="inputData">
                            </div>
                        </div>
                    </form>
                    <form class="form-horizontal" action="proses.php#jawaban" method="GET">
                        <?
                                    $inputData = $_GET[inputData];
                                    $jdata = $_GET[jdata];
                                    echo "
                                        <input type='hidden' name='jdata' value='$jdata'>
                                    ";
                                    
                            if ($inputData && $jdata > 0) {
                                // lakukan pengulangan sebanyak data yang akan dimasukan
                                for ($i = 1; $i <= $jdata; $i++) { 
                                    echo "
                                            <div class='form-group form-group-lg'>
                                            <div class='col-xs-3 control-label' for='data$i'><h3 class='khusus' >Data ke $i</h3></div>
                                            <div class='col-xs-9'>
                                            <input class='form-control' type='number' id='data$i'name='data$i'>
                                            </div>
                                            </div>
                                    "; // akhir echo
                                } // akhir pengulangan
                            } 
                            ?>

            </div>
            <div>
                <?
                                    $inputData = $_GET[inputData];
                                    $jdata = $_GET[jdata];
                                    
                            if ($inputData && $jdata > 0) {
                                // lakukan pengulangan sebanyak data yang akan dimasukan
                                    echo "
        <div class='row'>
            <div class='col-xs-8 col-xs-offset-2 text-center '>
                <div class='row text-center'>
                        <h2>PILIH OPERASI : </h2><hr>
                </div>
                <div class='row text-left'>
                    <div class='col-xs-12'>
                        <div class='col-xs-12 col-sm-6 col-md-4'>
                            <div class='form-group form-group-lg'>
                                <div class='col-xs-4'>
                                    <input class='form-control' type='checkbox' id='mean' name='mean'>
                                </div>
                                <div class='col-xs-8 control-label' for='data$i'>
                                    <h3>Mean</h3>
                                </div>
                            </div>
                        </div>
                        <div class='col-xs-12 col-sm-6 col-md-4'>
                            <div class='form-group form-group-lg'>
                                <div class='col-xs-4'>
                                    <input class='form-control' type='checkbox' id='Median' name='Median'>
                                </div>
                                <div class='col-xs-8 control-label' for='data$i'>
                                    <h3>Median</h3>
                                </div>
                            </div>
                        </div>
                        <div class='col-xs-12 col-sm-6 col-md-4'>
                            <div class='form-group form-group-lg'>
                                <div class='col-xs-4'>
                                    <input class='form-control' type='checkbox' id='Modus' name='Modus'>
                                </div>
                                <div class='col-xs-8 control-label' for='data$i'>
                                    <h3>Modus</h3>
                                </div>
                            </div>
                        </div>
                        <div class='col-xs-12 col-sm-6 col-md-4'>
                            <div class='form-group form-group-lg'>
                                <div class='col-xs-4'>
                                    <input class='form-control' type='checkbox' id='Varians' name='Varians'>
                                </div>
                                <div class='col-xs-8 control-label' for='data$i'>
                                    <h3>Varians</h3>
                                </div>
                            </div>
                        </div>
                        <div class='col-xs-12 col-sm-6 col-md-4'>
                            <div class='form-group form-group-lg'>
                                <div class='col-xs-4'>
                                    <input class='form-control' type='checkbox' id='Simpangan' name='Simpangan'>
                                </div>
                                <div class='col-xs-8 control-label' for='data$i'>
                                    <h3>S. Baku</h3>
                                </div>
                            </div>
                        </div>
                        <div class='col-xs-12 col-sm-6 col-md-4'>
                            <div class='form-group form-group-lg'>
                                <div class='col-xs-4'>
                                    <input class='form-control' type='checkbox' id='SrtAsc' name='SrtAsc'>
                                </div>
                                <div class='col-xs-8 control-label' for='data$i'>
                                    <h3>Srt-Asc</h3>
                                </div>
                            </div>
                        </div>
                        <div class='col-xs-12 col-sm-6 col-md-4'>
                            <div class='form-group form-group-lg'>
                                <div class='col-xs-4'>
                                    <input class='form-control' type='checkbox' id='SrtDsc' name='SrtDsc'>
                                </div>
                                <div class='col-xs-8 control-label' for='data$i'>
                                    <h3>Srt-Dsc</h3>
                                </div>
                            </div>
                        </div>
                        <div class='col-xs-12 col-sm-6 col-md-4'>
                            <div class='form-group form-group-lg'>
                                <div class='col-xs-4'>
                                    <input class='form-control' type='checkbox' id='mean' name='Minimum'>
                                </div>
                                <div class='col-xs-8 control-label' for='data$i'>
                                    <h3>Minimum</h3>
                                </div>
                            </div>
                        </div>
                        <div class='col-xs-12 col-sm-6 col-md-4'>
                            <div class='form-group form-group-lg'>
                                <div class='col-xs-4'>
                                    <input class='form-control' type='checkbox' id='mean' name='Maximum'>
                                </div>
                                <div class='col-xs-8 control-label' for='data$i'>
                                    <h3>Maximum</h3>
                                </div>
                            </div>
                        </div>
                        <div class='col-xs-12 col-sm-6 col-md-4'>
                            <div class='form-group form-group-lg'>
                                <div class='col-xs-4'>
                                    <input class='form-control' type='checkbox' id='mean' name='Kuartil'>
                                </div>
                                <div class='col-xs-8 control-label' for='data$i'>
                                    <h3>Kuartil</h3>
                                </div>
                            </div>
                        </div>
                        <div class='col-xs-12 col-sm-6 col-md-4'>
                            <div class='form-group form-group-lg'>
                                <div class='col-xs-4'>
                                    <input class='form-control' type='checkbox' id='mean' name='Grafik'>
                                </div>
                                <div class='col-xs-8 control-label' for='data$i'>
                                    <h3>Grafik</h3>
                                </div>
                            </div>
                        </div>
                        </div>
                        </div>
                        <hr>
                        <div class='col-xs-12 col-sm-6 col-md-6'>
                            <div class='form-group form-group-lg'>
                                <div class='col-xs-4'>
                                    <input class='form-control' type='checkbox' id='mean' name='Desil'>
                                </div>
                                <div class='col-xs-4 control-label' for='data$i'>
                                    <h3>Desil Ke: </h3>
                                </div>
                                <div class='col-xs-4'>
                                    <input class='form-control' type='number' id='mean' name='nilaiDesil'>
                                </div>
                            </div>
                        </div>
                        <div class='col-xs-12 col-sm-6 col-md-6'>
                            <div class='form-group form-group-lg'>
                                <div class='col-xs-4'>
                                    <input class='form-control' type='checkbox' id='mean' name='Persentil'>
                                </div>
                                <div class='col-xs-4 control-label' for='data$i'>
                                    <h3>Prsntil Ke: </h3>
                                </div>
                                <div class='col-xs-4'>
                                    <input class='form-control' type='number' id='mean' name='nilaiPersentil'>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class 'row'>
                        <input class='btn btn-primary btn-lg btn-block' type='submit' id='formGroupInputLarge' name='proses' value='PROSES'>
                        </form>
                    </div>
            </div>
            </div>";
                                    
                            };

                                ?>

            </div>
        </div>
</body>

</html>