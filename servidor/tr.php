
<head>
  <meta http-equiv="refresh" content="1">
</head>

<?php
$con = mysql_connect("localhost","root","pwd");

if (!$con) {
  die('Could not connect: ' . mysql_error());
}

mysql_select_db("mbi", $con);


$q = "SELECT * FROM sensors order by ts desc limit 10";
if(isset($_GET["id"])) {
	if(is_numeric($_GET["id"])) {
		$id=$_GET["id"];
		echo "<center>Filtro por ID = $id</center>";
		$q="SELECT * FROM sensors WHERE id_local=" . $id . " order by ts desc limit 10";
	}
}


$sth = mysql_query($q);

$rows = array();
$rows['name'] = 'Aceleracao';
echo "<center>";
echo "<table border=1>";
echo "<tr><td>IP</td><td>ID</td><td>Data e hora</td><td>S1</td><td>S2</td>";
echo "<td>S3</td><td>S4</td>";
echo "<td>S5</td><td>S6</td>";
echo "<td>S7</td><td>S8</td></tr>";
while($r = mysql_fetch_array($sth)) {
	echo "<tr>";
	echo "<td>";
    echo $r['IP'];
	echo "</td><td>";
    echo $r['id_local'];
	echo "</td><td>";
    echo $r['ts'];
	echo "</td><td>";
    echo $r['s1'];
	echo "</td><td>";
    echo $r['s2'];
	echo "</td><td>";
    echo $r['s3'];
	echo "</td><td>";
    echo $r['s4'];
	echo "</td><td>";
    echo $r['s5'];
	echo "</td><td>";
    echo $r['s6'];
	echo "</td><td>";
    echo $r['s7'];
	echo "</td><td>";
    echo $r['s8'];
	echo "</td>";
	echo "</tr>";
}


mysql_close($con);
?>

</table>

<hr>
<br>
<center>
<a href=index.php?id=<?php echo $id;?>>Historico</a> |<a href=tr.php?id=<?php echo $id;?>>Tempo real</a> | <a href=csv.php?id=<?php echo $id;?>>Exportar</a>

	</body>
</html>
