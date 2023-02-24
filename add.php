<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "login_sample_db";
    // check if the form was submitted
    if(isset($_POST['name'])){
        // connect to the database
        $con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
        // check connection
        if (mysqli_connect_errno()){
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        // get data from the form
        $name = mysqli_real_escape_string($con, $_POST['name']);
        $description = mysqli_real_escape_string($con, $_POST['description']);
        $price = mysqli_real_escape_string($con, $_POST['price']);
        // insert data into the database
        $sql = "INSERT INTO products (name, description, price) VALUES ('$name', '$description', '$price')";
        if(mysqli_query($con, $sql)){
            // redirect to the index page
            header("Location: index.php");
            exit();
        } else{
            echo "Error: " . mysqli_error($con);
        }
        // close connection   
         mysqli_close($con);
    }
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Add Product</title>
        <style>
            body {
                background-color: #333;
                color: #fff;
                text-align: center;
            }
            form {
                margin: 0 auto;
                width: 50%;
                text-align: left;
            }
            input[type=text], textarea, input[type=number] {
                width: 100%;
                padding: 12px;
                border: none;
                border-radius: 4px;
                box-sizing: border-box;
                margin-top: 6px;
                margin-bottom: 16px;
                resize: vertical;
            }
            input[type=submit] {
                background-color: #5900ff;
                color: #fff;
                padding: 12px 20px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
            }
            input[type=submit]:hover {
                background-color: #6c1aff;
            }
        </style>
    </head>
    <body>
        <h1>Add Product</h1>
        <form action="" method="POST">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            <label for="description">Description:</label>
            <textarea id="description" name="description" required></textarea>
            <label for="price">Price:</label>
            <input type="number" id="price" name="price" required>
            <input type="submit" value="Add Product">
        </form>
    </body>
    </html>
    <?php
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "login_sample_db";
    // check if the form was submitted
    if(isset($_POST['id'])){
        // connect to the database
        $con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
        // check connection
        if (mysqli_connect_errno()){
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        // get data from the form
        $id = mysqli_real_escape_string($con, $_POST['id']);
        $name = mysqli_real_escape_string($con, $_POST['name']);
        $description = mysqli_real_escape_string($con, $_POST['description']);
        $price = mysqli_real_escape_string($con, $_POST['price']);
        // update data in the database
        $sql = "UPDATE products SET name='$name', description='$description', price='$price' WHERE id='$id'";
        if(mysqli_query($con, $sql)){
            // redirect to the index page
            header("Location: index.php");
            exit();
        } else{
            echo "Error: " . mysqli_error($con);
        }
        // close connection
        mysqli_close($con);
    } else {
        // retrieve product data from the database
        // connect to the database
        $con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
        // check connection
        if (mysqli_connect_errno()){
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        // get id from the url
        $id = mysqli_real_escape_string($con, $_GET['id']);
        // retrieve data from the database
        $sql = "SELECT * FROM products WHERE id='$id'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result);
        // close connection
        mysqli_close($con);
    }
?>