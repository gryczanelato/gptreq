<?php
    session_start();
    if(isset($_SESSION['admin_login']) && $_SESSION['admin_login'] == "admin"){
        $admin_username = $_SESSION['admin_username']; //retrieve the username from the session variable
?>

<!DOCTYPE html>
<html dir="ltr" lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>Kobieta i Dusza | Admin</title>
        <meta content="Z korzeniami sięgającymi tysięcy lat wstecz, joga kundalini oferuje 
        nowoczesne korzyści, od łagodzenia bezsenności po zmniejszanie lęku." name="description">
        <meta content="kundalini joga Edinburgh" name="keywords">
        <meta name="robots" content="index">

        <meta property="og:title" content="Joga kundalini w Edynburgu">
        <meta property="og:description" content="Zobacz więcej!">
        <meta property="og:image" content="assets/img/logo.png">

        <!-- Favicon icon -->
        <link rel="shortcut icon" type="image/png" href="assets/img/favicon-logo.png">
        
        
        <!-- Icons -->
        <script src="https://kit.fontawesome.com/8dfa46e6e2.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">


        <!-- Styles -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>


        <!-- Custom CSS -->
        <link href="assets/styles/styles-admin.css" rel="stylesheet">
    </head>

    <body>

        <section id="admin-panel" class="admin-panel">

            <!-- Topbar -->
            <header class="topbar">
                <nav class="navbar top-navbar navbar-expand-md d-flex justify-content-between">

                    <div class="navbar-header">
                        <a class="navbar-brand" href="index.php">
                            <div class="logo-icon">
                                <img class="logo" src="assets/img/logo.png" alt="Logo Kobieta i Dusza"/>
                            </div>
                        </a>
                    </div>

                    <div class="navbar-user">
                        <div class="navbar-nav d-flex justify-content-between">
                            <div class="profile-pic-box">
                                <i class="profile-pic bi bi-person"></i>
                            </div>
                            <div class="admin-user-box">
                                <h3 class="admin-user"><?php echo $admin_username; ?></h3>
                            </div>
                        </div>
                    </div>
                </nav>
            </header>

            <!-- Sidebar -->
            <aside class="left-sidebar">
                <div class="scroll-sidebar">
                    <nav class="sidebar-nav">
                        <ul id="sidebarnav">
                        <li class="sidebar-item">
                                <a class="sidebar-link" href="admin-courses.php" aria-expanded="false">
                                    <span class="hide-menu">Kursy</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="admin-booked.php" aria-expanded="false">
                                    <span class="hide-menu">Booked</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link active" href="admin-products.php" aria-expanded="false">
                                    <span class="hide-menu">Produkty</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="admin-users.php" aria-expanded="false">
                                    <span class="hide-menu">Użytkownicy</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="admin-newsletter.php" aria-expanded="false">
                                    <span class="hide-menu">Newsletter</span>
                                </a>
                            </li>
                            <li>
                                <div class="sidebar-item">
                                    <a href="admin-logout.php" class="btn btn-logout logout"><h2>Wyloguj się</h2></a>
                                </div>
                            </li>
                        </ul>
                    </nav>
                </div>
            </aside>
            

            <?php
            //making connection with db
            include('connect.php');

            //function with query to create update button
            if(isset($_POST['update'])) {
              $updateQuery = "UPDATE products SET product_type='$_POST[product_type]', product_name='$_POST[product_name]', product_subtitle='$_POST[product_subtitle]', 
              product_desc='$_POST[product_desc]', product_q='$_POST[product_q]', product_price='$_POST[product_price]', product_img='$_POST[product_img]', 
              product_img_2='$_POST[product_img_2]', product_img_3='$_POST[product_img_3]', product_img_4='$_POST[product_img_4]' WHERE id='$_POST[id]'";
              mysqli_query($conn, $updateQuery);
            }

            //function with query to create delete button
            if(isset($_POST['delete'])) {
                $deleteQuery = "DELETE FROM products WHERE id='$_POST[id]'";
                mysqli_query($conn, $deleteQuery);
            }
            //function with query to create add form
            if(isset($_POST['add'])) {
              $product_type = $_POST['product_type'];
              $product_name = $_POST['product_name'];
              $product_subtitle = $_POST['product_subtitle'];
              $product_desc = $_POST['product_desc'];
              $product_q = $_POST['product_q'];
              $product_price = $_POST['product_price'];
              $product_img = $_POST['product_img'];
              $product_img_2 = $_POST['product_img_2'];
              $product_img_3 = $_POST['product_img_3'];
              $product_img_4 = $_POST['product_img_4'];

              $insertQuery = "INSERT INTO products (product_type, product_name, product_subtitle, product_desc, product_q, product_price, product_img. product_img_2, product_img_3, product_img_4) 
              VALUES ('$product_type', '$product_name', '$product_subtitle', '$product_desc', '$product_q', '$product_price', '$product_img', '$product_img_2', '$product_img_3', '$product_img_4')";
              mysqli_query($conn, $insertQuery);
            }

            //variable that shows the content of the database table in the html table
            $result = mysqli_query($conn, "SELECT * FROM products");
            ?>

            <div class="table-wrapper">

                <div class="row">
                    <div class="table-title col-md-6 col-8 align-self-center">
                        <h4 class="mb-0 p-0">Produkty</h4>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <!-- column -->
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table user-table">
                                            <thead>
                                                <tr>
                                                    <th class="border-top-0">#</th>
                                                    <th class="border-top-0">Typ</th>
                                                    <th class="border-top-0">Nazwa</th>
                                                    <th class="border-top-0">Podtytuł</th>
                                                    <th class="border-top-0">Opis</th>
                                                    <th class="border-top-0">Ilość</th>
                                                    <th class="border-top-0">Cena</th>
                                                    <th class="border-top-0">Img_1</th>
                                                    <th class="border-top-0">Img_2</th>
                                                    <th class="border-top-0">Img_3</th>
                                                    <th class="border-top-0">Img_4</th>
                                                    <th class="border-top-0"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                                        echo "<form action='admin-products.php' method='post'>";
                                                            echo "<tr>";
                                                                echo "<td><input name='id' value ='" . $row['id'] . "' ></td>";
                                                                echo "<td><input type='text' name='product_type' value ='" . $row['product_type'] . "' ></td>";
                                                                echo "<td><input type='text' name='product_name' value ='" . $row['product_name'] . "' ></td>";
                                                                echo "<td><input type='text' name='product_subtitle' value ='" . $row['product_subtitle'] . "' ></td>";
                                                                echo "<td><input type='text' name='product_desc' value ='" . $row['product_desc'] . "' ></td>";
                                                                echo "<td><input type='text' name='product_q' value ='" . $row['product_q'] . "' ></td>";
                                                                echo "<td><input type='text' name='product_price' value ='" . $row['product_price'] . "' ></td>";
                                                                echo "<td><input type='text' name='product_img' value ='" . $row['product_img'] . "' ></td>";
                                                                echo "<td><input type='text' name='product_img_2' value ='" . $row['product_img_2'] . "' ></td>";
                                                                echo "<td><input type='text' name='product_img_3' value ='" . $row['product_img_3'] . "' ></td>";
                                                                echo "<td><input type='text' name='product_img_4' value ='" . $row['product_img_4'] . "' ></td>";
                                                                echo "<td><input type='submit' name='update' value ='update' ></td>";
                                                                echo "<td><input type='submit' name='delete' value ='delete' ></td>";
                                                            echo "</tr>";
                                                        echo "</form>";
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="table-title col-md-6 col-8 align-self-center">
                        <h4 class="mb-0 p-0">Dodaj</h4>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <!-- column -->
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table user-table">
                                            <thead>
                                                <tr>
                                                    <th class="border-top-0">Typ</th>
                                                    <th class="border-top-0">Nazwa</th>
                                                    <th class="border-top-0">Podtytuł</th>
                                                    <th class="border-top-0">Opis</th>
                                                    <th class="border-top-0">Ilość</th>
                                                    <th class="border-top-0">Cena</th>
                                                    <th class="border-top-0">Img_1</th>
                                                    <th class="border-top-0">Img_2</th>
                                                    <th class="border-top-0">Img_3</th>
                                                    <th class="border-top-0">Img_4</th>
                                                    <th class="border-top-0"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    echo "<form action='admin-products.php' method='post'>";
                                                        echo "<tr>";
                                                            echo "<td><input type='text' name='product_type' id='product_type'/></td>";
                                                            echo "<td><input type='text' name='product_name' id='product_name'/></td>";
                                                            echo "<td><input type='text' name='product_subtitle' id='product_subtitle'/></td>";
                                                            echo "<td><input type='text' name='product_desc' id='product_desc'/></td>";
                                                            echo "<td><input type='text' name='product_q' id='product_q'/></td>";
                                                            echo "<td><input type='text' name='product_price' id='product_price'/></td>";
                                                            echo "<td><input type='text' name='product_img' id='product_img'/></td>";
                                                            echo "<td><input type='text' name='product_img_2' id='product_img_2'/></td>";
                                                            echo "<td><input type='text' name='product_img_3' id='product_img_3'/></td>";
                                                            echo "<td><input type='text' name='product_img_4' id='product_img_4'/></td>";
                                                            echo "<td><input type='submit' name='add' value='Submit'/></td>";
                                                        echo "</tr>";
                                                    echo "</form>";
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Footer -->
                <footer class="footer">
                    <div class="container">
                        <div class="copyright">
                            &copy; Copyright <strong><span>Kobieta i Dusza</span></strong>. Wszelkie prawa zastrzeżone.
                        </div>
                    </div>
                </footer>
            </div>
        </section>
        
        <?php
        }
          else {
            echo "<h3 class='text-center' style='color:red;size:30px'>You are not allowed access here</h3>";
            header( "Refresh:3; url=index.php", true, 303);
          }
        ?>
        <?php
          mysqli_close($conn);
        ?>

    </body>
</html>