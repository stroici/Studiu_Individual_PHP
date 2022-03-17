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
$v2 = $_POST['price'];
$v3 = $_POST['image'];
$v4 = $_POST['brand'];
$v5 = $_POST['category'];

$conn->query("INSERT Product(name,price,image,IdBrand,IdCategory)
	VALUES('$v1',$v2,'$v3',$v4, $v5)");
header("Location: products.php");
$conn->close();
?>
</body>

</html>