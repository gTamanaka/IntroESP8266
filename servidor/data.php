<?php
$con = mysql_connect("localhost","root","pwd");

if (!$con) {
  die('Could not connect: ' . mysql_error());
}

mysql_select_db("mbi", $con);

$servername = "localhost";
$username = "root";
$password = "pwd";
$dbname = "mbi";

if(!isset($_GET["id"])) {
        exit;
}

if(!is_numeric($_GET["id"])) {
        exit;
}

$id=$_GET["id"];


$W = "WHERE 1=1 AND id_local=$id";
$from = $_GET["from"];
$to = $_GET["to"];
if(isset($_GET["from"])) {
        if(isset($_GET["to"]))  {
		$W = "WHERE ts <= \"$to\" AND ts >= \"$from\" AND id_local=$id";
        }
}


$sth = mysql_query("SELECT s1 FROM sensors $W");
$rows = array();
$rows['name'] = 'Leitura';
while($r = mysql_fetch_array($sth)) {
    $rows['data'][] = $r['s1'];
}


$result = array();
array_push($result,$rows);


print json_encode($result, JSON_NUMERIC_CHECK);

mysql_close($con);
?>
