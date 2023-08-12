<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ID = $_POST["ID"];
    $Title = $_POST["Title"];
    $Description = $_POST["Description"];

    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "7notes";

    
    $conn = new mysqli($servername, $username, $password, $dbname);

    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    
    $sql = "INSERT INTO form2 (ID, Title,Description) VALUES ('$ID', '$Title','$Description')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>window.location.href='index2.php'</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

   
    $conn->close();
}

?>