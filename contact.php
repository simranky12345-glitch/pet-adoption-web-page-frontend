<?php

$server = "localhost";
$username = "root";
$password = "";
$dbname = "adoption";


$con = mysqli_connect($server, $username, $password, $dbname);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $massege = $_POST['massege'];
 
    $sql = "INSERT INTO massege (name, email, phone, massege) VALUES ('$name', '$email', '$phone', '$massege')";

    if ($con->query($sql) === true) {
        echo "<script>alert('Your Massege Submitted!');</script>";
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }

} 
$con->close();

?>
