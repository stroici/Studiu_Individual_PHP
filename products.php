<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Magazin Sportiv</title>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/admin.css">
    <style>
    .delete_button {
        width: 60px;
        background-color: transparent;
        border: none;
        cursor: pointer;
        color: #006a75;
        text-decoration: underline;
        border-radius: 20px;
        margin: 3px;
        padding: 0px 5px;
    }
    .delete_button:hover {
        color: #fff;
        background-color: #006a75;
    }
    .main__user__data {
        display: flex;
        justify-content: space-between;
    }
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
</style>
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
                        <a href="admin.php" class="menu__link">Admin</a>
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
            <div class="main__body">
                <div class="admin__header">
                    <h2 style="color:#888; margin-bottom:10px;">Administrare Produse</h2>
                </div>
                <div class="main__user__data">
                    <div calss="data_grid">
                        <div class="data__header">
                            <p class="data__header_col">Name</p>
                            <p class="data__header_col">Price</p>
                            <p class="data__header_col">Brand</p>
                            <p class="data__header_col">Category</p>
                        </div>
                        <div class="elements__list">
                        <?php   
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $db_name = "sportstore";
                        $conn = new mysqli($servername, $username, $password, $db_name);
                        if ($conn->connect_error) {
                        die("Conexiunea esuata: " . $conn->connect_error);
                        } else {
                        $result=$conn->query('SELECT product.Id, product.Name, product.Price, product.Image,  brand.Name as Brand_Name, category.Name as Category_Name, brand.Id as Brand_Id, category.Id as Category_Id FROM product JOIN brand ON product.IdBrand = brand.Id JOIN category ON product.IdCategory = category.Id');
                            while($row=$result->fetch_array())
                            {
                                echo "<button class='data_button' name='$row[0]' onclick='DataClick(this)'>";
                                echo "<form action='delete_product.php' method='post' class='data__row'>";
                                echo "<p>".$row[1]."</p><p>".$row[2]."</p><p>".$row[4]."</p><p>".$row[5]."</p>
                                <input type='hidden' name='id_a' value=".$row[0].">
                                <input type='hidden' name='image' value=".$row[3].">
                                <input type='hidden' name='brand' value=".$row[6].">
                                <input type='hidden' name='category' value=".$row[7].">
                                <input class='delete_button' type='submit' value='Sterge'>";
                                echo "</form>";
                                echo "</button>";
                            }
                        }
                        $conn->close();
                        ?>
                        </div>
                    </div>
                    <div class="show__element">
                        <p class="show__elemet_title">Product data</p>
                       <form action="#" class="show__form" method="post" id="show_form">
                            <input type="text" name="name" class="show__form_input" placeholder="Name...">
                            <input type="text" name="price" class="show__form_input" placeholder="Price...">
                            <input type="text" name="image" class="show__form_input" placeholder="Image...">
                            <input type='hidden' id="input_brand" name='brand' value="0">
                            <input type='hidden' id="input_category" name='category' value="0">
                            <select id="brandsSelect" class="show__form_input" onchange="Brand_Change()">
                                <?php   
                                    $servername = "localhost";
                                    $username = "root";
                                    $password = "";
                                    $db_name = "sportstore";
                                    $conn = new mysqli($servername, $username, $password, $db_name);
                                    if ($conn->connect_error) {
                                    die("Conexiunea esuata: " . $conn->connect_error);
                                    } else {
                                    $result=$conn->query("SELECT * FROM brand");
                                    while($row=$result->fetch_array()){
                                        echo "<option value='$row[0]'>".$row[1]."</option>";
                                    }
                                    }
                                    $conn->close();
                                    ?>
                            </select>
                            <select id="categoriesSelect" class="show__form_input" onchange="Category_Change()">
                                <?php   
                                    $servername = "localhost";
                                    $username = "root";
                                    $password = "";
                                    $db_name = "sportstore";
                                    $conn = new mysqli($servername, $username, $password, $db_name);
                                    if ($conn->connect_error) {
                                    die("Conexiunea esuata: " . $conn->connect_error);
                                    } else {
                                    $result=$conn->query("SELECT * FROM Category");
                                    while($row=$result->fetch_array()){
                                        echo "<option value='$row[0]'>".$row[1]."</option>";
                                    }
                                    }
                                    $conn->close();
                                ?>
                            </select>
                            <input type='hidden' name='id_a' value="0">
                            <input onclick="Add_New_User()"  type="submit" class="show__form_button" value="Add new">
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

    //User First Button Active
    let user_buttons_list = document.querySelector('.elements__list');
    let user_buttons = user_buttons_list.querySelectorAll('.data_button');
    if (user_buttons[0] != null) {
        user_buttons[0].classList.add('active');
       
        let form = user_buttons[0].querySelector('form');
        let arrayP = form.querySelectorAll('p');
        let id = form.querySelector('input').value;
        let img = form.querySelectorAll('input')[1].value;
        let brandId = form.querySelectorAll('input')[2].value;
        let categoryId = form.querySelectorAll('input')[3].value;
        let inputBrand = document.getElementById('input_brand');
        let inputCategory = document.getElementById('input_category');
        inputBrand.value = brandId;
        inputCategory.value = categoryId;

        const editContainer = document.querySelector('.show__element');
        const inputList = editContainer.getElementsByTagName('input');
    
        let selectBrand = document.getElementById('brandsSelect');
        let selectCategory = document.getElementById('categoriesSelect');
       
        console.log(selectBrand + " " + selectCategory);
        
        inputList[0].value = arrayP[0].innerHTML;
        inputList[1].value = arrayP[1].innerHTML;
        inputList[2].value = img;
        selectBrand.value = brandId;   
        selectCategory.value = categoryId;   
        inputList[5].value = id;
    }

    function DataClick(el){
       user_buttons_list.querySelector('.active').classList.remove('active');
        el.classList.add('active');

        let form = el.querySelector('form');
        let arrayP = form.querySelectorAll('p');
        let id = form.querySelector('input').value;
        let img = form.querySelectorAll('input')[1].value;
        let brandId = form.querySelectorAll('input')[2].value;
        let categoryId = form.querySelectorAll('input')[3].value;
        let inputBrand = document.getElementById('input_brand');
        let inputCategory = document.getElementById('input_category');
        inputBrand.value = brandId;
        inputCategory.value = categoryId;

        const editContainer = document.querySelector('.show__element');
        const inputList = editContainer.getElementsByTagName('input');
    
        let selectBrand = document.getElementById('brandsSelect');
        let selectCategory = document.getElementById('categoriesSelect');
       
        console.log(selectBrand + " " + selectCategory);
        
        inputList[0].value = arrayP[0].innerHTML;
        inputList[1].value = arrayP[1].innerHTML;
        inputList[2].value = img;
        selectBrand.value = brandId;   
        selectCategory.value = categoryId;   
        inputList[5].value = id;
    }
    function Add_New_User(){
        const form = document.getElementById('show_form');  
        form.action = "add_product.php"
    }
    function Edit_User(){
        const form = document.getElementById('show_form');  
        form.action = "edit_product.php"
    }
    function Delete_User(){
        const form = document.getElementById('show_form');  
        form.action = "delete_product.php"
    }
    function Brand_Change(){
        let input = document.getElementById('input_brand');
        let select = document.getElementById('brandsSelect');
        var option = select.options[select.selectedIndex];
        input.value = option.value;
    }
    function Category_Change(){
        let input = document.getElementById('input_category');
        let select = document.getElementById('categoriesSelect');
        var option = select.options[select.selectedIndex];
        input.value = option.value;
    }
</script>
<script>
    function Go_Users() {
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
</script>
</html>