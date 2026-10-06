<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Online Book Store</title>

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

            <span class="welcome">
                Hello, <?php echo htmlspecialchars($_SESSION['user_name']); ?>
            </span>

            <a href="logout.php">Logout</a>

        <?php else: ?>

            <a href="login.php">Login</a>
            <a href="register.php">Register</a>

        <?php endif; ?>

    </nav>
</header>

<section class="hero">

    <div>
        <h1>Welcome to Online Book Store</h1>

        <p>
            Discover your next favorite book.
            Buy books online at affordable prices.
        </p>

        <a href="books.php" class="btn">
            Browse Books
        </a>
    </div>

</section>

<section class="features">

    <div class="feature">
        <h2>📚 Large Collection</h2>
        <p>Find books from different categories.</p>
    </div>

    <div class="feature">
        <h2>💰 Affordable Prices</h2>
        <p>Buy your favorite books at great prices.</p>
    </div>

    <div class="feature">
        <h2>🚚 Easy Ordering</h2>
        <p>Place your order quickly and easily.</p>
    </div>

</section>

<footer>
    <p>© 2026 Online Book Store</p>
</footer>

</body>
</html>
