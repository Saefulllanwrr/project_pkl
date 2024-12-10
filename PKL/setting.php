<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Settings</title>
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
          <a href="rooms.html" class="list-group-item list-group-item-action">
            <i class="fas fa-bed me-3"></i>
            <span>Rooms</span>
          </a>
          <a href="booking.html" class="list-group-item list-group-item-action">
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
          <a
            href="setting.html"
            class="list-group-item list-group-item-action active"
          >
            <i class="fas fa-cog me-3"></i>
            <span>Settings</span>
          </a>
          <a href="" class="list-group-item list-group-item-action mt-auto">
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
            <h2 class="fs-2 m-0">Settings</h2>
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

        <div class="container-fluid px-4">
          <div class="row my-5">
            <div class="col">
              <div class="card shadow-sm">
                <div class="card-body">
                  <h4 class="mb-4 primary-text">Profile Settings</h4>
                  <form>
                    <div class="mb-3">
                      <label for="fullName" class="form-label">Full Name</label>
                      <input type="text" class="form-control" id="fullName" />
                    </div>
                    <div class="mb-3">
                      <label for="email" class="form-label"
                        >Email Address</label
                      >
                      <input type="email" class="form-control" id="email" />
                    </div>
                    <div class="mb-3">
                      <label for="phone" class="form-label">Phone Number</label>
                      <input type="tel" class="form-control" id="phone" />
                    </div>
                  </form>
                </div>
              </div>

              <div class="card mt-4 shadow-sm">
                <div class="card-body">
                  <h4 class="mb-4 primary-text">Password Settings</h4>
                  <form>
                    <div class="mb-3">
                      <label for="currentPassword" class="form-label"
                        >Current Password</label
                      >
                      <input
                        type="password"
                        class="form-control"
                        id="currentPassword"
                      />
                    </div>
                    <div class="mb-3">
                      <label for="newPassword" class="form-label"
                        >New Password</label
                      >
                      <input
                        type="password"
                        class="form-control"
                        id="newPassword"
                      />
                    </div>
                    <div class="mb-3">
                      <label for="confirmPassword" class="form-label"
                        >Confirm New Password</label
                      >
                      <input
                        type="password"
                        class="form-control"
                        id="confirmPassword"
                      />
                    </div>
                  </form>
                </div>
              </div>

              <div class="card mt-4 shadow-sm">
                <div class="card-body">
                  <h4 class="mb-4 primary-text">Notification Settings</h4>
                  <form>
                    <div class="mb-3 form-check">
                      <input
                        type="checkbox"
                        class="form-check-input"
                        id="emailNotif"
                      />
                      <label class="form-check-label" for="emailNotif"
                        >Email Notifications</label
                      >
                    </div>
                    <div class="mb-3 form-check">
                      <input
                        type="checkbox"
                        class="form-check-input"
                        id="smsNotif"
                      />
                      <label class="form-check-label" for="smsNotif"
                        >SMS Notifications</label
                      >
                    </div>
                    <div class="mb-3 form-check">
                      <input
                        type="checkbox"
                        class="form-check-input"
                        id="promoNotif"
                      />
                      <label class="form-check-label" for="promoNotif"
                        >Promotional Notifications</label
                      >
                    </div>
                  </form>
                </div>
              </div>

              <button type="submit" class="btn btn-primary mt-4">
                Save Changes
              </button>
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
