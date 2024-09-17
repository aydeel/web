<?php
include('connection.php');

if (isset($_GET['eventID'])) {
    $eventID = mysqli_real_escape_string($condb, $_GET['eventID']);

    // Fetch the event to get the image path
    $sql_fetch = "SELECT eventPNG FROM events WHERE eventID='$eventID'";
    $result = mysqli_query($condb, $sql_fetch);

    if (mysqli_num_rows($result) > 0) {
        $event = mysqli_fetch_assoc($result);
        $imagePath = $event['eventPNG'];

        // Delete the event from the database
        $sql_delete = "DELETE FROM events WHERE eventID='$eventID'";

        if (mysqli_query($condb, $sql_delete)) {
            // Delete the image file if it exists
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }

            echo "<script>alert('Event deleted successfully.'); window.location.href='manageeventspage.php';</script>";
        } else {
            echo "<script>alert('Failed to delete the event.'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('Event not found.'); window.location.href='manageeventspage.php';</script>";
    }
} else {
    echo "<script>alert('Invalid access.'); window.location.href='manageeventspage.php';</script>";
}

mysqli_close($condb);
?>
