<!DOCTYPE html>
<html>

<head>
    <title>Aplikasi Statistika Sederhana</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/modif.css">
   
    <script src="js/jquery-1.11.1.min.js"></script>
</head>

<?php
include_once("harisStatistik.php");
$mean = $_GET[mean];
$median = $_GET[Median];
$modus = $_GET[Modus];
$varians = $_GET[Varians];
$simpanganbaku = $_GET[Simpangan];
$sortingAsc = $_GET[SrtAsc];
$sortingDsc = $_GET[SrtDsc];
$minimum = $_GET[Minimum];
$maksimum = $_GET[Maximum];
$kuartil = $_GET[Kuartil];
$desil = $_GET[Desil];
$desilKe = $_GET[nilaiDesil];
$persentil = $_GET[Persentil];
$persentilKe = $_GET[nilaiPersentil];
$grafik = $_GET[Grafik];

// setup this
$banyakData = $_GET[jdata];
$data;
//ambil perdata
$indexdata = 0;
for ($i = 1; $i <= $banyakData; $i++) {
    $data[$i] = $_GET["data$i"];
}

$dataTerurut;
$indexdata = 0;
for ($i = 1; $i <= $banyakData; $i++) {
    $dataTerurut[$indexdata] = $data[$i];
    $indexdata++;
}
sort($dataTerurut);

