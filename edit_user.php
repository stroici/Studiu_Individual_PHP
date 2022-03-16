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
$v1 = $_POST['name'];
$v2 = $_POST['surname'];
$v3 = $_POST['email'];
$v4 = $_POST['password'];
$conn->query("UPDATE User SET name = '$v1', surname = '$v2', email = '$v3', password = '$v4' WHERE Id=$id");
header("Location: admin.php");
exit();
//Incheierea conexiunii
$conn->close();
?>