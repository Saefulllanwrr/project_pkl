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
          <a href="#" class="list-group-item list-group-item-action">
            <i class="fas fa-tachometer-alt me-3"></i>
            <span>Dashboard</span>
          </a>
          <a
            href="rooms.html"
            class="list-group-item list-group-item-action active"
          >
            <i class="fas fa-bed me-3"></i>
            <span>Rooms</span>
          </a>
          <a href="#" class="list-group-item list-group-item-action">
            <i class="fas fa-calendar-check me-3"></i>
            <span>Bookings</span>
          </a>
          <a href="#" class="list-group-item list-group-item-action">
            <i class="fas fa-users me-3"></i>
            <span>Guests</span>
          </a>
          <a href="#" class="list-group-item list-group-item-action">
            <i class="fas fa-chart-line me-3"></i>
            <span>Analytics</span>
          </a>
          <a
            href="settings.html"
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
            <h2 class="fs-2 m-0">Rooms</h2>
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
                  <i class="fas fa-user me-2"></i>Admin
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
    <div class="container mt-4">
        <h3 class="fs-4 mb-3">List of Guests</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Room Number</th>
                    <th>Name</th>
                    <th>Room Type</th>
                    <th>Check In</th>
                    <th>Check Out</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'db.php'; // Include database connection

                $sql = "SELECT id_booking, name, room_type, check_in, check_out FROM booking  
                ";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                                <td>{$row['id_booking']}</td>
                                <td>{$row['room_number']}</td>
                                <td>{$row['name']}</td>
                                <td>{$row['room_type']}</td>
                                <td>{$row['check_in']}</td>
                                <td>{$row['check_out']}</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='5' class='text-center'>No guests found</td></tr>";
                }

                mysqli_close($conn); // Close the database connection
                ?>
            </tbody>
        </table>
    </div>

    </div>
    <!-- /#wrapper -->

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