?>

    <body>
        <div class="container">
            <div class="jumbotron">
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-center">
                            <a href="index.php">
                                <h1 class="text-center">Aplikasi Statistika Sederhana</h1>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 col-md-offset-3 text-center">
                        <h3>Dibuat Oleh:</h3>
                        <div class="row">
                            <div class="col-md-4 col-xs-4">
                                <div class="thumbnail">
                                    <img src="images/AGUNG.PNG" class="img-circle small" width="150px">
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
                            <div class="form-group form-group-lg">
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
                                    
                            if ($jdata > 0) {
                                // lakukan pengulangan sebanyak data yang akan dimasukan
                                for ($i = 1; $i <= $jdata; $i++) { 
                                    echo "
                                            <div class='form-group form-group-lg'>
                                            <div class='col-xs-3 control-label' for='data$i'><h3 class='khusus' >Data ke $i</h3></div>
                                            <div class='col-xs-9'>
                                            <input class='form-control' type='number' id='data$i'name='data$i' value='$data[$i]'>
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
                                    
                            if ($jdata > 0) {
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
                                    <input class='form-control' type='checkbox' id='mean' name='mean'"; 
                                    if ($mean) {
                                        echo "checked";
                                    }
                                    echo ">
                                </div>
                                <div class='col-xs-8 control-label' for='data$i'>
                                    <h3>Mean</h3>
                                </div>
                            </div>
                        </div>
                        <div class='col-xs-12 col-sm-6 col-md-4'>
                            <div class='form-group form-group-lg'>
                                <div class='col-xs-4'>
                                    <input class='form-control' type='checkbox' id='Median' name='Median'";
                                    if ($median) {
                                        echo "checked";
                                    }
                                    echo ">
                                </div>
                                <div class='col-xs-8 control-label' for='data$i'>
                                    <h3>Median</h3>
                                </div>
                            </div>
                        </div>
                        <div class='col-xs-12 col-sm-6 col-md-4'>
                            <div class='form-group form-group-lg'>
                                <div class='col-xs-4'>
                                    <input class='form-control' type='checkbox' id='Modus' name='Modus'";
                                    if ($modus) {
                                        echo "checked";
                                    }
                                    echo ">
                                </div>
                                <div class='col-xs-8 control-label' for='data$i'>
                                    <h3>Modus</h3>
                                </div>
                            </div>
                        </div>
                        <div class='col-xs-12 col-sm-6 col-md-4'>
                            <div class='form-group form-group-lg'>
                                <div class='col-xs-4'>
                                    <input class='form-control' type='checkbox' id='Varians' name='Varians'";
                                    if ($varians) {
                                        echo "checked";
                                    }
                                    echo ">
                                </div>
                                <div class='col-xs-8 control-label' for='data$i'>
                                    <h3>Varians</h3>
                                </div>
                            </div>
                        </div>
                        <div class='col-xs-12 col-sm-6 col-md-4'>
                            <div class='form-group form-group-lg'>
                                <div class='col-xs-4'>
                                    <input class='form-control' type='checkbox' id='Simpangan' name='Simpangan'";
                                    if ($simpanganbaku) {
                                        echo "checked";
                                    }
                                    echo ">
                                </div>
                                <div class='col-xs-8 control-label' for='data$i'>
                                    <h3>S. Baku</h3>
                                </div>
                            </div>
                        </div>
                        <div class='col-xs-12 col-sm-6 col-md-4'>
                            <div class='form-group form-group-lg'>
                                <div class='col-xs-4'>
                                    <input class='form-control' type='checkbox' id='SrtAsc' name='SrtAsc'";
                                    if ($sortingAsc) {
                                        echo "checked";
                                    }
                                    echo ">
                                </div>
                                <div class='col-xs-8 control-label' for='data$i'>
                                    <h3>Srt-Asc</h3>
                                </div>
                            </div>
                        </div>
                        <div class='col-xs-12 col-sm-6 col-md-4'>
                            <div class='form-group form-group-lg'>
                                <div class='col-xs-4'>
                                    <input class='form-control' type='checkbox' id='SrtDsc' name='SrtDsc'";
                                    if ($sortingDsc) {
                                        echo "checked";
                                    }
                                    echo ">
                                </div>
                                <div class='col-xs-8 control-label' for='data$i'>
                                    <h3>Srt-Dsc</h3>
                                </div>
                            </div>
                        </div>
                        <div class='col-xs-12 col-sm-6 col-md-4'>
                            <div class='form-group form-group-lg'>
                                <div class='col-xs-4'>
                                    <input class='form-control' type='checkbox' id='mean' name='Minimum'";
                                    if ($minimum) {
                                        echo "checked";
                                    }
                                    echo ">
                                </div>
                                <div class='col-xs-8 control-label' for='data$i'>
                                    <h3>Minimum</h3>
                                </div>
                            </div>
                        </div>
                        <div class='col-xs-12 col-sm-6 col-md-4'>
                            <div class='form-group form-group-lg'>
                                <div class='col-xs-4'>
                                    <input class='form-control' type='checkbox' id='mean' name='Maximum'";
                                    if ($maksimum) {
                                        echo "checked";
                                    }
                                    echo ">
                                </div>
                                <div class='col-xs-8 control-label' for='data$i'>
                                    <h3>Maximum</h3>
                                </div>
                            </div>
                        </div>
                        <div class='col-xs-12 col-sm-6 col-md-4'>
                            <div class='form-group form-group-lg'>
                                <div class='col-xs-4'>
                                    <input class='form-control' type='checkbox' id='mean' name='Kuartil'";
                                    if ($kuartil) {
                                        echo "checked";
                                    }
                                    echo ">
                                </div>
                                <div class='col-xs-8 control-label' for='data$i'>
                                    <h3>Kuartil</h3>
                                </div>
                            </div>
                        </div>
                        <div class='col-xs-12 col-sm-6 col-md-4'>
                            <div class='form-group form-group-lg'>
                                <div class='col-xs-4'>
                                    <input class='form-control' type='checkbox' id='mean' name='Grafik'";
                                    if ($grafik) {
                                        echo "checked";
                                    }
                                    echo ">
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
                                    <input class='form-control' type='checkbox' id='mean' name='Desil'";
                                    if ($desil) {
                                        echo "checked";
                                    }
                                    echo ">
                                </div>
                                <div class='col-xs-4 control-label' for='data$i'>
                                    <h3>Desil Ke: </h3>
                                </div>
                                <div class='col-xs-4'>
                                    <input class='form-control' type='number' id='mean' name='nilaiDesil' value='". $desilKe ."'>
                                </div>
                            </div>
                        </div>
                        <div class='col-xs-12 col-sm-6 col-md-6'>
                            <div class='form-group form-group-lg'>
                                <div class='col-xs-4'>
                                    <input class='form-control' type='checkbox' id='mean' name='Persentil'";
                                    if ($persentil) {
                                        echo "checked";
                                    }
                                    echo ">
                                </div>
                                <div class='col-xs-4 control-label' for='data$i'>
                                    <h3>Prsntil Ke: </h3>
                                </div>
                                <div class='col-xs-4'>
                                    <input class='form-control' type='number' id='mean' name='nilaiPersentil' value='". $persentilKe ."'>
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
            <div class="container jumbotron">
                <div id="jawaban">
                    <div class="row text-center">
                        <h2>HASIL : </h2>
                        <hr>
                    </div>
                    <div class="row text-left">
                        <div class="col-md-8 col-md-offset-2">
                            <?
                                    if ($varians) {
                                        echo "
                                        <div class='col-md-12'>
                                                <div class='col-xs-4'>
                                                        <h3>Varian: </h3>
                                                </div>
                                                <div class='col-xs-8'>
                                                    <h3>" . number_format(hitungVarians($dataTerurut), 2) . "</h3>
                                                </div>
                                            </div>";
                                    }

                                   if ($simpanganbaku) {
                                    echo "
                                    <div class='col-md-12'>
                                            <div class='col-xs-4'>
                                                    <h3>S.Baku:</h3>
                                            </div>
                                            <div class='col-xs-8'>
                                                <h3>" . number_format(hitungSimpanganBaku($dataTerurut), 2) . "</h3>
                                            </div>
                                        </div>";
                                }

                                 if ($median) {
                                    echo "
                                    <div class='col-md-12'>
                                            <div class='col-xs-4'>
                                                    <h3>Median: </h3>
                                            </div>
                                            <div class='col-xs-8'>
                                                <h3>" . number_format(hitungMedian($dataTerurut), 2) . "</h3>
                                            </div>
                                        </div>";
                                }

                                    if ($minimum) {
                                        echo "
                                        <div class='col-md-12'>
                                                <div class='col-xs-4'>
                                                        <h3>Min: </h3>
                                                </div>
                                                <div class='col-xs-8'>
                                                    <h3>" . number_format(hitungMinum($dataTerurut), 2) . "</h3>
                                                </div>
                                            </div>";
                                    }
                                    if ($maksimum) {
                                        echo "
                                        <div class='col-md-12'>
                                                <div class='col-xs-4'>
                                                        <h3>Max: </h3>
                                                </div>
                                                <div class='col-xs-8'>
                                                    <h3>" . number_format(hitungMaximum($dataTerurut), 2) . "</h3>
                                                </div>
                                            </div>";
                                    }


                                    if ($mean) {
                                        echo "
                                        <div class='col-md-12'>
                                                <div class='col-xs-4'>
                                                        <h3>Mean: </h3>
                                                </div>
                                                <div class='col-xs-8'>
                                                    <h3>" . number_format(hitungMean($dataTerurut), 2) . "</h3>
                                                </div>
                                            </div>";
                                    }

                                    if ($desil) {
                                    echo "
                                    <div class='col-md-12'>
                                            <div class='col-xs-4'>
                                                    <h3 class='text-left'>Desil ke $desilKe: </h3>
                                            </div>
                                            <div class='col-xs-8'>
                                                <h3 class='text-left'>" . number_format(hitungDesil($dataTerurut, $desilKe), 2) . "</h3>
                                            </div>
                                        </div>";
                                }


                                  if ($persentil) {
                                    echo "
                                    <div class='col-md-12'>
                                            <div class='col-xs-4'>
                                                    <h3 class='text-left'>Persentil ke $persentilKe: </h3>
                                            </div>
                                            <div class='col-xs-8'>
                                                <h3 class='text-left'>" . number_format(hitungPersentil($dataTerurut, $persentilKe), 2) . "</h3>
                                            </div>
                                        </div>";
                                }
                                if ($kuartil) { echo "
                                <div class='col-md-12'>
                                    <div class='col-xs-4'>
                                        <h3 class='text-left'>Kuartil: </h3>
                                    </div>
                                    <div class='col-xs-8'>
                                        <h3 class='text-left'>" . cetakQuartil(hitungKuartil($dataTerurut)) . "</h3>
                                    </div>
                                </div>"; }

                                if ($modus) {
                                    echo "
                                    <div class='col-md-12'>
                                            <div class='col-xs-4'>
                                                    <h3>Modus: </h3>
                                            </div>
                                            <div class='col-xs-8'>
                                                <h3 class='text-left'>" . arrayKeKalimat(hitungModus($dataTerurut)) . "</h3>
                                            </div>
                                        </div>";
                                }
                                if ($sortingAsc) {
                                    echo "
                                    <div class='col-md-12'>
                                            <div class='col-xs-4'>
                                                    <h3>Srt-Asc:</h3>
                                            </div>
                                            <div class='col-xs-8'>
                                                <h3 class='text-left'>" . arrayKeKalimat(hitungSortAsc($dataTerurut)) . "</h3>
                                            </div>
                                        </div>";
                                }
                                if ($sortingDsc) {
                                    echo "
                                    <div class='col-md-12'>
                                            <div class='col-xs-4'>
                                                    <h3>Srt-Dsc:</h3>
                                            </div>
                                            <div class='col-xs-8'>
                                                <h3 class='text-left'>" . arrayKeKalimat(hitungSortDsc($dataTerurut)) . "</h3>
                                            </div>
                                        </div>";
                                }

                                ?>

                        </div>
                    </div>
                    <div id="jawaban">
                    <div class="row text-center">
                    <div class="col-md-12">
                    <?
                        if ($grafik) {
                            echo " <div class='row text-center'>
                                    <hr>
                                    <h2>GRAFIK : </h2>
                                    </div>";
                        }
                    ?>  
                    </div> 
                        <?php
                        if ($grafik) {
                            include('createjpgraph.php');
                            GenGraph($dataTerurut);

                            echo "<img src='images/file.jpg'>";
                        }
                        
                        ?>
                        
                    </div>
                </div>
            </div>
        </div>
    </body>

</html>