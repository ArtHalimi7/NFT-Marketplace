<!DOCTYPE html>
<html>
<head>
	<title>Admin Table</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
		body {
			background-color: #1a1a1a;
			color: #fff;
			font-size: 16px;
			line-height: 1.5;
			margin: 0;
			padding: 0;
			text-align: center;
		}
		table {
			border-collapse: collapse;
			width: 100%;
		}
		th, td {
			padding: 10px;
			text-align: left;
			border-bottom: 1px solid #ddd;
		}
		th {
			background-color: #5900ff;
			color: #fff;
		}
		.dropdown {
			position: relative;
			display: inline-block;
		}
		.dropdown-content {
			display: none;
			position: absolute;
			background-color: #f9f9f9;
			min-width: 160px;
			box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
			z-index: 1;
		}
		.dropdown:hover .dropdown-content {
			display: block;
		}
		.dropdown-content a {
			color: #000;
			padding: 12px 16px;
			text-decoration: none;
			display: block;
		}
		.dropdown-content a:hover {
			background-color: #ddd;
		}
		@media screen and (max-width: 600px) {
			table, thead, tbody, th, td, tr {
				display: block;
			}
			th {
				text-align: center;
			}
			th, td {
				border: none;
			}
			th:first-child {
				border-top: 1px solid #ddd;
			}
			td:first-child {
				border-top: none;
			}
			td:last-child {
				border-bottom: none;
			}
		}
	</style>
</head>
<body>
	<h1>Admin Table</h1>
	<div class="dropdown">
		<button class="dropdown">Customers</button>
		<div class="dropdown-content">
			<a href="customers.php">Add Customer</a>
		</div>
	</div>
	<div class="dropdown">
		<button class="dropdown">Products</button>
		<div class="dropdown-content">
			<a href="products.php">Add Product</a>
		</div>
	</div>
	<div class="dropdown">
		<button class="dropdown">Orders</button>
		<div class="dropdown-content">
			<a href="orders.php">Add Order</a>
			<a href="orders.php">View Orders</a>
		</div>
	</div>
	<?php
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$dbname = "login_sample_db";

		// Create connection
		$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		// Close connection
		mysqli_close($conn);

		// Connect to the database
		$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
	
		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
	
		// Create customers table
		$sql = "CREATE TABLE customers (
			id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			name VARCHAR(50) NOT NULL,
			email VARCHAR(50) NOT NULL,
			phone VARCHAR(15) NOT NULL,
			address VARCHAR(255) NOT NULL,
			city VARCHAR(50) NOT NULL,
			state VARCHAR(50) NOT NULL,
			zip VARCHAR(10) NOT NULL
		)";
	
		if (mysqli_query($conn, $sql)) {

		} else {

		}
	
		// Create products table
		$sql = "CREATE TABLE products (
			id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			name VARCHAR(50) NOT NULL,
			description VARCHAR(255) NOT NULL,
			price DECIMAL(10,2) NOT NULL,
			quantity INT(6) NOT NULL
		)";
	
		if (mysqli_query($conn, $sql)) {

		} else {

		}
	
		// Create orders table
		$sql = "CREATE TABLE orders (
			id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			customer_id INT(6) NOT NULL,
			product_id INT(6) NOT NULL,
			quantity INT(6) NOT NULL,
			price DECIMAL(10,2) NOT NULL,
			order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
		)";
	
		if (mysqli_query($conn, $sql)) {

		} else {
			
		}
	
		// Close connection
		mysqli_close($conn);
	?>
	<table>
		<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Email</th>
				<th>Phone</th>
				<th>Address</th>
				<th>City</th>
				<th>State</th>
				<th>Zip</th>
			</tr>
		</thead>
		<tbody>
			<br><br><br>
			<div>
			<a href="logout.php">Logout</a>
			</div>
			<?php
				// Connect to the database
				$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
	
				// Check connection
				if (!$conn) {
					die("Connection failed: " . mysqli_connect_error());
				}
	
				// Select all customers
				$sql = "SELECT * FROM customers";
				$result = mysqli_query($conn, $sql);
	
				// Loop through all customers and display them in the table
				if (mysqli_num_rows($result) > 0) {
					while($row = mysqli_fetch_assoc($result)) {
						echo "<tr>";
						echo "<td>" . $row["id"] . "</td>";
						echo "<td>" . $row["name"] . "</td>";
						echo "<td>" . $row["email"] .
						"</td>";
echo "<td>" . $row["phone"] . "</td>";
echo "<td>" . $row["address"] . "</td>";
echo "<td>" . $row["city"] . "</td>";
echo "<td>" . $row["state"] . "</td>";
echo "<td>" . $row["zip"] . "</td>";
echo "</tr>";
}
} else {
echo "<tr><td colspan='8'>No customers found</td></tr>";
}
// Close connection
mysqli_close($conn);
?>
</tbody>
</table>
</body>
</html>
<style>
	body {
		background-color: #1a1a1a;
		color: #fff;
		font-family: Arial, Helvetica, sans-serif;
		font-size: 14px;
	}

	table {
		border-collapse: collapse;
		margin: 50px auto;
		width: 80%;
	}

	th, td {
		border: 1px solid #5900ff;
		padding: 8px;
		text-align: left;
	}

	th {
		background-color: #5900ff;
		color: #fff;
	}

	tr:nth-child(even) {
		background-color: #333;
	}

	tr:hover {
		background-color: #444;
	}
</style>