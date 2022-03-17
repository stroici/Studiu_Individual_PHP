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

$v1 = $_POST['email'];
$v2 = $_POST['password'];
$return = $_POST['return'];

$result = mysqli_query($conn, "SELECT COUNT(*) AS `count` FROM `User` where email = '$v1' and password = '$v2'");
$row = mysqli_fetch_array($result);
$count = $row['count'];
if($count > 0){
  $result = mysqli_query($conn, "SELECT *  FROM `User` where email = '$v1' and password = '$v2'");
  $row = mysqli_fetch_array($result);
  echo 
  "<script>
    localStorage.setItem('isLogin', '0');
    localStorage.setItem('userId', '$row[0]');
    localStorage.setItem('userName', '$row[1]');
    localStorage.setItem('userSurname', '$row[2]');
    localStorage.setItem('userEmail', '$row[3]');
    localStorage.setItem('userPassword', '$row[4]');
    console.log('executed');
  </script>";
}
else {
  echo 
  "<script>
    localStorage.setItem('isLogin', '1');
    localStorage.setItem('userId', null);
    localStorage.setItem('userName', null);
    localStorage.setItem('userSurname', null);
    localStorage.setItem('userEmail', 'null');
    localStorage.setItem('userPassword', 'null');
    console.log('executed');
  </script>";
}
//Incheierea conexiunii
$conn->close();
?>
</body>
<script>
  window.location.href = "index.php";
</script>
</html>