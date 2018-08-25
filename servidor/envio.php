<?php

// Tue Feb 13 19:11:36 -02 2018
// Rafael

// Function to get the client ip address
function get_client_ip_server() {
    $ipaddress = '';
    if ($_SERVER['HTTP_CLIENT_IP'])
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if($_SERVER['HTTP_X_FORWARDED_FOR'])
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if($_SERVER['HTTP_X_FORWARDED'])
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if($_SERVER['HTTP_FORWARDED_FOR'])
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if($_SERVER['HTTP_FORWARDED'])
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if($_SERVER['REMOTE_ADDR'])
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
 
    return $ipaddress;
}

$servername = "localhost";
$username = "root";
$password = "pwd";
$dbname = "mbi";

echo ".";
//Uso
//http://robotica.ufscar.br/mon/insert.php?s1=1&s2=2&s3=3

//millis
//IP

if(!isset($_GET["leitura"])) 
	exit;

if(!isset($_GET["id"])) 
	exit;

echo "Variaves OK <br>";

if(!is_numeric($_GET["leitura"])) 
	exit;

if(!is_numeric($_GET["id"])) 
	exit;



echo "Numeric OK <br>";



//isnumeric_

$s1 = $_GET["leitura"];
$id = $_GET["id"];


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$IP = get_client_ip_server();
echo "IP = $IP <BR>";
$sql = "INSERT INTO sensors (IP, ts, id_local, s1) VALUES (\"$IP\", now(), $id, $s1)";

if (mysqli_query($conn, $sql)) {
    echo "Sucesso!";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
