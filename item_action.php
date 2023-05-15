<?php

session_start();

    //Add to cart
    if (isset($_POST['add'])) {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_img = $_POST['product_img'];
        $product_id = $_POST['product_id'];
        $temp_arr[] = $product_name;
        $temp_arr[] = $product_price;
        $temp_arr[] = $product_img;
        $temp_arr[] = $product_id;
        array_push($_SESSION['cart'], $temp_arr);
        
    }
    if (isset($_POST['remove'])) {
        //Find the item in the array
        $product_name = $_POST['product_name'];
        $key = -1;
        foreach ($_SESSION['cart'] as $index => $item) {
            if ($item[0] === $product_name) {
                $key = $index;
                break;
            }
        }
        //Remove the item from the array
        if ($key !== -1) {
            unset($_SESSION['cart'][$key]);
        }
    }

echo "<script>location.href='cart.php'</script>";

?>

