<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Kobieta i Dusza | Logowanie</title>
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <!-- JS animations -->
        <script src="assets/animations/scripts.js"></script>

        <!-- CSS -->
        <link href="assets/styles/style.css" rel="stylesheet">

    </head>

    <body>

        <!-- Navbar -->
        <div class="container">
            <nav class="navbar navbar-expand-lg">
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
                                <a class="nav-link" href="shop.php"><h3>Sklep</h3></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php"><h3>Główna</h3></a>
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
                            <li class="nav-item">
                                <a class="btn btn-login" href="log-reg.php"><h2 class="log-text">Zaloguj się</h2></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <!-- End Navbar -->

        <main>

        <?php 
        
            // LOGIN

            //making connection with db
            include('connect.php');

            if (isset($_POST['submit-btn-log'])) {

                //set variables
                $user_email = $_POST["user_email"];
                $user_password = $_POST["user_password"];

                //create query to check user input against database enteries
                $sql = "SELECT * FROM kid_users WHERE user_email='$user_email' AND user_password='$user_password'";
                $result = mysqli_query($conn, $sql);

                //counting rows by sql
                $count = mysqli_num_rows($result);

                //if result matched $user_email, then table row must be 1
                if ($count == 1) {

                    $row = $result->fetch_assoc();
                    $user_type = $row['user_type'];
                    $user_name = $row['user_name'];

                    if ($user_type == 'customer') {
                        $_SESSION['user_login'] = "user";
                        $_SESSION['user_username'] = $user_name;
                        echo "<script>location.href='index.php';</script>";
                        exit();
                    } 
                    
                    else {
                        echo"Unindentified problem occured. You are not logged in.";
                    }
                } 
                
                else {
                    echo("<h5 class='py-5 text-center' style='color:red; font-weight:bold'>" . "Incorrect username or password." . "</h5>");
                }
            }

            // REGISTER
            if(isset($_POST['submit-btn-reg'])){

                //set variables
                $user_name = $_POST["user_name"];
                $user_email = $_POST["user_email"];
                $user_address = $_POST["user_address"];
                $user_password = $_POST["user_password"];
                $check_password = $_POST["check_password"];
  
                //insert data provided by user into table
                $reg = mysqli_query($conn, "SELECT * FROM kid_users WHERE user_name='$user_name'");
                
                //check if the data has been inserted previously to the db
                if(mysqli_num_rows($reg) > 0) {
                    echo("<h5 class='py-5 text-center' style='color:red'>" . "Username already exists" . "</h5>");
                    } 
  
                elseif($user_password != $check_password) {
                    echo("<h5 class='py-5 text-center' style='color:red'>" . "Passwords do not match" . "</h5>");
                    }

                elseif(strlen($user_password) < 8) {
                    echo("<h5 class='py-5 text-center' style='color:red'>" . "Passwords is too short.<br>Password must be at least 8 characters." . "</h5>");
                }
    
                else {
                    echo("<h5 class='py-5 text-center'>" . "Passed data is: " . "<br>" . $user_name . "<br>" . $user_email . "<br>" . $user_address . "<br>" . $user_password . "<br>" . "</h5>");
                    mysqli_query ($conn, "INSERT INTO kid_users (user_name, user_email, user_address, user_password) VALUES ('$user_name', '$user_email', '$user_address' ,'$user_password')");
                    echo("<h5 class='text-center'>" . "User is registered. You can now log in." . "</h5>");
              }
            }

        ?>
            <!-- ======= Login/Register ======= -->
            <section id="log-reg" class="log-reg">
                <div class="logreg-container">
                    <div class="frame">
                        <div class="logreg-nav">
                            <ul class="links">
                                <li class="log-active"><a class="btn btn-logreg"><h3>MAM KONTO</h3></a></li>
                                <li class="reg-inactive"><a class="btn btn-logreg"><h3>NOWY UŻYTKOWNIK</h3></a></li>
                            </ul>
                        </div>
                        <div>
                            <!-- Login form -->
                            <form class="form-log" action="log-reg.php" method="POST" name="form">
                                <label for="user_email"><h5>Adres email</h5></label>
                                <input class="form-styling" type="text" name="user_email" required/>

                                <label for="user_password"><h5>Hasło</h5></label>
                                <input class="form-styling" type="password" name="user_password" required/>

                                <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4 pt-4 wow fadeIn">
                                    <input class="px-2 btn btn-log" style="color: #f5f5f5;" type="submit" value="Login" name="submit-btn-log">
                                </div>
                            </form>

                            <!-- Register form -->
                            <form class="form-reg" action="" method="post" name="form">
                                <label for="user_name"><h5>Imię i nazwisko</h5></label>
                                <input class="form-styling" type="text" name="user_name" id="user_name" required/>

                                <label for="user_email"><h5>Adres email</h5></label>
                                <input class="form-styling" type="text" name="user_email" id="user_email" required/>

                                <label for="user_address"><h5>Adres domowy z kodem pocztowym</h5></label>
                                <input class="form-styling" type="text" name="user_address" id="user_address" required/>

                                <label for="user_password"><h5>Hasło</h5></label>
                                <input class="form-styling" type="password" name="user_password" id="user_password" minlength="8" required/>

                                <label for="check_password"><h5>Powtórz hasło</h5></label>
                                <input class="form-styling" type="password" name="check_password" id="check_password" required/>

                                <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4 wow fadeIn">
                                    <input class="px-2 btn btn-reg" style="color: #f5f5f5;" type="submit" value="Register" name="submit-btn-reg"/>
                                </div>
                            </form>
                        </div>
                    </div>
            </section>
            <!-- End Login/Register -->

            <!-- ======= Footer ======= -->
            <?php
                include('footer.html');
            ?>

        </main>

        <!-- ======= JS ======= -->


        <!-- ADD JS ANIMATIONS -->

    </body>
</html>