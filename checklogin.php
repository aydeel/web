
<?php
session_start();
include('connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize input
    $nama = mysqli_real_escape_string($condb, $_POST['nama']);
    $pass = mysqli_real_escape_string($condb, $_POST['pass']);
    $jenis = $_POST['jenis'];

    // Determine the table and fields based on user type
    if ($jenis == 'USER') {
        $table = "users";
        $usernameField = "userName";
        $passwordField = "userPass";
        $redirectPage = "mainpage.php";
    } elseif ($jenis == 'ADMIN') {
        $table = "admins";
        $usernameField = "adminsName";
        $passwordField = "adminsPass";
        $redirectPage = "adminpage.php";
    } else {
        // Invalid user type
        die("<script>alert('Invalid user type.'); window.location.href='loginpage.php';</script>");
    }

    // Query to check credentials
    $sql = "SELECT * FROM $table WHERE $usernameField = '$nama' AND $passwordField = '$pass'";
    $result = mysqli_query($condb, $sql);

    if ($result && mysqli_num_rows($result) == 1) {
        // Fetch user data
        $user = mysqli_fetch_assoc($result);

        // Set session variables
        $_SESSION['username'] = $user[$usernameField];
        $_SESSION['jenis'] = $jenis; // Store user type in session

        // Redirect based on user type
        if ($jenis === 'ADMIN') {
            header("Location: adminpage.php");
        } else {
            $_SESSION['userID'] = $user['userID']; // Assuming 'userID' is the primary key in 'users' table
            header("Location: mainpage.php");
        }
        exit();
    } else {
        // Invalid credentials
        echo "<script>alert('Invalid username or password.'); window.history.back();</script>";
        exit();
    }
} else {
    // Redirect if accessed directly without POST method
    header("Location: loginpage.php");
    exit();
}

mysqli_close($condb);
?>
