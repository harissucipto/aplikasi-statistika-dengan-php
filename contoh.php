<?
// setup jpgraph
date_default_timezone_set('UTC');
include_once ("src/jpgraph.php");
include_once ("src/jpgraph_line.php");

// setup database untuk data
/*
$conn = mysqli_connect('localhost', 'root', '12345678', 'data_grafik') or die(mysql_error());
$sql = "SELECT * FROM data_grafik";
$response= @mysqli_query($conn, $sql);
*/

$data = [1, 2, 3,5];
$leg = [2, 4, 8];
$x = 0;


/*
while($row = mysqli_fetch_array($response)) {
    $data[$x] = $row[0];
    $leg[$x] = $row[1];
    $x+= 1;
}

*/

$graph = new Graph(350,250,"auto");
$graph->SetScale('textint');
$graph->img->SetMargin(50,30,50,50);
$graph->SetShadow();
$graph->title->Set("JUMLAH BARANG LAKU TOKO HARIS SUCIPTO PER TAHUN 2016");
$graph->xaxis->SetTickLabels($leg);


$bplot = new LinePlot($data);
$bplot->value->Show();
$bplot->value->SetFont(FF_ARIAL,FS_BOLD);
$bplot->value->SetAngle(45);
$bplot->SetLegend("Banyak data");
$graph->Add($bplot);
$graph->Stroke();

?>