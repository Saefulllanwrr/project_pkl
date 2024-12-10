<?php
session_start(); // Start the session
include 'db.php';

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard</title>
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
          <a href="#" class="list-group-item list-group-item-action active">
            <i class="fas fa-tachometer-alt me-3"></i>
            <span>Dashboard</span>
          </a>
          <a href="rooms.php" class="list-group-item list-group-item-action">
            <i class="fas fa-bed me-3"></i>
            <span>Rooms</span>
          </a>
          <a href="booking.php" class="list-group-item list-group-item-action">
            <i class="fas fa-calendar-check me-3"></i>
            <span>Bookings</span>
          </a>
          <a href="guest" class="list-group-item list-group-item-action">
            <i class="fas fa-users me-3"></i>
            <span>Guests</span>
          </a>
          <a
            href="analytics.html"
            class="list-group-item list-group-item-action"
          >
            <i class="fas fa-chart-line me-3"></i>
            <span>Analytics</span>
          </a>
          <a href="setting.php" class="list-group-item list-group-item-action">
            <i class="fas fa-cog me-3"></i>
            <span>Settings</span>
          </a>
          <a href="logout.php" class="list-group-item list-group-item-action mt-auto">
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
            <h2 class="fs-2 m-0">Dashboard</h2>
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
                  <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>

        <div class="container-fluid px-4">
          <div class="row g-3 my-2">
            <div class="col-md-3">
              <div
                class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded"
              >
                <div>
                  <h3 class="fs-2"> <?php
                      // Get the total number of rooms
                      $sql = "SELECT COUNT(*) as total_room FROM rooms";
                      $result = mysqli_query($conn, $sql);
                      $data = mysqli_fetch_assoc($result);
                      $total_rooms = $data['total_room'];

                      // Get the number of booked rooms
                      $sql_booked = "SELECT COUNT(*) as booked_rooms FROM booking WHERE status = 'confirmed'";
                      $result_booked = mysqli_query($conn, $sql_booked);
                      $data_booked = mysqli_fetch_assoc($result_booked);
                      $booked_rooms = $data_booked['booked_rooms'];

                      // Calculate available rooms
                      $available_rooms = $total_rooms - $booked_rooms;
                      echo $available_rooms;
                    ?></h3>
                  <p class="fs-5">Total Rooms</p>
                </div>
                <i class="fas fa-bed fs-1 primary-text p-3"></i>
              </div>
            </div>

            <div class="col-md-3">
              <div
                class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded"
              >
                <div>
                  <h3 class="fs-2">
                    <?php
                      $sql = "SELECT COUNT(*) as total_booking FROM booking";
                      $result = mysqli_query($conn, $sql);
                      $data = mysqli_fetch_assoc($result);
                      echo $data['total_booking'];
                    ?>
                  </h3>
                  <p class="fs-5">Bookings</p>
                </div>
                <i class="fas fa-calendar-check fs-1 primary-text p-3"></i>
              </div>
            </div>

            <div class="col-md-3">
              <div
                class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded"
              >
                <div>
                  <h3 class="fs-2"><?php
                      $sql = "SELECT COUNT(*) as total_guests FROM booking WHERE status = 'confirmed'";
                      $result = mysqli_query($conn, $sql);
                      $data = mysqli_fetch_assoc($result);
                      echo $data['total_guests'];
                    ?></h3>
                  <p class="fs-5">Guests</p>
                </div>
                <i class="fas fa-users fs-1 primary-text p-3"></i>
              </div>
            </div>

            <div class="col-md-3">
              <div
                class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded"
              >
                <div>
                  <h3 class="fs-2">$15k</h3>
                  <p class="fs-5">Revenue</p>
                </div>
                <i class="fas fa-chart-line fs-1 primary-text p-3"></i>
              </div>
            </div>
          </div>

          <div class="row my-5">
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
                $sql = "SELECT * FROM booking";
                $result = mysqli_query($conn, $sql);
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
                      <button class="btn btn-warning btn-sm" title="Edit" data-bs-toggle="modal" data-bs-target="#editModal<?= $row['id_booking'] ?>">
                        <i class="fas fa-edit"></i>
                      </button>

                      <!-- Modal -->
                      <div class="modal fade" id="editModal<?= $row['id_booking'] ?>" tabindex="-1" aria-labelledby="editModalLabel<?= $row['id_booking'] ?>" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="editModalLabel<?= $row['id_booking'] ?>">Edit Booking</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <form action="edit.php?id=<?= $row['id_booking'] ?>" method="POST">
                                <div class="mb-3">
                                  <label for="name" class="form-label">Guest Name</label>
                                  <input type="text" class="form-control" id="name" name="name" value="<?= $row['name'] ?>" required>
                                </div>
                                <div class="mb-3">
                                  <label for="room_type" class="form-label">Room Type</label>
                                  <select class="form-control" id="room_type" name="room_type" required>
                                    <option value="Single" <?= $row['room_type']  ?>>Single</option>
                                    <option value="Double" <?= $row['room_type']  ?>>Double</option>
                                    <option value="Suite" <?= $row['room_type'] ?>>Suite</option>
                                    <option value="Deluxe" <?= $row['room_type']  ?>>Deluxe</option>
                                  </select>
                                </div>
                                <div class="mb-3">
                                  <label for="check_in" class="form-label">Check In</label>
                                  <input type="date" class="form-control" id="check_in" name="check_in" value="<?= $row['check_in'] ?>" required>
                                </div>
                                <div class="mb-3">
                                  <label for="check_out" class="form-label">Check Out</label>
                                  <input type="date" class="form-control" id="check_out" name="check_out" value="<?= $row['check_out'] ?>" required>
                                </div>
                                <div class="mb-3">
                                  <label for="status" class="form-label">Status</label>
                                  <select class="form-control" id="status" name="status" required>
                                    <option value="pending" <?= $row['status'] == 'pending' ? 'selected' : '' ?>>Pending</option>
                                    <option value="confirmed" <?= $row['status'] == 'confirmed' ? 'selected' : '' ?>>Confirmed</option>
                                    <option value="canceled" <?= $row['status'] == 'canceled' ? 'selected' : '' ?>>Canceled</option>
                                  </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                            </form>
                          </div>
                        </div>
                      </div>
                      <a href="delete.php?id=<?= $row['id_booking'] ?>" class="btn btn-danger btn-sm" title="Delete" onclick="return confirm('Are you sure you want to delete this booking?');">
                        <i class="fas fa-trash"></i>
                      </a>
                    </td>
                  </tr>
                <?php
                    }
                } else {
                    echo "<tr><td colspan='7' class='text-center'>No recent bookings found.</td></tr>";
                }
                ?>
                </tbody>
              </table>
            </div>
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
