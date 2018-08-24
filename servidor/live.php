<?php

$con = mysql_connect("localhost","root","pwd");

if (!$con) {
  die('Could not connect: ' . mysql_error());
}

mysql_select_db("mbi", $con);


$sth = mysql_query("SELECT s1, DATE_FORMAT(ts, '%Y-%m%-%dT%H:%i:%s') as ts FROM sensors WHERE id_local=34 order by ts desc limit 10");

echo "<pre>Time, Consumo";
echo "\n";

$hourMin = date('Y-m-d');
$ss = date('s');
$mm = date('H:i');


while($r = mysql_fetch_array($sth)) {

    $X =  $r['s1'];
    $ts= $r['ts'];
    echo $ts . "Z," . $X . "\n";
    //echo $hourMin . "T" . $mm . ":" . $ss . "Z," . $X . "\n";
    echo "\n";
}


mysql_close($con);

echo "</pre>";


?>
