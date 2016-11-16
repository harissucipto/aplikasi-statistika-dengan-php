<?php

function GenGraph($datanya) {
    date_default_timezone_set('UTC');
    include_once("harisStatistik.php");
    include_once ("src/jpgraph.php");
    include_once ("src/jpgraph_line.php");

    $datak =  HitungPerkelasG($datanya);


    $data = $datak[1];
    $leg = $datak[0];
    $x = 0;



    $graph = new Graph(1000, 400,"auto");
    $graph->SetScale('textint');
    $graph->img->SetMargin(50,30,50,50);
    $graph->SetShadow();
    $graph->title->Set("GRAFIK BANYAK DATA YANG DIINPUT");
    $graph->xaxis->SetTickLabels($leg);


    $bplot = new LinePlot($data);
    $bplot->value->Show();
    $bplot->value->SetFont(FF_ARIAL,FS_BOLD, 80);
    $bplot->value->SetAngle(45);
    $bplot->SetLegend("Banyak data");
    $graph->Add($bplot);
    @unlink("./images/file.jpg");
    $graph->Stroke("./images/file.jpg");

}


?>