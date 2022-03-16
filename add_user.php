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

$v1 = $_POST['name'];
$v2 = $_POST['surname'];
$v3 = $_POST['email'];
$v4 = $_POST['password'];
$return = $_POST['return'];
$conn->query("INSERT User(name, surname, email, password)
	VALUES('$v1','$v2','$v3','$v4')");
header("Location: $return");
exit();
//Incheierea conexiunii
$conn->close();
?>