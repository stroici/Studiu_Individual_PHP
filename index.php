<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Magazin Sportiv</title>
    <link rel="stylesheet" href="styles/style.css">
    <style>
        .menu__link{
            color: #fff;
            font-size: 16px;
            text-decoration: none;
            font-weight: 700;
            padding: 5px 12px;
            border-radius: 10px;
            margin: 10px;
            background-color: transparent;
            cursor: pointer;
            border: none;
        }
        .menu__link:hover {
            background-color: #006a75;
        }
        .produscts__container{
            display: flex;
            flex-wrap: wrap;
            justify-content:space-between;
        }
        .product__item{
            width:250px;
            height:350px;
            border: 3px solid #009fb0;
            border-radius: 3px 30px 3px 20px;
            margin-bottom:20px;
        }
        .product__item>img{
            width:230px;
            height:230px;
            margin: 10px;
        }
        .product__item_brand{
          color:#888;
          font-weight:700;
          margin-left:10px;
        }
        .product__item_title{
            margin:3px 10px 0px 10px;
            font-size:18px;
            font-weight:700;
            color:#006a75;
        }
        .product__item_price_container{
            margin: 10px;
            display: flex;
            justify-content:space-between;
        }
        .product__item_category{
            color: #777;
        }
        .product__item_price{
            color: #3ea12d;
            font-size:18px;
            font-weight:700;
        }
    </style>
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
                    <p>Already have an account?</p><button class="register__form_to-register-button" onclick="GoToLogin(this)">Log in</button>
                </div>
                <p></p>
            </div>
        </div>
        <div class="login__overlay">
            <div class="login__form">
                <button class="login__form_closebutton" onclick="HideLoginPanel()">×</button>
                <p class="login__form_title">Log in</p>
                <form action="login.php" method="post">
                    <input class="login__form_input" type="text" placeholder="Email..." name="email">
                    <input class="login__form_input" type="password" placeholder="Password..." name="password">
                    <input type='hidden' name='return' value="index.php">
                    <input class="login__form_button" type="submit" onclick="Login_Click(event)" value="Login">
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
                        <a href="index.php" class="menu__link">Store</a>
                        <a href="admin.php" class="menu__link" id="adminpage">Admin</a>
                    </nav>
                    <div class="header__top_logo">
                        <a class="logo" href="https://www.google.com/"></a>
                    </div>
                    <nav class="header__top_right menu">
                        <button class="menu__link" id="menu__link_users" onclick="Go_Users()">Users</button>
                        <button class="menu__link" id="menu__link_products" onclick="Go_Products()">Products</button>
                        <button class="menu__link" id="menu__link_brands" onclick="Go_Brands()">Brands</button>
                        <button class="menu__link" id="menu__link_categories" onclick="Go_Categories()">Categories</button>
                    </nav>
                </div>
            </div>
            <div class="header_bottom container">
                <div class="header__bottom_left menu-bottom">
                    <button class="menu-bottom__link signup" onclick="ShowrRegisterPanel()">Sign up</button>
                    <button class="menu-bottom__link login" onclick="ShowLoginPanel()">Log in</button>
                </div> 
                <div class="header__bottom_right menu-bottom">
                    <button href="#" class="menu-bottom__link username" id="username">User name</button>
                </div> 
            </div>
        </header>
        <main class="container main">
        <h2 style="margin-bottom:20px; color:#888;">Pentru a putea modifica datele logati-va</h2>
        <div class="produscts__container">
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
        
            $result=$conn->query('SELECT product.Name, product.Price, product.Image, brand.Name as Brand_Name, category.Name as Category_Name FROM product JOIN brand ON product.IdBrand = brand.Id JOIN category ON product.IdCategory = category.Id');
            while($row=$result->fetch_array()){
                echo "
                <div class='product__item'>
                    <p class='product__item_brand'>$row[3]</p>
                    <img src='img/$row[2]'></img>
                    <p class='product__item_title'>$row[0]</p>
                    <div class='product__item_price_container'>
                        <p class='product__item_category'>$row[4]</p>
                        <p class='product__item_price'>$row[1] MDL</p>
                    </div>
                </div>
                ";
             }
        }
        //Incheierea conexiunii
        $conn->close();
        ?>
        </div>
    </main>
    </div>
</body>
<script src='scripts/login_reg_script.js'></script>
<script>function Go_Users() {
    window.location.href = 'admin.php';
}
function Go_Products() {
    window.location.href = 'products.php';
}
function Go_Brands() {
    window.location.href = 'brands.php';
}
function Go_Categories() {
    window.location.href = 'categories.php';
}
if (userId == 'null') {
    document.querySelector('.header__top_right').style.visibility = "hidden";
}
</script>
</html>