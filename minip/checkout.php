<?php

session_start();

include "db.php";

if (!isset($_SESSION["user_id"])) {

    header("Location: login.php");
    exit();
}

if (empty($_SESSION["cart"])) {

    header("Location: books.php");
    exit();
}

$user_id = $_SESSION["user_id"];

$total = 0;

$cartBooks = [];

/* Get cart books */

foreach ($_SESSION["cart"] as $book_id => $quantity) {

    $stmt = $conn->prepare(
        "SELECT id, price
         FROM books
         WHERE id = ?"
    );

    $stmt->bind_param("i", $book_id);

    $stmt->execute();

    $result = $stmt->get_result();

    $book = $result->fetch_assoc();

    if ($book) {

        $subtotal =
            $book["price"] * $quantity;

        $total += $subtotal;

        $cartBooks[] = [
            "id" => $book["id"],
            "quantity" => $quantity,
            "price" => $book["price"]
        ];
    }
}

/* Place order */

$stmt = $conn->prepare(
    "INSERT INTO orders (user_id, total)
     VALUES (?, ?)"
);

$stmt->bind_param(
    "id",
    $user_id,
    $total
);

$stmt->execute();

$order_id = $stmt->insert_id;

$stmt->close();

/* Insert order items */

foreach ($cartBooks as $item) {

    $stmt = $conn->prepare(
        "INSERT INTO order_items
        (order_id, book_id, quantity, price)
        VALUES (?, ?, ?, ?)"
    );

    $stmt->bind_param(
        "iiid",
        $order_id,
        $item["id"],
        $item["quantity"],
        $item["price"]
    );

    $stmt->execute();

    $stmt->close();
}

/* Empty cart */

$_SESSION["cart"] = [];

?>

<!DOCTYPE html>
<html>

<head>

    <title>Order Successful</title>

    <link rel="stylesheet"
          href="css/style.css">

</head>

<body>

<header>

    <div class="logo">
        📚 BookStore
    </div>

    <nav>

        <a href="index.php">Home</a>

        <a href="books.php">Books</a>

        <a href="logout.php">Logout</a>

    </nav>

</header>

<div class="form-container">

    <h2>Order Successful 🎉</h2>

    <div class="success">

        Your order has been placed successfully.

    </div>

    <p>
        Order ID:
        <strong>
            <?php echo $order_id; ?>
        </strong>
    </p>

    <br>

    <p>
        Total Amount:
        <strong>
            ₹<?php echo number_format($total, 2); ?>
        </strong>
    </p>

    <br>

    <a href="books.php" class="btn">
        Continue Shopping
    </a>

</div>

</body>
</html>
