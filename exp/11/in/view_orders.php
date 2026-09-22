<?php

include "db_connect.php";

$sql = "SELECT * FROM orders ORDER BY order_date DESC";

$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <title>All Orders</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e8f4f8;
            padding: 30px;
        }

        .box {
            width: 900px;
            margin: auto;
            background-color: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 0 10px #999;
        }

        h2 {
            text-align: center;
            color: #176b87;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th {
            background-color: #176b87;
            color: white;
            padding: 10px;
        }

        td {
            padding: 10px;
            border: 1px solid #aaa;
            text-align: center;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        a {
            display: block;
            width: 180px;
            margin: 20px auto;
            padding: 10px;
            text-align: center;
            background-color: #176b87;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>

<body>

<div class="box">

    <h2>All Orders</h2>

    <table>

        <tr>
            <th>Order ID</th>
            <th>Customer</th>
            <th>Product</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Order Date</th>
        </tr>

        <?php

        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {

                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['order_id']) . "</td>";
                echo "<td>" . htmlspecialchars($row['customer_name']) . "</td>";
                echo "<td>" . htmlspecialchars($row['product_name']) . "</td>";
                echo "<td>" . htmlspecialchars($row['quantity']) . "</td>";
                echo "<td>" . htmlspecialchars($row['price']) . "</td>";
                echo "<td>" . htmlspecialchars($row['order_date']) . "</td>";
                echo "</tr>";
            }

        } else {

            echo "<tr>";
            echo "<td colspan='6'>No orders found.</td>";
            echo "</tr>";
        }

        ?>

    </table>

    <a href="index.html">Place Another Order</a>

</div>

</body>
</html>

<?php

$conn->close();

?>