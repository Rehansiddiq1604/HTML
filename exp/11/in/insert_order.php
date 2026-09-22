<?php

include "db_connect.php";

$customer_name = $_POST['customer_name'];
$product_name = $_POST['product_name'];
$quantity = $_POST['quantity'];
$price = $_POST['price'];

$sql = "INSERT INTO orders (customer_name, product_name, quantity, price)
        VALUES (?, ?, ?, ?)";

$stmt = $conn->prepare($sql);

$stmt->bind_param("ssid", $customer_name, $product_name, $quantity, $price);

if ($stmt->execute()) {
    echo "<!DOCTYPE html>";
    echo "<html>";
    echo "<head>";
    echo "<title>Order Successful</title>";
    echo "<style>";
    echo "body{font-family:Arial;background-color:#e8f4f8;text-align:center;padding:80px;}";
    echo ".box{background:white;width:500px;margin:auto;padding:30px;border-radius:10px;box-shadow:0 0 10px #999;}";
    echo "h2{color:#176b87;}";
    echo "a{display:inline-block;margin-top:20px;padding:10px 20px;background:#176b87;color:white;text-decoration:none;border-radius:5px;}";
    echo "</style>";
    echo "</head>";
    echo "<body>";
    echo "<div class='box'>";
    echo "<h2>Order Placed Successfully!</h2>";
    echo "<p>Your order has been saved in the database.</p>";
    echo "<a href='view_orders.php'>View All Orders</a>";
    echo "</div>";
    echo "</body>";
    echo "</html>";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();

?>