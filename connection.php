<?php
$servername = "nftdropcalendar.info.mysql";
$username = "nftdropcalendar_infonftdropcalendar";
$password = "wwW3B?m^Q@Fx4Y";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

try {
    $conn = new PDO("mysql:host=$servername;dbname=nftdropcalendar_infonftdropcalendar", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Please contact the makers of this website with is error: " . $e->getMessage();
}
