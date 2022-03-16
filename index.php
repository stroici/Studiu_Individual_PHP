<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Magazin Sportiv</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <div class="wrapper">
        <div class="register__overlay">
            <div class="register__form">
                <button class="register__form_closebutton" onclick="HideRegisterPanel()">×</button>
                <p class="register__form_title">Sign up</p>
                <form action="add_user.php" method="post" style="visibility:collapsed;">
                    <div class="register__form_double_inputs">
                        <input name="name" class="register__form_input" type="text" placeholder="Name...">
                        <input name="surname" class="register__form_input" type="text" placeholder="Surname...">
                    </div>
                    <input name="email" class="register__form_input" type="text" placeholder="Email...">
                    <input name="password" class="register__form_input" type="password" placeholder="Password...">
                    <input type='hidden' name='return' value="index.php">
                    <input class="register__form_button" type="submit" value="Sign up">
                </form>
                <div class="register__form_to-register">
                    <p>Already have an account?</p><button class="register__form_to-register-button" onclick="GoToLogin()">Log in</button>
                </div>
                <p></p>
            </div>
        </div>
        <div class="login__overlay">
            <div class="login__form">
                <button class="login__form_closebutton" onclick="HideLoginPanel()">×</button>
                <p class="login__form_title">Log in</p>
                <form action="login">
                    <input class="login__form_input" type="text" placeholder="Email..." name="email">
                    <input class="login__form_input" type="password" placeholder="Password..." name="password">
                    <input type='hidden' name='return' value="index.php">
                    <input class="login__form_button" type="submit" value="Login">
                </form>
                <div class="login__form_to-register">
                    <p>Dont have an account?</p><button class="login__form_to-register-button" onclick="GoToRegister()">Sign up</button>
                </div>
                <p></p>
            </div>
        </div>
        <header class="header">
            <div class="header__top">
                <div class="header__top_body container">
                    <nav class="header__top_left menu">
                        <a href="index.php" class="menu__link">Home</a>
                        <a href="#" class="menu__link">Store</a>
                        <a href="admin.php" class="menu__link">Admin</a>
                    </nav>
                    <div class="header__top_logo">
                        <a class="logo" href="https://www.google.com/"></a>
                    </div>
                    <nav class="header__top_right menu">
                        <a href="#" class="menu__link">Basket</a>
                        <a href="#" class="cart"><img src="styles/img/cart.png" alt=":("><span class="cart__count">12</span></a>
                    </nav>
                </div>
            </div>
            <div class="header_bottom container">
                <div class="header__bottom_left menu-bottom">
                    <button class="menu-bottom__link signup" onclick="ShowrRegisterPanel()">Sign up</button>
                    <button class="menu-bottom__link login" onclick="ShowLoginPanel()">Log in</button>
                </div> 
                <div class="header__bottom_right menu-bottom">
                    <button href="#" class="menu-bottom__link username">User name</button>
                </div> 
            </div>
        </header>
        <main class="container main">
        <div>
            <h1>Lista tarilor introduse</h1>
            <table border=1>
                <tr class='row headrow'><td>Name</td><td>Surname</td><td>Email</td><td>Password</td><td></td></tr>
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
        } else {
        
        $result=$conn->query("SELECT * FROM User");
        while($row=$result->fetch_array()){
            echo "<form action='delete_user.php' method='post'>";
            echo "<tr class='row'><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td><td>
            <input type='hidden' name='id_a' value=".$row[0]."><input type='submit' value='Sterge'>
            </td></tr>";
            echo "</form>";
        }
        }
        //Incheierea conexiunii
        $conn->close();
        ?>
        </table>
        </div>
        </main>
    </div>
</body>
<script src='scripts/login_reg_script.js'></script>
<script>
    
</script>
</html>