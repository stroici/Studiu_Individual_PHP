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
$v2 = $_POST['surname'];
$v3 = $_POST['email'];
$v4 = $_POST['password'];
$return = $_POST['return'];
$conn->query("INSERT User(name, surname, email, password)
	VALUES('$v1','$v2','$v3','$v4')");

$result = mysqli_query($conn, "SELECT *  FROM `User` where email = '$v3' and password = '$v4'");
$row = mysqli_fetch_array($result);

  echo "<script>
  localStorage.setItem('isLogin', '0');
  localStorage.setItem('userId', '$row[0]');
  localStorage.setItem('userName', '$row[1]');
  localStorage.setItem('userSurname', '$row[2]');
  localStorage.setItem('userEmail', '$row[3]');
  localStorage.setItem('userPassword', '$row[4]');
  console.log('executed');</script>";

  
  echo "<script>window.location.href = '$return';</script>";
//Incheierea conexiunii
$conn->close();
?>
</body>

</html>