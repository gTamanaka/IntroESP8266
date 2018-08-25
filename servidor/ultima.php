
<?php
$con = mysql_connect("localhost","root","pwd");

if (!$con) {
  die('Could not connect: ' . mysql_error());
}

mysql_select_db("mbi", $con);


if(!isset($_GET["id"])) 
	exit;

if(!is_numeric($_GET["id"])) 
	exit;

$id=$_GET["id"];

$q="SELECT * FROM sensors WHERE id_local=" . $id . " order by ts desc limit 1";


$sth = mysql_query($q);

while($r = mysql_fetch_array($sth)) {
    echo $r['s1'];
/*
    echo $r['IP'];
    echo $r['id_local'];
    echo $r['ts'];
    echo $r['s2'];
    echo $r['s3'];
    echo $r['s4'];
    echo $r['s5'];
    echo $r['s6'];
    echo $r['s7'];
    echo $r['s8'];
*/
}


mysql_close($con);
?>

