<!DOCTYPE html>
<html>
<head>
	<title>Orders Page</title>
	<style>
		body {
			background-color: #333333;
			color: white;
			font-family: Arial, sans-serif;
			font-size: 16px;
			line-height: 1.5;
			padding: 20px;
		}

		h1 {
			color: #5900ff;
			font-size: 32px;
			margin-bottom: 20px;
		}

		table {
			border-collapse: collapse;
			margin-bottom: 20px;
			width: 100%;
		}

		table th,
		table td {
			border: 1px solid #5900ff;
			padding: 10px;
			text-align: left;
		}

		table th {
			background-color: #5900ff;
			color: white;
		}

		form {
			margin-bottom: 20px;
		}

		form label {
			display: block;
			margin-bottom: 5px;
		}

		form input[type="text"],
		form input[type="number"] {
			border: 1px solid #5900ff;
			padding: 5px;
			width: 100%;
		}

		form input[type="submit"] {
			background-color: #5900ff;
			border: none;
			color: white;
			cursor: pointer;
			margin-top: 10px;
			padding: 10px;
			width: auto;
		}

		form input[type="submit"]:hover {
			background-color: #4500b3;
		}

		form input[type="hidden"] {
			display: none;
		}

		form .delete {
			background-color: #ff0000;
			margin-left: 10px;
		}

		form .delete:hover {
			background-color: #b30000;
		}
	</style>
</head>
<body>
	<div class="container">
		<h1>Orders</h1>

		<?php
		// Connect to the database
        $dbhost = "localhost";
        $dbuser = "root";
        $dbpass = "";
        $dbname = "login_sample_db";

		$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

			// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}

			// Handle form submissions
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				if (isset($_POST["add"])) {
					// Add order
					$customer_name = $_POST["customer_name"];
					$product = $_POST["product"];
					$quantity = $_POST["quantity"];
					$price = $_POST["price"];

					$sql = "INSERT INTO orders (customer_name, product, quantity, price)
							VALUES ('$customer_name', '$product', $quantity, $price)";

					if ($conn->query($sql) === TRUE) {
						echo "Order added successfully<br>.";
					} else {
						echo "Error adding order: " . $conn->error;
					}
				} elseif (isset($_POST["delete"])) {
					// Delete order
					$order_id = $_POST["order_id"];

					$sql = "DELETE FROM orders WHERE id = $order_id";				if ($conn->query($sql) === TRUE) {
                        echo "Order deleted successfully.<br>";
                    } else {
                        echo "Error deleting order: " . $conn->error;
                    }
                }
            }
    
            // Fetch orders from database
            $sql = "SELECT * FROM orders";
            $result = $conn->query($sql);
    
            if ($result->num_rows > 0) {
                // Display orders in table
                echo "<table>";
                echo "<tr>";
                echo "<th>ID</th>";
                echo "<th>Customer Name</th>";
                echo "<th>Product</th>";
                echo "<th>Quantity</th>";
                echo "<th>Price</th>";
                echo "<th>Action</th>";
                echo "</tr>";
    
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["customer_name"] . "</td>";
                    echo "<td>" . $row["product"] . "</td>";
                    echo "<td>" . $row["quantity"] . "</td>";
                    echo "<td>" . $row["price"] . "</td>";
                    echo "<td>";
                    echo "<form method='post'>";
                    echo "<input type='hidden' name='order_id' value='" . $row["id"] . "'>";
                    echo "<input type='submit' name='delete' value='Delete' class='delete'>";
                    echo "</form>";
                    echo "</td>";
                    echo "</tr>";
                }
    
                echo "</table>";
            } else {
                echo "No orders found<br>";
            }
    
            // Close database connection
            $conn->close();
        ?>
    
        <h2>Add Order</h2>
        <form method="post">
            <label for="customer_name">Customer Name:</label>
            <input type="text" name="customer_name" id="customer_name" required>
    
            <label for="product">Product:</label>
            <input type="text" name="product" id="product" required>
    
            <label for="quantity">Quantity:</label>
            <input type="number" name="quantity" id="quantity" min="1" required>
    
            <label for="price">Price:</label>
            <input type="number" name="price" id="price" step="0.01" min="0" required>
    
            <input type="submit" name="add" value="Add Order">
        </form>
    </div>
    </body>
    </html>