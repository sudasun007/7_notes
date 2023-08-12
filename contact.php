<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "7notes";

    
    $conn = new mysqli($servername, $username, $password, $dbname);

    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    
    $sql = "INSERT INTO contactdetails (name,email, message) VALUES (' $name','$email', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>window.location.href='index.php'</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

   
    $conn->close();
}

?>