<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "login_sample_db";
    // connect to the database
    $con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
    // check connection
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    // retrieve product data from the database
    $sql = "SELECT * FROM products";
    $result = mysqli_query($con, $sql);
    // close connection
    mysqli_close($con);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Products</title>
    <style>
        body {
            background-color: #333;
            color: #fff;
            text-align: center;
        }
        table {
            margin: 0 auto;
            width: 50%;
            text-align: left;
        }
        th, td {
            padding: 10px;
        }
        th {
            background-color: #5900ff;
            color: #fff;
        }
        tr:nth-child(even) {
            background-color: #555;
        }
        tr:hover {
            background-color: #777;
        }
        a {
            display: inline-block;
            background-color: #5900ff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            margin-top: 20px;
            text-decoration: none;
            cursor: pointer;
        }
        a:hover {
            background-color: #6c1aff;
        }
    </style>
</head>
<body>
    <h1>Products</h1>
    <table>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php while($row = mysqli_fetch_array($result)) { ?>
        <tr>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td><?php echo $row['price']; ?></td>
            <td><a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a></td>
            <td><a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>
        </tr>
        <?php } ?>
    </table>
    <a href="add.php">Add Product</a>
</body>
</html>