<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id_booking'])) {
    $id = $_GET['id_booking'];

    // Prepare the statement to prevent SQL injection
    $stmt = $conn->prepare("UPDATE booking SET status=? WHERE id_booking=?");
    $status = 'confirmed';
    $stmt->bind_param("si", $status, $id);

    if ($stmt->execute()) {
        // Redirect back to admin page with success message
        header("Location: admin.php?status=confirmed");
        exit();
    } else {
        echo "Error updating record: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Invalid request.";
}
?>