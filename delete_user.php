<?php
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "sportstore";

// Crearea conexiunii
$conn = new mysqli($servername, $username, $password, $db_name);

// Verificarea conexiunii
if ($conn->connect_error) {
  die("Conexiunea esuata: " . $conn->connect_error);
}

$id = $_POST['id_a'];
$conn->query("DELETE FROM User WHERE Id=$id");
header("Location: admin.php");
exit();
//Incheierea conexiunii
$conn->close();
?>