<?php
$con = mysql_connect("localhost","root","pwd");

if (!$con) {
  die('Could not connect: ' . mysql_error());
}

mysql_select_db("mbi", $con);

$q ="SELECT * FROM sensors";
if(isset($_GET["id"])) {
        if(is_numeric($_GET["id"])) {
                $id=$_GET["id"];
                $q="SELECT * FROM sensors WHERE id_local=" . $id . " order by ts desc";
        }
}


$sth = mysql_query($q);



$rows = array();
$rows['name'] = 'Aceleracao';
while($r = mysql_fetch_array($sth)) {
    echo $r['id_local'];
	echo ",";
    echo $r['IP'];
	echo ",";
    echo $r['millis'];
	echo ",";
    echo $r['ts'];
	echo ",";
    echo $r['s1'];
	echo ",";
    echo $r['s2'];
	echo ",";
    echo $r['s3'];
	echo ",";
    echo $r['s4'];
	echo ",";
    echo $r['s5'];
	echo ",";
    echo $r['s6'];
	echo ",";
    echo $r['s7'];
	echo ",";
    echo $r['s8'];
    echo "<br>";
}


mysql_close($con);
?>
