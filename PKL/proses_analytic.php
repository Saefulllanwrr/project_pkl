<?php
session_start();
include 'db.php';

// Get total bookings
$sql_total = "SELECT COUNT(*) as total FROM booking";
$result_total = mysqli_query($conn, $sql_total);
$total_bookings = mysqli_fetch_assoc($result_total)['total'];

// Get confirmed bookings
$sql_confirmed = "SELECT COUNT(*) as total FROM booking WHERE status='Confirmed'";
$result_confirmed = mysqli_query($conn, $sql_confirmed);
$confirmed_bookings = mysqli_fetch_assoc($result_confirmed)['total'];

// Get booking statistics for last 7 days
$sql_stats = "SELECT DATE(check_in) as date, COUNT(*) as count 
              FROM booking 
              GROUP BY DATE(check_in) 
              ORDER BY date 
              LIMIT 7";
$result_stats = mysqli_query($conn, $sql_stats);

$dates = array();
$counts = array();

while($row = mysqli_fetch_assoc($result_stats)) {
    $dates[] = $row['date'];
    $counts[] = $row['count'];
}

// Store data in session for use in analytic.php
$_SESSION['analytics'] = array(
    'total_bookings' => $total_bookings,
    'confirmed_bookings' => $confirmed_bookings,
    'dates' => $dates,
    'counts' => $counts
);

// Redirect back to analytics page
header("Location: analytic.php");
exit();
?>
