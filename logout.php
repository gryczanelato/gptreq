<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>Kobieta i Dusza | Wylogowywanie</title>

        <!-- Favicon -->
        <link rel="shortcut icon" type="image/png" href="assets/img/favicon-logo.png">

        <!-- Styles -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    </head>
    <body>
        

        <?php
            session_start();

            //check if admin_username is set
            if(isset($_SESSION['user_username'])) {
            //get username from session variable
            $user_username = $_SESSION['user_username'];

            //remove all session variables
            session_unset();

            //destroy the session
            session_destroy();

            //display goodbye message with username
            echo ("<h3 class='py-5 text-center align-middle' style= font-weight:bold'> Goodbye, " . $user_username . "! You have been logged out. </h3>");
            //redirect to index page
            header("Refresh:3; url=index.php", true, 303);
            } 

            else {
            // redirect to index page if admin_username is not set
            header("Refresh:3; url=index.php", true, 303);
            }
        ?>

    </body>
</html>