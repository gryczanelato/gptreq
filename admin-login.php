<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Kobieta i Dusza | Admin - logowanie</title>

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
        <main>

            <?php 
            // Start the session
            session_start();

            // making connection with db
            // $conn = mysqli_connect("localhost", "HNCWEBMR19", "rAhXexAcqr", "HNCWEBMR19") 
            // or die("Cannot connect to database");
        
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

                    if ($user_type == 'admin') {
                        $_SESSION['admin_login'] = "admin";
                        $_SESSION['admin_username'] = $user_name;
                        header("Location:admin-courses.php");
                        exit(); // Terminate the script after redirection
                    } else {
                        header("Location:admin-login.php");
                        exit(); 
                    }
                } else {
                    echo("<h5 class='py-5 text-center' style='color:red; font-weight:bold'>" . "Incorrect username or password." . "</h5>");
                }
            }
            ?>

            <!-- ======= Admin Login ======= -->
            <section id="log-reg" class="log-reg mt-5">
                <div class="logreg-container">
                    <div class="frame">
                        <div>
                            <form class="form-log" action="" method="post" name="form">
                                <img src="assets/img/logo.png" alt="Logo Kobieta i Dusza" style="max-height: 100px;">
                                <label class="pt-5" for="user_email"><h5>Email</h5></label>
                                <input class="form-styling" type="text" name="user_email" id="user_email" />

                                <label for="user_password"><h5>Hasło</h5></label>
                                <input class="form-styling" type="password" name="user_password" id="user_password"/>

                                <div class="">
                                    <button type="submit" name="submit-btn-log" class="btn btn-log">Zaloguj</button>
                                </div>
                            </form>
                        </div>
                    </div>
            </section>
        </main>

    </body>
</html>