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
$v2 = $_POST['price'];
$v3 = $_POST['image'];
$v4 = $_POST['brand'];
$v5 = $_POST['category'];

$conn->query("UPDATE Product SET name = '$v1', price = $v2, image = '$v3', IdBrand = $v4, IdCategory = $v5 WHERE Id=$id");
header("Location: products.php");
exit();
//Incheierea conexiunii
$conn->close();
?>