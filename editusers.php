<?php
session_start();
include('connection.php');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userID = mysqli_real_escape_string($condb, $_POST['userID']);
    $userName = mysqli_real_escape_string($condb, $_POST['userName']);
    $userIC = mysqli_real_escape_string($condb, $_POST['userIC']);
    $userEmail = mysqli_real_escape_string($condb, $_POST['userEmail']);
    $userPhone = mysqli_real_escape_string($condb, $_POST['userPhone']);

    // Update the user data
    $sql = "UPDATE users SET userName='$userName', userIC='$userIC', userEmail='$userEmail', userPhone='$userPhone' WHERE userID='$userID'";

    if (mysqli_query($condb, $sql)) {
        echo "<script>alert('Data Successfully Updated'); window.location.href = 'manageuserpage.php';</script>";
    } else {
        echo "<script>alert('Data Update Failed'); window.history.back();</script>";
    }
} else {
    // Fetch the current data for the user
    if (isset($_GET['userID'])) {
        $userID = mysqli_real_escape_string($condb, $_GET['userID']);
        $sql = "SELECT * FROM users WHERE userID='$userID'";
        $result = mysqli_query($condb, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $data = mysqli_fetch_assoc($result);
        } else {
            die("<script>alert('User Not Found'); window.history.back();</script>");
        }
    } else {
        die("<script>alert('Unauthorized Access'); window.history.back();</script>");
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
        /* Add your styles here */
    </style>
</head>
<body>

<div class="w3-container">
    <h3><b>Edit User</b></h3>

    <form method="POST" action="editusers.php">
        <input type="hidden" name="userID" value="<?php echo htmlspecialchars($data['userID']); ?>">
        <p>
            <label>Name</label>
            <input class="w3-input" type="text" name="userName" value="<?php echo htmlspecialchars($data['userName']); ?>" required>
        </p>
        <p>
            <label>IC</label>
            <input class="w3-input" type="text" name="userIC" value="<?php echo htmlspecialchars($data['userIC']); ?>" required>
        </p>
        <p>
            <label>Email</label>
            <input class="w3-input" type="email" name="userEmail" value="<?php echo htmlspecialchars($data['userEmail']); ?>" required>
        </p>
        <p>
            <label>Phone</label>
            <input class="w3-input" type="text" name="userPhone" value="<?php echo htmlspecialchars($data['userPhone']); ?>" required>
        </p>
        <p>
            <button class="w3-button w3-green" type="submit">Update</button>
        </p>
    </form>
</div>

</body>
</html>
