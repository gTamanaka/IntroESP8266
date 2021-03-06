<?php

$servername = "localhost";
$username = "root";
$password = "pwd";
$dbname = "mbi";

if(!isset($_GET["id"])) {
	echo "Escolha um ID. Exemplo: ";
	echo "<br><br><a href=http://200.133.229.248/MBI/index.php?id=10>http://200.133.229.248/MBI/index.php?id=10</a>";
        exit;
}

if(!is_numeric($_GET["id"])) {
	echo "O ID deve ser numerico";
        exit;
}

$id=$_GET["id"];

$date = new DateTime();
$t=date_format($date, 'Y-m-d H:i:s');
//$f="2018-01-21 00:00:00";
$f=date('Y-m-d H:i:s', strtotime('-5 minutes'));

$url = "data.php?id=$id&from=$f&to=$t";

if(isset($_GET["from"])) { 
	if(isset($_GET["to"]))  {
		$f = $_GET["from"];
		$t = $_GET["to"];
		$url = "data.php?id=$id&from=$f&to=$t";
	}
}


?>

<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Monitoramento UFSCar</title>

		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		<script type="text/javascript">
$(function () {
    var chart;
    $(document).ready(function() {
        $.getJSON("<?php echo $url; ?>", function(json) {
	    
		    chart = new Highcharts.Chart({
	            chart: {
	                renderTo: 'container',
	                type: 'line',
	                marginRight: 130,
	                marginBottom: 25
	            },
	            title: {
	                text: 'Monitoramento IOT UFSCar',
	                x: -20 //center
	            },
	            subtitle: {
	                text: '',
	                x: -20
	            },
	            xAxis: {
	                categories: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12']
	            },
	            yAxis: {
	                title: {
	                    text: 'Leitura'
	                },
	                plotLines: [{
	                    value: 0,
	                    width: 1,
	                    color: '#808080'
	                }]
	            },
	            tooltip: {
	                formatter: function() {
	                        return '<b>'+ this.series.name +'</b><br/>'+
	                        this.x +': '+ this.y;
	                }
	            },
	            legend: {
	                layout: 'vertical',
	                align: 'right',
	                verticalAlign: 'top',
	                x: -10,
	                y: 100,
	                borderWidth: 0
	            },
	            series: json
	        });
	    });
    
    });
    
});
		</script>
	</head>
	<body>
  <script src="http://code.highcharts.com/highcharts.js"></script>
  <script src="http://code.highcharts.com/modules/exporting.js"></script>

<div id="container" style="min-width: 400px; height: 400px; margin: 0 auto"></div>

<br>
<form action=index.php>
<center>
Filtro: de <input type=text name=from value="<?php echo $f;?>"> até <input type=text name=to value="<?php echo $t;?>">
<input type=hidden name=id value="<?php echo $id;?>">

<input type=submit value="Filtrar">
</form>

<br>
<a href=http://200.133.229.248/MBI/index.php?id=<?php echo $id;?>>Reset</a>
<form action=index.php>

</form>
<hr>
<br>
<center>
<a href=index.php?id=<?php echo $id;?>>Historico</a> |<a href=tr.php?id=<?php echo $id;?>>Tempo real</a> | <a href=csv.php?id=<?php echo $id;?>>Exportar</a>
	</body>
</html>
