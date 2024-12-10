<?php
session_start();
include 'db.php';

// Tangkap input pencarian
$search_query = '';
$search_term = '';

if (isset($_GET['search']) && !empty($_GET['search'])) {
    $search_term = mysqli_real_escape_string($conn, $_GET['search']);
    $search_query = "WHERE name LIKE '%$search_term%' OR room_type LIKE '%$search_term%'";
}

// Query untuk mendapatkan data booking
$sql = "SELECT * FROM booking $search_query ORDER BY id_booking DESC";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="admin.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
</head>
<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase">
                <i class="fas fa-hotel me-2"></i>Luxury Hotel
            </div>
            <div class="list-group list-group-flush my-3">
                <a href="#" class="list-group-item list-group-item-action">
                    <i class="fas fa-tachometer-alt me-3"></i>Dashboard
                </a>
                <a href="rooms.php" class="list-group-item list-group-item-action">
                    <i class="fas fa-bed me-3"></i>Rooms
                </a>
                <a href="booking.php" class="list-group-item list-group-item-action active">
                    <i class="fas fa-calendar-check me-3"></i>Bookings
                </a>
                <a href="guest.php" class="list-group-item list-group-item-action">
                    <i class="fas fa-users me-3"></i>Guests
                </a>
                <a href="analytics.html" class="list-group-item list-group-item-action">
                    <i class="fas fa-chart-line me-3"></i>Analytics
                </a>
                <a href="setting.php" class="list-group-item list-group-item-action">
                    <i class="fas fa-cog me-3"></i>Settings
                </a>
                <a href="logout.php" class="list-group-item list-group-item-action mt-auto">
                    <i class="fas fa-power-off me-3"></i>Logout
                </a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Dashboard</h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user me-2"></i>
                                <?php echo $_SESSION['username']; ?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Form Search -->
            <form class="d-flex ms-auto" style="max-width: 300px;" method="GET" action="booking.php">
                <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search" autocomplete="off">
                <button class="btn btn-primary" type="submit">Search</button>
            </form>

            <!-- Notifikasi Pencarian -->
            <?php if (!empty($search_term)): ?>
                <p class="alert alert-info">Hasil pencarian untuk: <strong><?= htmlspecialchars($search_term) ?></strong></p>
            <?php endif; ?>

            <div class="row my-6 mx-3">
                <h3 class="fs-4 mb-3">Recent Bookings</h3>
                <div class="col">
                    <table class="table bg-white rounded shadow-sm table-hover">
                        <thead>
                            <tr>
                                <th scope="col" width="50">ID</th>
                                <th scope="col">Guest Name</th>
                                <th scope="col">Room Type</th>
                                <th scope="col">Check In</th>
                                <th scope="col">Check Out</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <tr>
                                <th scope="row"><?= $row['id_booking'] ?></th>
                                <td><?= $row['name'] ?></td>
                                <td><?= $row['room_type'] ?></td>
                                <td><?= $row['check_in'] ?></td>
                                <td><?= $row['check_out'] ?></td>
                                <td>
                                    <span class="<?= $row['status'] == 'pending' ? 'text-warning' : ($row['status'] == 'confirmed' ? 'text-success' : 'text-danger') ?>">
                                        <?= $row['status'] ?>
                                    </span>
                                </td>
                                <td>
                                    <a href="edit.php?id=<?= $row['id_booking'] ?>" class="btn btn-warning btn-sm" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="delete.php?id=<?= $row['id_booking'] ?>" class="btn btn-danger btn-sm" title="Delete" onclick="return confirm('Are you sure you want to delete this booking?');">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php
                            }
                        } else {
                            echo "<tr><td colspan='7' class='text-center'>No matching records found.</td></tr>";
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>
</body>
</html>
