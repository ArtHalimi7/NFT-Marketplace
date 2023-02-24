<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "login_sample_db";

$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

    // check connection
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    // check if the form was submitted
    if(isset($_POST['id'])){
        // get data from the form
        $id = mysqli_real_escape_string($con, $_POST['id']);
        // delete data from the database
        $sql = "DELETE FROM products WHERE id='$id'";
        if(mysqli_query($con, $sql)){
            // redirect to the index page
            header("Location: index.php");
            exit();
        } else{
            echo "Error: " . mysqli_error($con);
        }
    } else{
        // retrieve product data from the database
        $id = mysqli_real_escape_string($con, $_GET['id']);
        $sql = "SELECT * FROM products WHERE id='$id'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result);
    }
    // close connection
    mysqli_close($con);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Delete Product</title>
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
        label {
            display: block;
            margin-top: 10px;
        }
        input[type=submit] {
            background-color: #ff0000;
            color: #fff;
            border: none;
            padding: 10px 20px;
            margin-top: 20px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Delete Product</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <p>Are you sure you want to delete <?php echo $row['name']; ?>?</p>
        <input type="submit" value="Delete Product">
    </form>
</body>
</html>