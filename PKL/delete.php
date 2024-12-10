<?php
include 'db.php'; // Pastikan untuk menyertakan koneksi database

if (isset($_GET['id'])) { // Changed 'id_book' to 'id' to match the parameter used in the delete link
    $id = $_GET['id']; // Changed 'id_book' to 'id'

    // Menghapus data dari tabel recent_bookings
    $sql = "DELETE FROM booking WHERE id_booking = ?";
    $stmt = $conn->prepare($sql);
    
    if ($stmt) { // Check if the statement was prepared successfully
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            // Redirect ke halaman admin.php setelah berhasil menghapus
            header("Location: admin.php?message=sukses");
            exit();
        } else {
            echo "Error deleting record: " . $stmt->error; // Use $stmt->error instead of $conn->error
        }

        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error; // Added error handling for statement preparation
    }
}

$conn->close();
?>