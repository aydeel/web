<?php
include('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize input data
    $email = mysqli_real_escape_string($condb, $_POST['email']);
    $username = mysqli_real_escape_string($condb, $_POST['username']);
    $ic = mysqli_real_escape_string($condb, $_POST['ic']);
    $phone = mysqli_real_escape_string($condb, $_POST['phone']);
    $pass = mysqli_real_escape_string($condb, $_POST['pass']);
    
    
    // Insert data into the database
    $sql = "INSERT INTO users (userName, userEmail, userPhone, userIC, userPass) VALUES ('$username', '$email', '$phone', '$ic', '$pass')";
    
    if (mysqli_query($condb, $sql)) {
        echo "New user registered successfully";
        // Redirect to a login page or another page if needed
        header("Location: loginpage.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($condb);
    }
}

// Close the database connection
mysqli_close($condb);
?>
