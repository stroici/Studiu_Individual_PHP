<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Magazin Sportiv</title>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/admin.css">
</head>
<body>
    <div class="wrapper">
        <div class="register__overlay">
            <div class="register__form">
                <button class="register__form_closebutton" onclick="HideRegisterPanel()">×</button>
                <p class="register__form_title">Sign up</p>
                <form action="add_user.php" method="post">
                    <div class="register__form_double_inputs">
                        <input name="name" class="register__form_input" type="text" placeholder="Name...">
                        <input name="surname" class="register__form_input" type="text" placeholder="Surname...">
                    </div>
                    <input name="email" class="register__form_input" type="text" placeholder="Email...">
                    <input name="password" class="register__form_input" type="password" placeholder="Password...">
                    <input type='hidden' name='return' value="admin.php">
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
                    <input type='hidden' name='return' value="admin.php">
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
                        <a href="get_test.php" class="menu__link">Basket</a>
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
            <div class="main__body">
                <h2>Administrare Utilizatori</h2>
                <div class="main__data">
                    <div calss="data_grid">
                        <div class="data__header">
                            <p class="data__header_col">Name</p>
                            <p class="data__header_col">Surname</p>
                            <p class="data__header_col">Email</p>
                            <p class="data__header_col">Password</p>
                        </div>
                        <div class="elements__list">
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
                            echo "<button class='data_button' name='$row[0]' onclick='DataClick(this)'>";
                            echo "<form action='delete_user.php' method='post' class='data__row'>";
                            echo "<p>".$row[1]."</p><p>".$row[2]."</p><p>".$row[3]."</p><p>".$row[4]."</p>
                            <input type='hidden' name='id_a' value=".$row[0]."><input type='submit' value='Sterge'>";
                            echo "</form>";
                            echo "</button>";
                        }
                    }
                        //Incheierea conexiunii
                        $conn->close();
                        ?>
                        </div>
                    </div>
                    <div class="show__element">
                        <p class="show__elemet_title">User data</p>
                       <form action="#" class="show__form" method="post" id="show_form">
                           <div class="show__form_doubleinput">
                                 <input type="text" name="name" class="show__form_input" placeholder="Name...">
                                 <input type="text" name="surname" class="show__form_input" placeholder="Surname...">
                           </div>
                           <input type="text" name="email" class="show__form_input" placeholder="Email...">
                           <input type="text" name="password" class="show__form_input" placeholder="Password...">
                           <input type='hidden' name='id_a' value="0">
                           <input type='hidden' name='return' value="admin.php">
                            <input  onclick="Add_New_User()"  type="submit" class="show__form_button" value="Add new">
                            <div class="show__form_doubleinput">
                                <input onclick="Edit_User()" type="submit" class="show__form_button" value = "Update">
                                <input onclick="Delete_User()" type="submit" class="show__form_button" value="Delete">
                            </div>
                       </form>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
<script src='scripts/login_reg_script.js'></script>
<script>
    function DataClick(el){
       const dataArray = el.getElementsByTagName('p');
       const editContainer = document.querySelector('.show__element');
       const inputList = editContainer.getElementsByTagName('input');
       inputList[0].value = dataArray[0].innerHTML;
       inputList[1].value = dataArray[1].innerHTML;
       inputList[2].value = dataArray[2].innerHTML;
       inputList[3].value = dataArray[3].innerHTML;
       inputList[4].value = el.name;
    }
    function Add_New_User(){
        const form = document.getElementById('show_form');  
        form.action = "add_user.php"
    }
    function Edit_User(){
        const form = document.getElementById('show_form');  
        form.action = "edit_user.php"
    }
    function Delete_User(){
        const form = document.getElementById('show_form');  
        form.action = "delete_user.php"
    }
</script>
</html>