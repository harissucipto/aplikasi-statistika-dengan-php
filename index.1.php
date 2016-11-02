<!DOCTYPE html>
<html>

<head>
    <title>Aplikasi Statistika Sederhana</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/modif.css">
</head>

<body>
    <div class="container">
        <div class="jumbotron">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-center">
                        <h1>Aplikasi Statistika Sederhana</h1>
                    </div>
                </div>
                <div class="col-md-6 col-md-offset-3 text-center">
                    <h3>Dibuat Oleh:</h3>
                    <div class="row">
                        <div class="col-md-4 col-xs-4">
                            <div class="thumbnail">
                                <img src="images/profil1.jpg" class="img-circle small" width="150px">
                            </div>
                        </div>
                        <div class="col-md-4 col-xs-4">
                            <div class="thumbnail">
                                <img src="images/profil1.jpg" class="img-circle" width="150px">
                            </div>
                        </div>
                        <div class="col-md-4 col-xs-4">
                            <div class="thumbnail">
                                <img src="images/profil1.jpg" class="img-circle" width="150px">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="input" class="row">
            <div class="col-md-6 text-center">
                <h3>Masukan Input</h3>
                <?
                    $x = $_GET[jdata];


                ?>
                    <br>
                    <form class="form-horizontal" action="index.1.php" method="GET">
                        <div class="form-group form-group-lg">
                            <div class="col-xs-3 control-label" for="jdata">Jumlah Data</div>
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
                                <input class="form-control" type="submit" id="formGroupInputLarge" name="inputData">
                            </div>
                        </div>
                    </form>
                    <form class="form-horizontal" action="index.1.php" method="GET">
                        <?
                                    $inputData = $_GET[inputData];
                                    $jdata = $_GET[jdata];
                                    
                            if ($inputData && $jdata > 0) {
                                // lakukan pengulangan sebanyak data yang akan dimasukan
                                for ($i = 1; $i <= $jdata; $i++) { 
                                    echo "
                                            <div class='form-group form-group-lg'>
                                            <div class='col-xs-3 control-label' for='data$i'>Data ke $i</div>
                                            <div class='col-xs-9'>
                                            <input class='form-control' type='number' id='data$i'name='data$i'>
                                            </div>
                                            </div>
                                    "; // akhir echo
                                } // akhir pengulangan
                            } 
                            ?>

            </div>
            <div class="col-md-6 text-center ">
                <h3>Pilih Operasi</h3>
                <div class="row text-left">
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <div class='form-group form-group-lg'>
                                <div class='col-xs-4'>
                                    <input class='form-control' type='checkbox' id='mean' name='mean'>
                                </div>
                                <div class='col-xs-8 control-label' for='data$i'>
                                    <h3>Mean</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class='form-group form-group-lg'>
                                <div class='col-xs-4'>
                                    <input class='form-control' type='checkbox' id='mean' name='mean'>
                                </div>
                                <div class='col-xs-8 control-label' for='data$i'>
                                    <h3>Median</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class='form-group form-group-lg'>
                                <div class='col-xs-4'>
                                    <input class='form-control' type='checkbox' id='mean' name='mean'>
                                </div>
                                <div class='col-xs-8 control-label' for='data$i'>
                                    <h3>Modus</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class='form-group form-group-lg'>
                                <div class='col-xs-4'>
                                    <input class='form-control' type='checkbox' id='mean' name='mean'>
                                </div>
                                <div class='col-xs-8 control-label' for='data$i'>
                                    <h3>Varians</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class='form-group form-group-lg'>
                                <div class='col-xs-4'>
                                    <input class='form-control' type='checkbox' id='mean' name='mean'>
                                </div>
                                <div class='col-xs-8 control-label' for='data$i'>
                                    <h3>S. Baku</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class='form-group form-group-lg'>
                                <div class='col-xs-4'>
                                    <input class='form-control' type='checkbox' id='mean' name='mean'>
                                </div>
                                <div class='col-xs-8 control-label' for='data$i'>
                                    <h3>Srt-Asc</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class='form-group form-group-lg'>
                                <div class='col-xs-4'>
                                    <input class='form-control' type='checkbox' id='mean' name='mean'>
                                </div>
                                <div class='col-xs-8 control-label' for='data$i'>
                                    <h3>Srt-Dsc</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class='form-group form-group-lg'>
                                <div class='col-xs-4'>
                                    <input class='form-control' type='checkbox' id='mean' name='mean'>
                                </div>
                                <div class='col-xs-8 control-label' for='data$i'>
                                    <h3>Minimum</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class='form-group form-group-lg'>
                                <div class='col-xs-4'>
                                    <input class='form-control' type='checkbox' id='mean' name='mean'>
                                </div>
                                <div class='col-xs-8 control-label' for='data$i'>
                                    <h3>Maximum</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class='form-group form-group-lg'>
                                <div class='col-xs-4'>
                                    <input class='form-control' type='checkbox' id='mean' name='mean'>
                                </div>
                                <div class='col-xs-8 control-label' for='data$i'>
                                    <h3>Kuartil</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class='form-group form-group-lg'>
                                <div class='col-xs-4'>
                                    <input class='form-control' type='checkbox' id='mean' name='mean'>
                                </div>
                                <div class='col-xs-8 control-label' for='data$i'>
                                    <h3>Desil</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class='form-group form-group-lg'>
                                <div class='col-xs-4'>
                                    <input class='form-control' type='checkbox' id='mean' name='mean'>
                                </div>
                                <div class='col-xs-8 control-label' for='data$i'>
                                    <h3>Persentil</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class='form-group form-group-lg'>
                                <div class='col-xs-4'>
                                    <input class='form-control' type='checkbox' id='mean' name='mean'>
                                </div>
                                <div class='col-xs-8 control-label' for='data$i'>
                                    <h3>Grafik</h3>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class "row">
                        <input class="btn btn-primary btn-lg btn-block" type="submit" id="formGroupInputLarge" name="proses" value="PROSES">
                        </form>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>