<?php
require_once 'admin_header.php';
require_once 'admin_sidebar.php';

require '../dbkoneksi.php';

if (isset($_POST["submit"])) {    
    $_nama = $_POST['nama'];
    $_gender = $_POST['gender'];
    $_tmp_lahir = $_POST['tmp_lahir'];
    $_tgl_lahir = $_POST['tgl_lahir'];    
    $_kategori = $_POST['kategori'];
    $_telpon = $_POST['telpon'];
    $_alamat = $_POST['alamat'];
    $_unit_kerja_id = $_POST['unit_kerja_id'];
    $data = [$_nama, $_gender, $_tmp_lahir, $_tgl_lahir, $_kategori, $_telpon, $_alamat, $_unit_kerja_id];
    $sql = "INSERT INTO paramedik (nama, gender, tmp_lahir, tgl_lahir, kategori, telpon, alamat, unit_kerja_id) VALUES (?,? ,? ,? ,? ,? ,? ,?)";
    $stmt = $dbh->prepare($sql);
    $stmt->execute($data);
    echo "<script>window.location.href = 'index.php';</script>";
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Tambah Paramedik</title>
</head>

<body>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Dashboard </h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <!-- Default box -->
                        <div class="card">



                            <div class="container mt-5">
                                <h2 class="text-center">Tambah Data Paramedik</h2><br>
                                <form action="add.php" method="POST">
                                    <div class="form-group row">
                                        <label for="nama" class="col-4 col-form-label">Nama</label>
                                        <div class="col-8">
                                            <input id="nama" name="nama" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="gender" class="col-4 col-form-label">Jenis Kelamin</label>
                                        <div class="col-8">
                                            <select id="gender" name="gender" class="custom-select">
                                                <option value="L">Laki-Laki</option>
                                                <option value="P">Perempuan</option>
                                            </select>
                                        </div>
                                    </div>                                
                                    <div class="form-group row">
                                        <label for="tmp_lahir" class="col-4 col-form-label">Tempat Lahir</label>
                                        <div class="col-8">
                                            <input id="tmp_lahir" name="tmp_lahir" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="tgl_lahir" class="col-4 col-form-label">Tanggal Lahir</label>
                                        <div class="col-8">
                                            <input id="tgl_lahir" name="tgl_lahir" type="date" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="kategori" class="col-4 col-form-label">Kategori</label>
                                        <div class="col-8">
                                            <select id="kategori" name="kategori" class="custom-select">
                                                <?php
                                                // Ambil daftar nilai enum dari kolom kategori
                                                $enumValues = ["Dokter Umum", "Dokter Bedah", "Dokter Spesialis", "Perawat"];
                                                
                                                // Loop melalui nilai enum dan tampilkan sebagai opsi
                                                foreach ($enumValues as $enumValue) {
                                                    $selected = ($row['kategori'] == $enumValue) ? 'selected' : '';
                                                    echo "<option value='$enumValue' $selected>$enumValue</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>                                    
                                    <div class="form-group row">
                                        <label for="telpon" class="col-4 col-form-label">Telepon</label>
                                        <div class="col-8">
                                            <input id="telpon" name="telpon" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="alamat" class="col-4 col-form-label">Alamat</label>
                                        <div class="col-8">
                                            <input id="alamat" name="alamat" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="unit_kerja_id" class="col-4 col-form-label">Unit Kerja ID</label>
                                        <div class="col-8">
                                            <?php
                                                $sqljenis = "SELECT * FROM unit_kerja";
                                                $rsjenis = $dbh->query($sqljenis);
                                            ?>
                                            <select id="unit_kerja_id" name="unit_kerja_id" class="custom-select">
                                                <?php
                                                    foreach ($rsjenis as $rowjenis) {
                                                ?>
                                                <option value="<?= $rowjenis['id'] ?>">
                                                               <?= $rowjenis['nama'] ?>
                                                </option>
                                                <?php
                        }
                        ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-4 col-8">
                                            <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>



                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <!-- /.card-body -->



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
        crossorigin="anonymous"></script>
</body>

</html>

<?php
require_once 'admin_footer.php';
?>