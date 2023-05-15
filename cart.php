<?php session_start(); 
include('connect.php');

    //retrieve the username from the session variable
    if(isset($_SESSION['user_login']) && $_SESSION['user_login'] == "user"){
        $user_username = $_SESSION['user_username'];
    }

    elseif(isset($_SESSION['admin_login']) && $_SESSION['admin_login'] == "admin"){
        $admin_username = $_SESSION['admin_username']; 
    }

    //set cart session
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    $total_items;

    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        $total_items = count($_SESSION['cart']);
    } 

    else {
        $total_items = 0;
    }

    $cart_items = $_SESSION['cart'];

    //create a new array to store the updated items
    $cart_items = array();

    foreach ($_SESSION['cart'] as $cart_item) {
        $product_name = $cart_item[0];
        $product_price = $cart_item[1];
        $product_img = $cart_item[2];
        $product_id = $cart_item[3];
        $quantity = 1;

        //check if the item already exists in the cart
        $item_index = -1;
        for ($i = 0; $i < count($cart_items); $i++) {
            if ($cart_items[$i]->product_name === $product_name) {
                $item_index = $i;
                break;
            }
        }

        //if the item exists, update the quantity
        if ($item_index > -1) {
            $cart_items[$item_index]->quantity++;
        }
        
        //otherwise, add a new item to the cart
        else {
            $item = new stdClass();
            $item->product_name = $product_name;
            $item->product_price = $product_price;
            $item->product_img = $product_img;
            $item->product_id = $product_id;
            $item->quantity = $quantity;
            $cart_items[] = $item;
        }
    }

    //get the total price of items in the cart
    $sub_total = 0;
    foreach ($cart_items as $item) {
        $sub_total += floatval($item->product_price) * $item->quantity;
    }

    $delivery = 4.99;
    if ($sub_total >= 35 || $sub_total === 0) {
        $delivery = 0;
    }

    $total_price = $sub_total + $delivery;

    if ($delivery === 0) {
        $delivery = "free";
    } else {
        $delivery = "£" . $delivery;
    }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Kobieta i Dusza | Koszyk</title>
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

            <!-- ======= Shopping cart ======= -->
            <section id="cart" class="cart">
                <div class="section-header text-center pb-5">
                    <h5>Koszyk</h5>
                    <h4>Produkty w Twoim koszyku</h4>
                </div>
                <div class="row">
                    <div class="col-lg mb-4 mb-lg-0">
                        <div class="cart-content col-lg">
                            
                            <!-- Cart Table-->
                            <div class="table-responsive col-lg-7 mb-4">
                                <table class="table table-responsive">
                                    <thead class="cart-table-headings">
                                        <tr>
                                            <th class="border-0 p-3" scope="col"> <strong class="text-uppercase">Product</strong></th>
                                            <th class="border-0 p-3" scope="col"> <strong class="text-uppercase">Quantity</strong></th>
                                            <th class="border-0 p-3" scope="col"> <strong class="text-uppercase">Price</strong></th>
                                            <th class="border-0 p-3" scope="col"> <strong class="text-uppercase"></strong></th>
                                        </tr>
                                    </thead>
                                    <tbody class="border-0">
                                        
                                        <?php

                                        if(isset($_SESSION["cart"])) {
                                            foreach($_SESSION["cart"] as $product_id => $item) {
                                                $quantity = $item->quantity;
                                                $product_img = $item->product_img;
                                                $product_name = $item->product_name;
                                                $product_price = $item->product_price;
                                                $product_id = $item->product_id;
                                                $product_total = floatval($item->product_price) * $item->quantity;?>
                                            <tr>
                                                <form method='POST' action='item_action.php' class='product d-flex w-100'>
                                                    <th class="table-item ps-0 py-3" scope="row">
                                                        <div class="d-flex align-items-center">
                                                            <a class="border-img d-block" href="detail.php?id=<?= $row['id'] ?>">
                                                            <img src="<?php echo $product_img; ?>" alt="Product Image" width="70"/></a>
                                                            <div class="ms-3">
                                                                <a class="product-link" href="detail.php?id=<?= $row['id'] ?>"><h3><?php echo $product_name; ?></h3></a>
                                                            </div>
                                                        </div>
                                                    </th>

                                                    <td class="table-item p-3 align-middle">
                                                        <div class="border d-flex align-items-center justify-content-center px-3">
                                                            <div class="quantity">
                                                                <input type='hidden' name='product_price' value='<?php echo $product_price; ?>'>
                                                                <input type='hidden' name='product_name' value='<?php echo $product_name; ?>'>
                                                                <input type='hidden' name='product_img' value='<?php echo $product_img; ?>'>
                                                                <input type='hidden' name='product_id' value='<?php echo $product_id; ?>'>
                                                                <button type='submit' name='remove' class="dec-btn p-0"><i class="bi bi-dash"></i></button>
                                                                <span class="quantity-box border-0 shadow-0 p-0" type="text" value="1"><?php echo $quantity; ?></span>
                                                                <button type='submit' name='add' class="inc-btn p-0"><i class="bi bi-plus"></i></button>
                                                            </div>
                                                        </div>
                                                    </td>

                                                    <td class="table-item p-3 align-middle">
                                                        <p class="mb-0">£<?php echo $product_price; ?></p>
                                                    </td>
                                                </form>
                                            </tr> 
                                        <?php
                                        }}
                                        ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                            
                            <!-- Order total-->
                            <div class="col-lg-4">
                                <div class="total">
                                    <div class="total-content">
                                        <h5 class="total-title mb-4">PODSUMOWANIE</h5>
                                        <ul class="product-list mb-0">
                                            <li class="d-flex align-items-center justify-content-between">
                                                <strong class="text-uppercase font-weight-bold">Suma produktów</strong>
                                                <span class="text-muted small">£<?php echo $sub_total; ?></span></li>
                                            <li class=" my-2"></li>
                                            <li class="d-flex align-items-center justify-content-between">
                                                <strong class="text-uppercase font-weight-bold">Dostawa</strong>
                                                <span class="text-muted small"><?php echo $delivery; ?></span></li>
                                            <li class="border-bottom my-2"></li>
                                            <li class="d-flex align-items-center justify-content-between mb-4">
                                                <strong class="text-uppercase font-weight-bold">Razem</strong>
                                                <span>£<?php echo $total_price; ?></span></li>
                                            <li>

                                                <div id="smart-button-container">
                                                    <div style="text-align: center;">
                                                        <div id="paypal-button-container"></div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
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
                </div>
            </section>
            <!-- End Shopping Cart -->


            <!-- ======= Footer ======= -->
            <?php
                include('footer.html');
            ?>
        </main>


        <!-- ======= JS ======= -->
        <script>

            var id = "<?=$product_id?>";
            var quantity = "<?=$total_items?>";

            console.log(id);
            console.log(quantity);
        </script>

        <script src="https://www.paypal.com/sdk/js?client-id=AW5HJ86JcqTmtTshOqXUsG-z3ysT5frR0VtPi_U-fmwnWnuqFYRA5zPBlQ70u7mylqJhevtnzCC-tzP8&currency=GBP" data-sdk-integration-source="button-factory"></script>

        <script>
            function initPayPalButton() {
                paypal.Buttons({
                style: {
                shape: 'rect',
                color: 'gold',
                layout: 'vertical',
                label: 'paypal',
                },

                    createOrder: function(data, actions) {

                    // You can customise the purchase_units array to include multiple products
                    return actions.order.create({
                        purchase_units: [{
                        amount: {
                        currency_code: 'GBP',
                        value: <?=$total_price?>
                        },

                        // Customize this object to include the details of each product purchased
                        // Repeat this object for each product purchased
                        description: 'Selected purchases',
                        quantity: '<?php echo $total_items; ?>',
                        }]
                    });
                    },

                onApprove: function(data, actions) {
                return actions.order.capture().then(function(orderData) {

                    if (orderData.status == "COMPLETED") {
                        <?php
                        unset($_SESSION['cart']);
                        ?>
                        } else {

                        }

                    // Full available details
                    console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));

                    // Show a success message within this page, for example:
                    const element = document.getElementById('paypal-button-container');
                    element.innerHTML = '';
                    element.innerHTML = '<h3>Thank you for your payment!</h3>';

                    // Loop through each purchased product
                    <?php
                    include('connect.php');
                    $loop_counter = 0;
                    foreach ($_SESSION["cart"] as $key => $product_id ){
                        $productSelected = $product_id['3'];
                        $result = mysqli_query($conn, "SELECT * FROM products WHERE id = '$productSelected'");
                        $row = $result->fetch_assoc();
                        $stock = $row['product_q'];
                        $num_items_temp = intval($cart_items[$loop_counter]->quantity);

                        // reduce stock by quantity purchased
                        $new_stock = $stock - $num_items_temp;
                        $sql = "UPDATE products SET product_q = $new_stock WHERE id = '$productSelected'";
                        mysqli_query($conn, $sql);}
                        ?>
                    });

                },


                onError: function(err) {
                console.log(err);
                }
                }).render('#paypal-button-container');

            }

        initPayPalButton();

        </script>

        <!-- ADD JS ANIMATIONS -->
        
    </body>
</html>