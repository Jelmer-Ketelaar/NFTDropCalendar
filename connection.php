<?php
$servername = "localhost";  // Confirm that this is correct
$username = "root";
$password = "";
$dbname = "nftdropcalendar_comnftdropcalendar";  // Ensure this is correct

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    error_log($e->getMessage());
    die("Connection failed: " . $e->getMessage());
}
?>
