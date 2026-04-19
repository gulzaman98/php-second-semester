<?php
session_start();
include('connection.php'); // Apni connection file ka sahi naam check kar lein

if(isset($_POST['place_order'])){
    $uid = $_SESSION['user_id'];
    $name = $_POST['full_name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $bill = $_POST['total_bill'];

    // 1. Pehle 'orders' table mein entry insert karein
    $order_query = "INSERT INTO `orders` (user_id, full_name, phone, address, total_amount) 
                    VALUES ('$uid', '$name', '$phone', '$address', '$bill')";
    
    if(mysqli_query($con, $order_query)){
        // Naye bane huye order ki ID nikaalein
        $order_id = mysqli_insert_id($con);

        // 2. Ab cart se items utha kar 'order_items' table mein shift karein
        $cart_items = mysqli_query($con, "SELECT * FROM `add_to_cart` 
                                         INNER JOIN `add_product` ON add_to_cart.pro_id = add_product.p_id 
                                         WHERE user_id = '$uid'");

        while($row = mysqli_fetch_assoc($cart_items)){
            $p_id = $row['pro_id'];
            $p_name = $row['p_name'];
            $p_price = $row['pro_price'];
            $p_qty = $row['pro_qnty'];

            $item_query = "INSERT INTO `order_items` (order_id, product_id, product_name, price, quantity) 
                           VALUES ('$order_id', '$p_id', '$p_name', '$p_price', '$p_qty')";
            mysqli_query($con, $item_query);
        }

        // 3. Order place hone ke baad cart khali kar dein
        mysqli_query($con, "DELETE FROM `add_to_cart` WHERE user_id = '$uid'");
        unset($_SESSION['g_total']); // Session total bhi reset kar dein

        echo "<script>
                alert('Success! Your order has been placed successfully.');
                window.location.href='index.php'; 
              </script>";
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
?>


