<!DOCTYPE html>
<html>
<head>
	<title>Customer Management System</title>
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
	<h1>Customer Management System</h1>
	<?php
		// Connect to the database
        $dbhost = "localhost";
        $dbuser = "root";
        $dbpass = "";
        $dbname = "login_sample_db";

		$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

		// Check connection
		if (!$conn) {
		    die("Connection failed: " . mysqli_connect_error());
		}

		// Check if the form is submitted
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			// Retrieve form data
			$name = $_POST["name"];
			$email = $_POST["email"];
			$phone = $_POST["phone"];
			$address = $_POST["address"];

			// Insert customer data into the database
			$sql = "INSERT INTO customers (name, email, phone, address) VALUES ('$name', '$email', '$phone', '$address')";

			if (mysqli_query($conn, $sql)) {
				echo "<p>Customer added successfully.</p>";
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
		}

		// Retrieve customer data from the database
		$sql = "SELECT * FROM customers";
		$result = mysqli_query($conn, $sql);

		// Display customer data in a table
		if (mysqli_num_rows($result) > 0) {
			echo "<table>";
			echo "<tr><th>Name</th><th>Email</th><th>Phone</th><th>Address</th></tr>";
			while($row = mysqli_fetch_assoc($result)) {
				echo "<tr><td>".$row["name"]."</td><td>".$row["email"]."</td><td>".$row["phone"]."</td><td>".$row["address"]."</td></tr>";
			}
			echo "</table>";
		} else {
			echo "<p>No customers found.</p>";
		}

		// Close database connection
		mysqli_close($conn);
	?>

	<h2>Add Customer</h2>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
		<label>Name:</label><br>
		<input type="text" name="name"><br>
		<label>Email:</label><br>
		<input type="email" name="email"><br>
		<label>Phone:</label><br>
		<input type="tel" name="phone"><br>
		<label>Address:</label><br>
		<textarea name="address"></textarea><br>
		<input type="submit" value="Add Customer">
	</form>
</body>
</html>