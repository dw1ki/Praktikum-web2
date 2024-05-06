<?php
require_once 'admin_header.php';
require_once 'admin_sidebar.php';

require '../dbkoneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // Query untuk mengambil data pasien berdasarkan id
    $sql = "SELECT * FROM pasien WHERE id = ?";
    $stmt = $dbh->prepare($sql);
    $stmt->execute([$id]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
}

if (isset($_POST['submit'])) {
    $_kode = $_POST['kode'];
    $_nama = $_POST['nama'];
    $_tmp_lahir = $_POST['tmp_lahir'];
    $_tgl_lahir = $_POST['tgl_lahir'];
    $_gender = $_POST['gender'];
    $_email = $_POST['email'];
    $_alamat = $_POST['alamat'];
    $_kelurahan_id = $_POST['kelurahan_id'];
    $data = [$_kode, $_nama, $_tmp_lahir, $_tgl_lahir, $_gender, $_email, $_alamat, $_kelurahan_id, $id];
    // Query SQL untuk update data pasien berdasarkan id
    $sql = "UPDATE pasien SET kode = ?, nama = ?, tmp_lahir = ?, tgl_lahir = ?, gender = ?, email = ?, alamat = ?, kelurahan_id = ? WHERE id = ?";
    $stmt = $dbh->prepare($sql);
    $stmt->execute($data);
    echo "<script>window.location.href = 'index.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Edit Data Pasien</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
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



                            <div class="card-body">
                                <h2 class="text-center">Edit Data Pasien</h2><br>
                                <form action="edit.php?id=<?= $row['id'] ?>" method="POST">
                                    <div class="form-group row">
                                        <label for="kode" class="col-4 col-form-label">Kode</label>
                                        <div class="col-8">
                                            <input id="kode" name="kode" type="text" class="form-control"
                                                value="<?= $row['kode'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nama" class="col-4 col-form-label">Nama</label>
                                        <div class="col-8">
                                            <input id="nama" name="nama" type="text" class="form-control"
                                                value="<?= $row['nama'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="tmp_lahir" class="col-4 col-form-label">Tempat Lahir</label>
                                        <div class="col-8">
                                            <input id="tmp_lahir" name="tmp_lahir" type="text" class="form-control"
                                                value="<?= $row['tmp_lahir'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="tgl_lahir" class="col-4 col-form-label">Tanggal Lahir</label>
                                        <div class="col-8">
                                            <input id="tgl_lahir" name="tgl_lahir" type="date" class="form-control"
                                                value="<?= $row['tgl_lahir'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="gender" class="col-4 col-form-label">Jenis Kelamin</label>
                                        <div class="col-8">
                                            <select id="gender" name="gender" class="custom-select">
                                                <option value="L" <?=($row['gender']=='L' ) ? 'selected' : '' ?>
                                                    >Laki-Laki</option>
                                                <option value="P" <?=($row['gender']=='P' ) ? 'selected' : '' ?>
                                                    >Perempuan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email" class="col-4 col-form-label">Email</label>
                                        <div class="col-8">
                                            <input id="email" name="email" type="email" class="form-control"
                                                value="<?= $row['email'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="alamat" class="col-4 col-form-label">Alamat</label>
                                        <div class="col-8">
                                            <input id="alamat" name="alamat" type="text" class="form-control"
                                                value="<?= $row['alamat'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="kelurahan_id" class="col-4 col-form-label">Kelurahan ID</label>
                                        <div class="col-8">
                                            <select id="kelurahan_id" name="kelurahan_id" class="custom-select">
                                                <?php
                                            $sqljenis = "SELECT * FROM kelurahan";
                                            $rsjenis = $dbh->query($sqljenis);
                                            foreach ($rsjenis as $rowjenis) {
                                                $selected = ($row['kelurahan_id'] == $rowjenis['id']) ? 'selected' : '';
                                                echo "<option value='" . $rowjenis['id'] . "' $selected>" . $rowjenis['nama'] . "</option>";
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