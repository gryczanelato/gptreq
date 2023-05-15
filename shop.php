<!-- starting session with php before html -->
<?php session_start(); 

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

        <title>Kobieta i Dusza | Sklep</title>
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

        <!-- JQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

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
            <!-- ======= Shop Courses ======= -->
            <section id="shop-courses" class="shop-courses" style="padding-top: 130px">

                <div class="col-lg my-5 mx-5">
                    <div class="section-header text-center py-5">
                        <h5>Kursy</h5>
                        <h4>Wybierz najlepszy kurs dla siebie </h4>
                    </div>
                    <div class="row">
                        <div class="courses-book col-lg">
                            <div class="courses-slider col-lg-5 col-md-6">
                                <div id="carousel-indicators" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-indicators">
                                        <button type="button" data-bs-target="#carousel-indicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                        <button type="button" data-bs-target="#carousel-indicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                        <button type="button" data-bs-target="#carousel-indicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                    </div>
                                    <div class="carousel-inner border-img">
                                        <div class="carousel-item active">
                                            <img src="assets/img/yoga1.jpeg" class="d-block img-fluid" alt="Yoga position">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="assets/img/yoga2.jpeg" class="d-block img-fluid" alt="Yoga position">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="assets/img/yoga3.jpeg" class="d-block img-fluid" alt="Yoga position">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="courses-book-form col-lg-6 col-md-6">
                                <form action="order.php" method="post">
                                    <div class='row align-items-center wow fadeIn'>
                                        <div class='courses-label col-md-3'>
                                            <label class='label-name mb-0' for='title'><h5>Kurs:</h5></label>
                                        </div>
                                        <select name='title' id='courses' class='col-lg-9 col-md-5 pe-5'>
                                        <option disabled selected style="font-style:italic;">Wybierz poziom kursu</option>
                                            <?php 
                                                $sql_level = "SELECT DISTINCT course_name FROM courses";
                                                $result_level = mysqli_query($conn, $sql_level);

                                                while ($row = mysqli_fetch_array($result_level)) {
                                                    $course_name = $row['product_name'];
                                                    $product_img = $row['product_img'];
                                                    echo "<option value='" . $row['course_name'] . "'>" . $row['course_name'] . "</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <br>

                                    <div class='row align-items-center wow fadeIn'>
                                        <div class='courses-label col-md-3'>
                                            <label class='label-name mb-0' for='date'><h5>Data:</h5></label>
                                        </div>
                                        <select name='date' id='courses-dates' class='col-lg-9 col-md-5 pe-5'>
                                            <option disabled selected style='font-style:italic;'>Wybierz datę</option>
                                        </select>
                                    </div>
                                    <br>

                                    <div class="btn-courses d-flex justify-content-center wow fadeIn">
                                        <label for="GO"></label>
                                        <input class="btn" type="submit" name="go" value="Dodaj" />
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div> 
                </div>
            </section>
            <!-- End Shop Courses -->


            <!-- ======= Shop Products ======= -->
            <section id="shop-products" class="won py-5">
                <div class="container" data-aos="fade-up">
          
                    <div class="section-header-shop text-center py-2">
                        <h5>Whispers of Nature</h5>
                        <h4>Ręcznie wykonane produkty w duchu lesswaste</h4>
                    </div>
            
                    <div class="row shop-product-box gy-4 pt-5">
                        <!-- Product -->
                        <?php 
                            $sql = "SELECT id, product_name, product_img FROM products";
                            $result = mysqli_query($conn, $sql);
                            $count = mysqli_num_rows($result);

                            if ($count > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $product_name = $row['product_name'];
                                    $product_img = $row['product_img'];?>
                            
                            <div class="product col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                                <div class="product-box">
                                    <a class="d-block" href="detail.php?id=<?= $row['id'] ?>">
                                        <div class="border-img">
                                            <img src="<?php echo $product_img; ?>" class="img-fluid" alt="Produkt | kundalini joga edinburgh">
                                        </div>
                                    </a>
                                    <div class="product-overlay">
                                        <a class="btn btn-sm" href="detail.php?id=<?= $row['id'] ?>"><?php echo $product_name; ?></a>
                                    </div>
                                    
                                </div>
                            </div>
                            <?php 
                                }
                            }
                        ?>
                    </div>
                </div>
            </section>
            <!-- End Shop Products -->


            <!-- ======= Footer ======= -->
            <?php
                include('footer.html');
            ?>

        </main>


        <!-- ======= jQuery ======= -->

        <script>
            $(document).ready(function() {
                // handle change event of first dropdown menu
                $('select[name="title"]').on('change', function() {
                    var courseName = $(this).val();
                    $.ajax({
                        url: 'get_dates.php',
                        method: 'POST',
                        data: { course_name: courseName },
                        dataType: 'html',
                        success: function(response) {
                            $('#courses-dates').html(response);
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            console.log(textStatus, errorThrown);
                        }
                    });
                });
            });
        </script>

        <!-- ======= JS ======= -->

        <script>
            // var shopProducts = document.getElementById("shop-products");
            // shopProducts.style.height = "100%";
            const shopProducts = document.querySelector('.shop-products');
            const windowHeight = window.innerHeight;

            shopProducts.style.height = windowHeight + 'px';
        </script>

        <!-- ADD JS ANIMATIONS -->
        
    </body>
</html>