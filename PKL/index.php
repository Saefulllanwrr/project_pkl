<?php
session_start();
include 'db.php';
?>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Hotel Indigo</title>

    <link rel="stylesheet" href="style.css" />

    <!-- Bootstrap Link -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <!-- Bootstrap Link -->

    <!-- Font Awesome Cdn -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
    />
    <!-- Font Awesome Cdn -->

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap"
      rel="stylesheet"
    />
    <!-- Google Fonts -->
  </head>
  <body>
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg fixed-top" id="navbar">
      <div class="container">
        <a class="navbar-brand" href="index.html" id="logo"><span>Hotel</span> Indigo</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar" aria-controls="mynavbar" aria-expanded="false" aria-label="Toggle navigation">
          <span><i class="fa-solid fa-bars"></i></span>
        </button>
        <div class="collapse navbar-collapse" id="mynavbar">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0 flex-nowrap">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#book">Book</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#packages">Room</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#services">Amenities</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#gallery">Gallery</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#about">About Us</a>
            </li>
          </ul>
          <form class="d-flex ms-auto">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
            <button class="btn btn-primary" type="submit">Search</button>
          </form>
        </div>
      </div>
      
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
    <!-- Navbar End -->

    <!-- Home Section Start -->
    <div class="home">
      <div class="content">
        <h5>Welcome To <span>Hotel</span> Indigo</h5>
        <h1>Experience <span>Luxury</span> at Hotel Indigo</h1>
        <p>
          We are Hotel Indigo, offering boutique accommodations that reflect the heart of the neighborhood, all around the world.
        </p>
        <a href="#book">Book Your Stay</a>
      </div>
    </div>
    <!-- Home Section End -->

    <!-- Section Book Start -->
  </section>
  <section class="book" id="book">
    <div class="container">
      <div class="main-text">
        <h1><span>B</span>ook a Room</h1>
      </div>
      
      <div class="row">
        <div class="col-md-6 py-3 py-md-0">
          <div class="card mt-5"> 
            <img src="./images/about.png" alt="Booking Image"" />
          </div>
        </div>
        
        <div class="col-md-6 py-3 py-md-0">
          <section class="room-type" id="room-type">
            <div class="container">
              <div class="main-text">
                <h1><span>R</span>oom Types</h1>
              </div>
              <div class="row">
                <div class="col-md-12">
                 <form action="proses_booking.php" method="POST">
  <select name="room_type" class="form-control" required>
    <option value="" disabled selected>Select Room Type</option>
    <option value="superior">Superior Room</option>
    <option value="deluxe">Deluxe Room</option>
    <option value="suite">Suite Room</option>
    <option value="twin">Twin Room</option>
    <option value="standard">Standard Room</option>
    <option value="presidential">Presidential Room</option>
  </select><br />

  <input type="text" name="name" class="form-control" placeholder="Your Name" required /><br />
  <input type="date" name="checkIn" class="form-control" /><br />
  <input type="date" name="checkOut" class="form-control"/><br />

  <input type="submit" value="Book Now" class="btn btn-primary" />
