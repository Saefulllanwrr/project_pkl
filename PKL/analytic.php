<?php
session_start();
include 'db.php';

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Rooms</title>
    <link rel="stylesheet" href="admin.css" />

    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />

    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
    />
  </head>
  <body>
    <div class="d-flex" id="wrapper">
      <!-- Sidebar -->
      <div class="bg-white" id="sidebar-wrapper">
        <div
          class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase"
        >
          <i class="fas fa-hotel me-2"></i>Luxury Hotel
        </div>
        <div class="list-group list-group-flush my-3">
          <a href="admin.php" class="list-group-item list-group-item-action">
            <i class="fas fa-tachometer-alt me-3"></i>
            <span>Dashboard</span>
          </a>
          <a
            href="rooms.php"
            class="list-group-item list-group-item-action active"
          >
            <i class="fas fa-bed me-3"></i>
            <span>Rooms</span>
          </a>
          <a href="booking.php" class="list-group-item list-group-item-action">
            <i class="fas fa-calendar-check me-3"></i>
            <span>Bookings</span>
          </a>
          <a href="guest.php" class="list-group-item list-group-item-action">
            <i class="fas fa-users me-3"></i>
            <span>Guests</span>
          </a>
          <a href="analytic.php" class="list-group-item list-group-item-action">
            <i class="fas fa-chart-line me-3"></i>
            <span>Analytics</span>
          </a>
          <a
            href="setting.php"
            class="list-group-item list-group-item-action"
          >
            <i class="fas fa-cog me-3"></i>
            <span>Settings</span>
          </a>
          <a
            href="#"
            class="list-group-item list-group-item-action text-danger mt-auto"
          >
            <i class="fas fa-power-off me-3"></i>
            <span>Logout</span>
          </a>
        </div>
      </div>
      <!-- /#sidebar-wrapper -->

      <!-- Page Content -->
      <div id="page-content-wrapper">
        <nav
          class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4"
        >
          <div class="d-flex align-items-center">
            <i
              class="fas fa-align-left primary-text fs-4 me-3"
              id="menu-toggle"
            ></i>
            <h2 class="fs-2 m-0">Analytics</h2>
          </div>

          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
              <li class="nav-item dropdown">
                <a
                  class="nav-link dropdown-toggle second-text fw-bold"
                  href="#"
                  id="navbarDropdown"
                  role="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
                   <i class="fas fa-user me-2"></i>
                  <?php echo $_SESSION['username']  ?> 
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="#">Profile</a></li>
                  <li><a class="dropdown-item" href="#">Settings</a></li>
                  <li><a class="dropdown-item" href="#">Logout</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>

        <div class="container-fluid px-4">
            <div class="row g-3 my-2">
                <div class="col-md-6">
                    <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                        <div>
                            <?php
                            // Get today's bookings
                            $sql = "SELECT COUNT(*) as total FROM booking WHERE DATE(check_in) = CURDATE()";
                            $result = mysqli_query($conn, $sql);
                            $data = mysqli_fetch_assoc($result);
                            ?>
                            <h3 class="fs-2"><?php echo $data['total']; ?></h3>
                            <p class="fs-5">Today's Bookings</p>
                        </div>
                        <i class="fas fa-book fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                        <div>
                            <?php
                            // Get today's confirmed bookings
                            $sql = "SELECT COUNT(*) as total FROM booking WHERE DATE(check_in) = CURDATE() AND status='Confirmed'";
                            $result = mysqli_query($conn, $sql);
                            $data = mysqli_fetch_assoc($result);
                            ?>
                            <h3 class="fs-2"><?php echo $data['total']; ?></h3>
                            <p class="fs-5">Today's Confirmed Bookings</p>
                        </div>
                        <i class="fas fa-check-circle fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                    </div>
                </div>
            </div>

            <div class="row my-5">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="fs-4 mb-0">Daily Booking Statistics</h3>
                        </div>
                        <div class="card-body">
                            <canvas id="bookingChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Chart.js -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        
        <script>
            <?php
            // Get confirmed booking dates only
            $sql = "SELECT 
                    DATE(check_in) as date,
                    COUNT(*) as total_bookings
                    FROM booking 
                    WHERE status = 'Confirmed'
                    GROUP BY DATE(check_in)
                    ORDER BY date";
            $result = mysqli_query($conn, $sql);
            
            $dates = [];
            $totalBookings = [];
            
            while($row = mysqli_fetch_assoc($result)) {
                $dates[] = date('d M Y', strtotime($row['date']));
                $totalBookings[] = $row['total_bookings'];
            }
            ?>

            // Create the chart
            const ctx = document.getElementById('bookingChart').getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: <?php echo json_encode($dates); ?>,
                    datasets: [
                        {
                            label: 'Confirmed Bookings',
                            data: <?php echo json_encode($totalBookings); ?>,
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.5)',   // Merah
                                'rgba(54, 162, 235, 0.5)',   // Biru
                                'rgba(255, 206, 86, 0.5)',   // Kuning
                                'rgba(75, 192, 192, 0.5)',   // Tosca
                                'rgba(153, 102, 255, 0.5)',  // Ungu
                                'rgba(255, 159, 64, 0.5)',   // Orange
                                'rgba(199, 199, 199, 0.5)'   // Abu-abu
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)',
                                'rgba(199, 199, 199, 1)'
                            ],
                            borderWidth: 1
                        }
                    ]
                },
                options: {
                    responsive: true,
                    plugins: {
                        title: {
                            display: true,
                            text: 'Daily Confirmed Booking Trends'
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                stepSize: 1
                            }
                        }
                    }
                }
            });
        </script>