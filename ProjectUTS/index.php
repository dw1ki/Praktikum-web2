<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MedWiki</title>

    <link 
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
      rel="stylesheet" 
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
      crossorigin="anonymous">

    <script src="https://kit.fontawesome.com/1b284c6d92.js" crossorigin="anonymous"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
  <?php 
	session_start();
 
	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['role']==""){
		header("location:login.php");
	}
 
	?>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-primary bg-light shadow-lg fixed-top">
        <div class="container">
          <a class="navbar-brand poppins-extrabold" href="index.html">
            <i class="fa-solid fa-notes-medical"></i>
            MedWiki
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse text-right" id="navbarText">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" href="book.php">Booking</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#services">Services</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#doctors">Doctors</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#about">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#contact">Contact</a>
              </li>
            </ul>
            <a class="btn btn-primary" href="logout.php" role="button">Logout</a>            
          </div>
        </div>
      </nav>
      <!-- Banner -->
    <div class="container-fluid banner">
        <div class="container text-center">
            <h4 class="display-6 poppins-medium">We Are Always Ready To Help You & Your Family</h4>
            <h3 class="display-1 poppins-medium">We Offer Different Services To Improve Your Health</h3>
            <a href="book.php">
                <button type="button" class="btn btn-primary btn-lg">
                    Book/Register Here!
                </button>
            </a>
        </div>
    </div>
    <!-- Services -->
    <div class="container-fluid services pt-5 pb-5" id="services">
      <div class="container text-center">
        <h2 class="display-3 poppins-medium">Services</h2>
        <p>The hospital provides advanced and compassionate care.</p>
        <div class="row pt-4">
          <div class="col-md-4">
            <span class="lingkaran"><i class="fa-solid fa-truck-medical fa-5x"></i></span>
            <h3 class="mt-3">Emergency Help</h3>
            <p>
              We deliver swift care for emergencies while focusing on personalized treatment and preventive health measures.
            </p>
          </div>

          <div class="col-md-4">
            <span class="lingkaran"><i class="fa-solid fa-hospital fa-5x"></i></span>
            <h3 class="mt-3">Enriched Pharmecy</h3>
            <p>
              Enriched Pharmacy prioritizes personalized care and preventive measures for patient well-being.
            </p>
          </div>

          <div class="col-md-4">
            <span class="lingkaran"><i class="fa-solid fa-stethoscope fa-5x"></i></span>
            <h3 class="mt-3">Medical Treatment</h3>
            <p>
              Tailored health interventions utilize evidence-based approaches, customizing treatments to individual needs for optimal.
            </p>
          </div>
        </div>
      </div>
    </div>
    <!-- Doctors -->
    <div class="container-fluid pt-5 pb-5 bg-light" id="doctors">
      <div class="container text-center">
        <h2 class="display-3 poppins-medium">Doctors</h2>
        <p>
          Meet our qualified team, schedule appointments, and explore our medical services.
        </p>
        <div class="row pt-4 gx-4 gy-4">
          <div class="col-md-4 text-center tim">
            <img
              src="assets/img/dokter1.png"
              class="rounded-circle mb-3"
            />
            <h4>dr. Andi Putra</h4>
            <p>Dokter Umum</p>            
          </div>
          <div class="col-md-4 text-center tim">
            <img
              src="assets/img/dokter2.jpg"
              class="rounded-circle mb-3"
            />
            <h4>dr. Muklis, Sp.PD.</h4>
            <p>Dokter Spesialis Penyakit Dalam</p>           
          </div>
          <div class="col-md-4 text-center tim">
            <img
              src="assets/img/dokter3.jpg"
              class="rounded-circle mb-3"
            />
            <h4>dr. Indah Maria, Sp.B</h4>
            <p>Dokter Spesialis Bedah Umum</p>            
          </div>
        </div>
      </div>
    </div>
    <!-- About -->
    <div class="container-fluid pt-5 pb-5" id="about">
      <div class="container">
        <h2 class="display-3 text-center poppins-medium">About</h2>
        <p class="text-center">
          Learn more about who we are, our mission, and our commitment to providing exceptional service and care.
        </p>
        <div class="clearfix pt-5">
          <img 
            src="https://awsimages.detik.net.id/visual/2021/10/12/dato-sri-tahir-melalui-tahir-foundation-hari-ini-mengumumkan-hibah-senilai-rp-10-miliar-sekitar-us-700000-untuk-mendukung-resp-6_169.jpeg?w=650" 
            class="col-md-6 float-md-end mb-3 crop-img"
            width="300" 
            height="300">
          <p>
            At our community health center, we are dedicated to delivering accessible primary healthcare services to all residents.
          </p>
          <p>
            Our team of healthcare professionals is committed to promoting wellness and improving health outcomes through comprehensive care and preventive measures.
          </p>
          <p>
            Through collaborative efforts and community-focused initiatives, we strive to address the diverse healthcare needs of our population and enhance the overall well-being of our community.
          </p>
          <p>
            Together, we work towards a healthier tomorrow for everyone.
          </p>
        </div>
      </div>
    </div>
    <!-- Contact Us -->
    <div class="container-fluid pt-5 pb-5 kontak" id="contact">
      <div class="container">
        <h2 class="display-3 text-center poppins-medium">Contact Us</h2>
        <p class="text-center">
          Get in touch for assistance or appointments. We're here to help.
        </p>
        <div class="row pb-3">
          <div class="col-md-6">
            <input
              class="form-control form-control-lg mb-3"
              type="text"
              placeholder="Nama"
            />
            <input
              class="form-control form-control-lg mb-3"
              type="text"
              placeholder="Email"
            />
            <input
              class="form-control form-control-lg"
              type="text"
              placeholder="No. Phone"
            />
          </div>
          <div class="col-md-6">
            <textarea class="form-control form-control-lg" rows="5" placeholder="Silahkan isi komentar anda"></textarea>
          </div>
        </div>
        <div class="col-md-3 mx-auto text-center">
          <button type="button" class="btn btn-primary btn-lg">
            Kirim Pesan
          </button>
        </div>
      </div>
    </div>
    <!-- Footer -->
    <div class="container-fluid footer">
      <div class="container text-center pt-5 pb-5">
        Copyright 2024 | All Rights Reserved by Dwiki Kurniawan
      </div>
    </div>
    
    <script 
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" 
      crossorigin="anonymous">
    </script>

</body>
</html>