<?php 
//starting session with php before html
session_start(); 

//making connection with db
include('connect.php');

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    // Insert user's details into the database
    $sql = "INSERT INTO newsletter (newsletter_name, newsletter_email) VALUES ('$name', '$email')";
    $result = mysqli_query($conn, $sql);

    // Check if the query was successful
    if ($result) {
        header("Refresh:3; url=index.php");
        echo "<h4 class='text-center align-middle' style='color:red'>Zapisałeś się do newslettera, dziękuję!</h4>";
    } else {
        header("Refresh:3; url=index.php");
        echo "<h4 class='text-center align-middle' style='color:red'>Error: " . mysqli_error($conn) . "</h4>";
    }
}
?>