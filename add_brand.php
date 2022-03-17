<html>
<body>
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

$conn->query("INSERT Brand(name)
	VALUES('$v1')");
header("Location: brands.php");
$conn->close();
?>
</body>

</html>