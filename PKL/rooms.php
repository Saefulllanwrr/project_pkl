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
          <a href="#" class="list-group-item list-group-item-action">
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

        <!-- Rooms Content -->
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6">
              <h3 class="mt-4 mx-4">Room Management</h3>
              <section class="book" id="book">
                <section class="room-type" id="room-type">
                  <div class="container">
                    <div class="row">
                      <div class="col-md-12">
                        <form action="proses_add_room.php" method="POST">
                          <input type="hidden" name="id_room" value="<?= $row['id_room'] ?>" />
                          <select name="room_type" class="form-control" required>
                            <option value="" disabled>Select Room Type</option>
                            <option value="superior" >Superior Room</option>
                            <option value="deluxe" >Deluxe Room</option>
                            <option value="suite" >Suite Room</option>
                            <option value="twin" >Twin Room</option>
                            <option value="standard" >Standard Room</option>
                            <option value="presidential" >Presidential Room</option>
                          </select><br />

                          <input type="number" name="price" class="form-control" placeholder="Price" value="<?= $row['price'] ?>" required /><br />
                          <select name="status" class="form-control" required>
                            <option value="" disabled>Select Status</option>
                            <option value="available" >Available</option>
                            <option value="booked" 
                            >Booked</option>
                            <option value="maintenance" >Maintenance</option>
                          </select><br />
                          

                          <input type="submit" value="Save changes" class="btn btn-primary" />
                        </form>
                      </div>
                    </div>
                  </div>
                </section>
              </section>
            </div>
            <div class="col-md-6">
              <h3 class="mt-4">Available Rooms</h3>
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Room Type</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                $sql = "SELECT * FROM rooms";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                  ?>
                  <tr>
                    <th scope="row"><?= $row['id_room'] ?></th>
                    <td><?= $row['room_type'] ?></td>
                    <td>$<?= $row['price'] ?></td>
                    <td><?= $row['status'] ?></td>
                    <td>
                      <button class="btn btn-warning btn-sm" title="Edit" data-bs-toggle="modal" data-bs-target="#editModal<?= $row['id_room'] ?>">
                        <i class="fas fa-edit"></i>
                      </button>
                      <a href="delete_room.php?id=<?= $row['id_room'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this room?');">Delete</a>
                      <!--Modal-->
                      <div class="modal fade" id="editModal<?= $row['id_room'] ?>" tabindex="-1" aria-labelledby="editModalLabel<?= $row['id_room'] ?>" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="editModalLabel<?= $row['id_room'] ?>">Edit Room</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <form action="edit_room.php" method="POST">
                                <input type="hidden" name="id_room" value="<?= $row['id_room'] ?>" />
                                <select name="room_type" class="form-control" required>
                                  <option value="Superior Room" <?= $row['room_type'] == 'Superior Room' ? 'selected' : '' ?>>Superior Room</option>
                                  <option value="Deluxe Room" <?= $row['room_type'] == 'Deluxe Room' ? 'selected' : '' ?>>Deluxe Room</option>
                                  <option value="Suite Room" <?= $row['room_type'] == 'Suite Room' ? 'selected' : '' ?>>Suite Room</option>
                                  <option value="Twin Room" <?= $row['room_type'] == 'Twin Room' ? 'selected' : '' ?>>Twin Room</option>
                                  <option value="Standard Room" <?= $row['room_type'] == 'Standard Room' ? 'selected' : '' ?>>Standard Room</option>
                                  <option value="Presidential Room" <?= $row['room_type'] == 'Presidential Room' ? 'selected' : '' ?>>Presidential Room</option>
                                </select><br />
                                <input type="number" name="price" class="form-control" placeholder="Price" value="<?= $row['price'] ?>" required /><br />
                                <select name="status" class="form-control" required>
                                  <option value="" disabled>Select Status</option>
                                  <option value="available" <?= $row['status'] == 'available' ? 'selected' : '' ?>>Available</option>
                                  <option value="booked" <?= $row['status'] == 'booked' ? 'selected' : '' ?>>Booked</option>
                                  <option value="maintenance" <?= $row['status'] == 'maintenance' ? 'selected' : '' ?>>Maintenance</option>
                                </select><br />
                                <input type="submit" value="Save changes" class="btn btn-primary" />
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                  <?php
                    }
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>

        
      </div>
      <!-- /#page-content-wrapper -->
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
