<?php
require 'dbkoneksi.php';
if (isset($_POST["submit"])) {
    $_kode = $_POST['kode'];
    $_nama = $_POST['nama'];
    $_tmp_lahir = $_POST['tmp_lahir'];
    $_tgl_lahir = $_POST['tgl_lahir'];
    $_gender = $_POST['gender'];
    $_email = $_POST['email'];
    $_alamat = $_POST['alamat'];
    $_kelurahan_id = $_POST['kelurahan_id'];
    $data = [$_kode, $_nama, $_tmp_lahir, $_tgl_lahir, $_gender, $_email, $_alamat, $_kelurahan_id];
    $sql = "INSERT INTO pasien (kode, nama, tmp_lahir, tgl_lahir, gender, email, alamat, kelurahan_id) VALUES (?,? ,? ,? ,? ,? ,? ,?)";
    $stmt = $dbh->prepare($sql);
    $stmt->execute($data);
    echo "<script>alert('Data berhasil disimpan!'); window.location.href ='book.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MedWiki</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://kit.fontawesome.com/1b284c6d92.js" crossorigin="anonymous"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="assets/css/style1.css">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-primary bg-light shadow-lg fixed-top">
        <div class="container">
            <a class="navbar-brand poppins-extrabold" href="index.html">
                <i class="fa-solid fa-notes-medical"></i>
                MedWiki
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse text-right" id="navbarText">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="index.html">Home</a>
                    </li>
                </ul>
                <a class="btn btn-primary" href="login.html" role="button">Sign In</a>
            </div>
        </div>
    </nav>

    <!-- Form Booking -->
    <div class="container-fluid form">
        <div class="container">
            <h2 class="display-3 text-center poppins-medium">Booking & Register</h2>
            <p class="text-center">
                Register your data in this form.
            </p>
            <div class="row pb-3">
                <div class="col-md-12">
                    <form action="book.php" method="post">
                        <div class="form-group">
                                <input id="kode" name="kode" type="text" class="form-control" placeholder="Kode">
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="tmp_lahir" name="tmp_lahir"
                                placeholder="Tempat Lahir" required>
                        </div>
                        <div class="form-group">
                            <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir"
                                placeholder="Tanggal Lahir" required>
                        </div>
                        <div class="form-group">
                            <select id="gender" name="gender" class="form-control" placeholder="Gender">
                                <option value="L">Laki-Laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" id="alamat" name="alamat" placeholder="Alamat"
                                required></textarea>
                        </div>
                        <div class="form-group">
                            <select name="kelurahan_id" class="form-control" id="kelurahan_id" placeholder="Kelurahan">
                                <option value="">Pilih Kelurahan</option>
                                <?php
                                            $sql = "SELECT * FROM kelurahan";
                                            $stmt = $dbh->prepare($sql);
                                            $stmt->execute();
                                            $result = $stmt->fetchAll();
                                            foreach ($result as $kel) {
                                                echo "<option value='$kel[id]'>$kel[nama]</option>";
                                            }
                                            ?>
                            </select>
                        </div>
                        <div class="col-md-3 mx-auto text-center">
                            <button name="submit" type="submit" class="btn btn-primary btn-lg">Kirim</button>
                        </div>
                        <!-- </button> <button class="btn btn-primary" type="submit">Tambah</button> -->
                    </form>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="container-fluid">
            <div class="container text-center pt-5 pb-5 poppins-medium">
                Copyright 2024 | All Rights Reserved by Dwiki Kurniawan
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
            </script>

</body>

</html>