<?php

session_start();

include "db.php";

$sql = "SELECT * FROM books ORDER BY id DESC";

$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Books - Online Book Store</title>

    <link rel="stylesheet" href="css/style.css">

</head>

<body>

<header>

    <div class="logo">
        📚 BookStore
    </div>

    <nav>

        <a href="index.php">Home</a>

        <a href="books.php">Books</a>

        <a href="cart.php">Cart</a>

        <?php if (isset($_SESSION['user_id'])): ?>

            <a href="logout.php">Logout</a>

        <?php else: ?>

            <a href="login.php">Login</a>

        <?php endif; ?>

    </nav>

</header>

<div class="container">

    <h1 class="page-title">
        Our Books
    </h1>

    <input
        type="text"
        id="searchInput"
        class="search-box"
        placeholder="Search books by title or author..."
    >

    <div class="book-grid">

        <?php while ($book = $result->fetch_assoc()): ?>

            <div class="book-card">

                <img
                    src="images/<?php echo htmlspecialchars($book['image']); ?>"
                    alt="Book"
                >

                <h3>
                    <?php echo htmlspecialchars($book['title']); ?>
                </h3>

                <p>
                    Author:
                    <?php echo htmlspecialchars($book['author']); ?>
                </p>

                <p>
                    Category:
                    <?php echo htmlspecialchars($book['category']); ?>
                </p>

                <p class="price">
                    ₹<?php echo number_format($book['price'], 2); ?>
                </p>

                <p>
                    <?php echo htmlspecialchars($book['description']); ?>
                </p>

                <br>

                <a
                    href="cart.php?add=<?php echo $book['id']; ?>"
                    class="btn"
                >
                    Add to Cart
                </a>

            </div>

        <?php endwhile; ?>

    </div>

</div>

<footer>
    <p>© 2026 Online Book Store</p>
</footer>

<script src="js/script.js"></script>

</body>
</html>