</form>

                </div>
              </div>
            </div>
          </section>
        </div>
      </div>
    </div>
  </section>
    <!-- Section Book End -->

    <!-- Section Packages Start -->
    <section class="packages" id="packages">
      <div class="container">
        <div class="main-txt">
          <h1><span>R</span>oom Types</h1>
        </div>

        <div class="row" style="margin-top: 30px">
          <div class="col-md-4 py-3 py-md-0">
            <div class="card">
              <img src="./images/room-1.png" alt="Standard Room" />
              <div class="card-body">
                <h3>Standard Room</h3>
                <p>
                  A cozy room with all the essential amenities for a comfortable stay.
                </p>
                <div class="star">
                  <i class="fa-solid fa-star checked"></i>
                  <i class="fa-solid fa-star checked"></i>
                  <i class="fa-solid fa-star checked"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                </div>
                <h6>Price: <strong>$500</strong></h6>
                <a href="#book">Book Now</a>
              </div>
            </div>
          </div>
          <div class="col-md-4 py-3 py-md-0">
            <div class="card">
              <img src="./images/room-2.png" alt="Superior Room" />
              <div class="card-body">
                <h3>Superior Room</h3>
                <p>
                  A spacious room with premium amenities for a luxurious experience.
                </p>
                <div class="star">
                  <i class="fa-solid fa-star checked"></i>
                  <i class="fa-solid fa-star checked"></i>
                  <i class="fa-solid fa-star checked"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                </div>
                <h6>Price: <strong>$600</strong></h6>
                <a href="#book">Book Now</a>
              </div>
            </div>
          </div>
          <div class="col-md-4 py-3 py-md-0">
            <div class="card">
              <img src="./images/room-3.png" alt="Deluxe Room" />
              <div class="card-body">
                <h3>Deluxe Room</h3>
                <p>
                  An elegant room with exquisite decor and top-notch facilities.
                </p>
                <div class="star">
                  <i class="fa-solid fa-star checked"></i>
                  <i class="fa-solid fa-star checked"></i>
                  <i class="fa-solid fa-star checked"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                </div>
                <h6>Price: <strong>$700</strong></h6>
                <a href="#book">Book Now</a>
              </div>
            </div>
          </div>
        </div>

        <div class="row" style="margin-top: 30px">
          <div class="col-md-4 py-3 py-md-0">
            <div class="card">
              <img src="./images/room-4.png" alt="Suite Room" />
              <div class="card-body">
                <h3>Suite Room</h3>
                <p>
                  A luxurious suite with a separate living area and stunning views.
                </p>
                <div class="star">
                  <i class="fa-solid fa-star checked"></i>
                  <i class="fa-solid fa-star checked"></i>
                  <i class="fa-solid fa-star checked"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                </div>
                <h6>Price: <strong>$1000</strong></h6>
                <a href="#book">Book Now</a>
              </div>
            </div>
          </div>
          <div class="col-md-4 py-3 py-md-0">
            <div class="card">
              <img src="./images/room-5.png" alt="Presidential Room" />
              <div class="card-body">
                <h3>Presidential Room</h3>
                <p>
                  The ultimate luxury experience with exclusive amenities and services.
                </p>
                <div class="star">
                  <i class="fa-solid fa-star checked"></i>
                  <i class="fa-solid fa-star checked"></i>
                  <i class="fa-solid fa-star checked"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                </div>
                <h6>Price: <strong>$1500</strong></h6>
                <a href="#book">Book Now</a>
              </div>
            </div>
          </div>
          <div class="col-md-4 py-3 py-md-0">
            <div class="card">
              <img src="./images/room-6.png" alt="Twin Room" />
              <div class="card-body">
                <h3>Twin Room</h3>
                <p>
                  A comfortable room with twin beds, perfect for friends or family.
                </p>
                <div class="star">
                  <i class="fa-solid fa-star checked"></i>
                  <i class="fa-solid fa-star checked"></i>
                  <i class="fa-solid fa-star checked"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                </div>
                <h6>Price: <strong>$550</strong></h6>
                <a href="#book">Book Now</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Section Packages End -->

    <!-- Section Services Start -->
    <section class="services" id="services">
      <div class="container">
        <div class="main-txt">
          <h1><span>S</span>ervices</h1>
        </div>

        <div class="row" style="margin-top: 30px">
          <div class="col-md-4 py-3 py-md-0">
            <div class="card">
              <i class="fas fa-hotel"></i>
              <div class="card-body">
                <h3>Affordable Rates</h3>
                <p>
                  Enjoy competitive pricing without compromising on quality.
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-4 py-3 py-md-0">
            <div class="card">
              <i class="fas fa-utensils"></i>
              <div class="card-body">
                <h3>Dining Options</h3>
                <p>
                  Savor delicious meals at our on-site restaurant and bar.
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-4 py-3 py-md-0">
            <div class="card">
              <i class="fas fa-bullhorn"></i>
              <div class="card-body">
                <h3>Safety Measures</h3>
                <p>
                  Your safety is our priority with enhanced cleaning protocols.
                </p>
              </div>
            </div>
          </div>
        </div>

        <div class="row" style="margin-top: 30px">
          <div class="col-md-4 py-3 py-md-0">
            <div class="card">
              <i class="fas fa-globe-asia"></i>
              <div class="card-body">
                <h3>Local Attractions</h3>
                <p>
                  Explore nearby attractions and enjoy guided tours.
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-4 py-3 py-md-0">
            <div class="card">
              <i class="fas fa-plane"></i>
              <div class="card-body">
                <h3>Travel Assistance</h3>
                <p>
                  Get help with travel arrangements and transportation.
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-4 py-3 py-md-0">
            <div class="card">
              <i class="fas fa-hiking"></i>
              <div class="card-body">
                <h3>Adventure Activities</h3>
                <p>
                  Join us for exciting outdoor activities and excursions.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Section Services End -->

    <!-- Section Gallery Start -->
    <section class="gallary" id="gallery">
      <div class="container">
        <div class="main-txt">
          <h1><span>G</span>allery</h1>
        </div>

        <div class="row" style="margin-top: 30px">
          <div class="col-md-4 py-3 py-md-0">
            <div class="card">
              <img src="./images/gallery-1.png" alt="Gallery Image 1" height="230px" />
            </div>
          </div>
          <div class="col-md-4 py-3 py-md-0">
            <div class="card">
              <img src="./images/gallery-2.png" alt="Gallery Image 2" height="230px" />
            </div>
          </div>
          <div class="col-md-4 py-3 py-md-0">
            <div class="card">
              <img src="./images/gallery-3.png" alt="Gallery Image 3" height="230px" />
            </div>
          </div>
        </div>

        <div class="row" style="margin-top: 30px">
          <div class="col-md-4 py-3 py-md-0">
            <div class="card">
              <img src="./images/gallery-4.png" alt="Gallery Image 4" height="230px" />
            </div>
          </div>
          <div class="col-md-4 py-3 py-md-0">
            <div class="card">
              <img src="./images/gallery-5.png" alt="Gallery Image 5" height="230px" />
            </div>
          </div>
          <div class="col-md-4 py-3 py-md-0">
            <div class="card">
              <img src="./images/gallery-6.png" alt="Gallery Image 6" height="230px" />
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Section Gallery End -->

    <!-- About Start -->
    <section class="about" id="about">
      <div class="container">
        <div class="main-txt">
          <h1>About <span>Us</span></h1>
        </div>

        <div class="row" style="margin-top: 50px">
          <div class="col-md-6 py-3 py-md-0">
            <div class="card">
              <img src="https://cdn.pixabay.com/photo/2023/09/09/06/34/bedroom-8242523_960_720.jpg" alt="About Us Image" />
            </div>
          </div>

          <div class="col-md-6 py-3 py-md-0">
            <h2>Heart of the Neighborhood</h2>
            <p>
              At Hotel Indigo, we celebrate the local culture and community. Our hotel features installations by local artists, and we source ingredients from nearby farms. We strive to make a positive impact on the neighborhoods we are part of.
            </p>
            <button id="about-btn">Read More...</button>
          </div>
        </div>
      </div>
    </section>
    <!-- About End -->

    <!-- Footer Start -->
    <footer id="footer">
      <h1><span>H</span>otel</h1>
      <p>
        Experience the best hospitality at Hotel Indigo. Your comfort is our priority.
      </p>
      <div class="social-links">
        <i class="fa-brands fa-twitter"></i>
        <i class="fa-brands fa-facebook"></i>
        <i class="fa-brands fa-instagram"></i>
        <i class="fa-brands fa-youtube"></i>
        <i class="fa-brands fa-pinterest-p"></i>
      </div>
      <div class="credit">
        <p>Designed By <a href="#">SA Coding</a></p>
      </div>
      <div class="copyright">
        <p>&copy;Copyright SA Coding. All Rights Reserved</p>
      </div>
    </footer>
    <!-- Footer End -->

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
