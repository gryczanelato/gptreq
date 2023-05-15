<!-- starting session with php before html -->
<?php 
if(isset($_GET['id'])) $product_id = $_GET["id"];
else {
    header('Location: shop.php');
}
if(!isset($_SESSION)) session_start(); 

    //retrieve the username from the session variable
    if(isset($_SESSION['user_login']) && $_SESSION['user_login'] == "user"){
        $user_username = $_SESSION['user_username'];
    }

    elseif(isset($_SESSION['admin_login']) && $_SESSION['admin_login'] == "admin"){
        $admin_username = $_SESSION['admin_username']; 
    }

    //making connection with db
    include('connect.php');




?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Kobieta i Dusza | Produkt</title>
        <meta content="Z korzeniami sięgającymi tysięcy lat wstecz, joga kundalini oferuje 
        nowoczesne korzyści, od łagodzenia bezsenności po zmniejszanie lęku." name="description">
        <meta content="kundalini joga Edinburgh" name="keywords">
        <meta name="robots" content="index">

        <meta property="og:title" content="Joga kundalini w Edynburgu">
        <meta property="og:description" content="Zobacz więcej!">
        <meta property="og:image" content="assets/img/logo.png">

        <!-- Favicon -->
        <link rel="shortcut icon" type="image/png" href="assets/img/favicon-logo.png">

        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Poppins&display=swap" rel="stylesheet">

        <!-- Icons -->
        <script src="https://kit.fontawesome.com/8dfa46e6e2.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

        <!-- Styles -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

        <!-- CSS -->
        <link href="assets/styles/style.css" rel="stylesheet">

        <style>
            

        </style>
    </head>

    <body>

        <!-- ======= Navbar ======= -->
        <div class="container">
            <nav class="navbar navbar-expand-lg fixed-top">
                <div class="container-fluid">
                    <a class="navbar-brand" href="index.php">
                        <img  id="logo" class="logo" src="assets/img/logo.png" alt="Logo Kobieta i Dusza">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target=".navbar-collapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse">
                        <ul class="navbar-nav" id="navbarNav">
                            <li class="nav-item">
                                <a class="nav-link active-link" href="shop.php"><h3>Sklep</h3></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php#courses"><h3>Kursy</h3></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php#won"><h3>Whispers of nature</h3></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php#about"><h3>O mnie</h3></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php#yoga"><h3>Kundalini joga</h3></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php#contact"><h3>Kontakt</h3></a>
                            </li>
                            <?php
                                // // Check if customer is logged in
                                if (isset($_SESSION['user_login'])) {
                                    echo "<li class='nav-item last-item d-flex'>";
                                    echo "<a class='social-links' href='cart.php'><i class='bi bi-basket'></i></a>";
                                    echo "<a class='social-links' href='logout.php'><i class='bi bi-box-arrow-right'></i></a>";
                                    echo "</li>";
                                }
                                // Check if admin is logged in
                                elseif (isset($_SESSION['admin_login'])) {
                                    echo "<li class='nav-item'>";
                                    echo "<a class='btn btn-login' href='admin-logout.php'><h2 class='log-text'>Wyloguj się</h2></a>";
                                    echo "</li>";
                                }
                                // Display login link if no one is logged in
                                else {
                                    echo "<li class='nav-item'>";
                                    echo "<a class='btn btn-login' href='log-reg.php'><h2 class='log-text'>Zaloguj się</h2></a>";
                                    echo "</li>";
                                }
                                
                            ?>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <!-- End Navbar -->

        <main>

            <!-- ======= Product Details ======= -->
            <section id="product-details" class="product-details" style="padding-top: 150px;">
                <div class="container">
                    <div class="row mb-5">
                        <div class="product-content col-lg">

                        <?php

                            $query = "SELECT * FROM products WHERE id = '$product_id'";
                            $result = mysqli_query($conn, $query);

                            if (mysqli_num_rows($result) == 0) {
                                echo "Ten produkt nie jest już dostępny.";
                            } 
                            else {
                                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                                $product_name = $row['product_name'];
                                $product_price = $row['product_price'];
                                $product_desc = $row['product_desc'];
                                $product_img = $row['product_img'];
                                $product_img_2 = $row['product_img_2'];
                                $product_img_3 = $row['product_img_3'];
                                $product_img_4 = $row['product_img_4'];
                                $product_id = $row['id'];?>

                                <div class="product-container">
                                    <div class="col-lg-5">
                                        <div class="product-img">
                                            <div class="product-small-img">
                                                <img clas='img-fluid' src='<?php echo $product_img; ?>' onclick='ImgFunction(this)'>
                                                <img clas='img-fluid' src='<?php echo $product_img_2; ?>' onclick='ImgFunction(this)'>
                                                <img clas='img-fluid' src='<?php echo $product_img_3; ?>' onclick='ImgFunction(this)'>
                                                <img clas='img-fluid' src='<?php echo $product_img_4; ?>' onclick='ImgFunction(this)'>
                                            </div>
                                            <div class="img-container">
                                                <img clas='img-fluid' id='imageBox' src='<?php echo $product_img; ?>'>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="product-infobox">
                                            <h4><?php echo $product_name; ?></h4>
                                            <p>Przy zakupie powżej £30 dostawa <span>ZA DARMO</span></p> <hr>
                                            <h4>£<?php echo $product_price; ?></h4>
                                            <h2 class="product-desc">Opis produktu</strong></h2>
                                            <h2 class="text-sm mb-4"><?php echo $product_desc; ?></h2>
                                            <div class="d-flex">
                                                <div class="prod-no">
                                                    <input type="number" name="product_quantity" step="1" min="1" value="1">
                                                </div>


                                                <form action="item_action.php" method="post">
                                                    <input type='hidden' name='product_price' value='<?php echo $product_price; ?>'>
                                                    <input type='hidden' name='product_name' value='<?php echo $product_name; ?>'>
                                                    <input type='hidden' name='product_img' value='<?php echo $product_img; ?>'>
                                                    <input type='hidden' name='product_id' value='<?php echo $product_id; ?>'>
                                                <?php
                                                    // // Check if customer is logged in
                                                    if (isset($_SESSION['user_login'])) {
                                                        echo "<button class='btn' name='add' type='submit'>Dodaj <i class='bi bi-cart3'></i></button>";
                                                    }

                                                    elseif (isset($_SESSION['admin_login'])) {
                                                        echo "<button class='btn' name='add' type='submit'>Dodaj <i class='bi bi-cart3'></i></button>";
                                                    }
                                                    // Display login link if no one is logged in
                                                    else {
                                                        echo "Zaloguj sie, aby kupić przedmiot";
                                                        echo "<a class='btn btn-login' href='log-reg.php'><h2 class='log-text'>Zaloguj się</h2></a>";
                                                    }
                                                    
                                                ?>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                        ?>
                        </div>
                    </div>
                    <!-- Back to shop-->
                    <div class="back-to-shop">
                        <a class="btn d-flex justify-content-center align-items-center" href="shop.php">
                            <i class="bi bi-arrow-left-short"></i>
                            <h2 class="btn-text">Powrót do sklepu</h2>
                        </a>
                    </div>
                </div>
            </section>
            <!-- End Product Details -->

            <!-- ======= Footer ======= -->
            <?php
                include('footer.html');
            ?>

        </main>
        <!-- ======= JS ======= -->
        <script>
            function ImgFunction(smallImg) {
                var fullImg = document.getElementById("imageBox");
                fullImg.src = smallImg.src;
            }
        </script>

        <!-- ADD JS ANIMATIONS -->
        
    </body>
</html>