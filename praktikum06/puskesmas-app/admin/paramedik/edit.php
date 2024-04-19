<?php
include_once('../include/meta.php');
require_once('../dbkoneksi.php');

// Koneksi ke database
// require_once('../dbkoneksi.php'); // Jika dbkoneksi.php belum di-require sebelumnya

// Mendapatkan nilai-nilai enum dari kolom kategori
$sql_enum = "SHOW COLUMNS FROM paramedik LIKE 'kategori'";
$stmt_enum = $dbh->prepare($sql_enum);
$stmt_enum->execute();
$result_enum = $stmt_enum->fetch(PDO::FETCH_ASSOC);

preg_match_all("/'(.*?)'/", $result_enum['Type'], $matches);
$kategoris = $matches[1];

// Memeriksa apakah ada data yang dikirimkan dari form untuk proses update
if (isset($_POST['nama'])) {
    $nama = $_POST['nama'];
    $gender = $_POST['gender'];
    $tmp_lahir = $_POST['tmp_lahir'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $kategori = $_POST['kategori'];
    $unit_kerja_id = $_POST['unit_kerja_id'];
    $alamat = $_POST['alamat'];
    $telpon = $_POST['telpon'];

    // Query untuk melakukan update data
    $sql_update = "UPDATE paramedik SET nama = :nama, gender = :gender, tmp_lahir = :tmp_lahir, tgl_lahir = :tgl_lahir, kategori = :kategori, unit_kerja_id = :unit_kerja_id, alamat = :alamat, telpon = :telpon WHERE id = :id";
    $stmt_update = $dbh->prepare($sql_update);
    $stmt_update->bindParam(':nama', $nama);
    $stmt_update->bindParam(':gender', $gender);
    $stmt_update->bindParam(':tmp_lahir', $tmp_lahir);
    $stmt_update->bindParam(':tgl_lahir', $tgl_lahir);
    $stmt_update->bindParam(':kategori', $kategori);
    $stmt_update->bindParam(':unit_kerja_id', $unit_kerja_id);
    $stmt_update->bindParam(':alamat', $alamat);
    $stmt_update->bindParam(':telpon', $telpon);
    $stmt_update->bindParam(':id', $_POST['id']);

    // Menjalankan query update
    if ($stmt_update->execute()) {
        echo '<meta http-equiv="refresh" content="0; url=index.php"><script>alert("SUKSES GAES!")</script>';
    } else {
        echo "Error updating record: " . $stmt_update->errorInfo()[2];
    }
}

// Memeriksa apakah ada parameter ID yang dikirimkan dari URL untuk menampilkan data yang akan diupdate
if (isset($_GET['id'])) {
    $sql_select = "SELECT * FROM paramedik WHERE id = :id";
    $stmt_select = $dbh->prepare($sql_select);
    $stmt_select->bindParam(':id', $_GET['id']);
    $stmt_select->execute();
    $data = $stmt_select->fetch();
}
?>

<!DOCTYPE html>
<html lang="en">
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include_once('../include/header.php') ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include_once('../include/sidebar.php') ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Form Edit Paramedik</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <div class="card col-md-12">
                            <div class="card-body">
                                <form action="" method="post">

                                    <div class="form-group">    
                                        <label for="nama">Nama Paramedik</label>
                                        <input type="text" class="form-control" id="nama" name="nama" value="<?= isset($data['nama']) ? $data['nama'] : '' ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="gender">Gender</label>
                                        <input type="text" class="form-control" id="gender" name="gender" value="<?= isset($data['gender']) ? $data['gender'] : '' ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="tmp_lahir">Tempat Lahir</label>
                                        <input type="text" class="form-control" id="tmp_lahir" name="tmp_lahir" value="<?= isset($data['tmp_lahir']) ? $data['tmp_lahir'] : '' ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="tgl_lahir">Tanggal Lahir</label>
                                        <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?= isset($data['tgl_lahir']) ? $data['tgl_lahir'] : '' ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="kategori">Kategori</label><br>
                                        <select name="kategori" class="form-control" id="kategori">
                                            <?php
                                            foreach ($kategoris as $kategori) {
                                                $selected = isset($data['kategori']) && $data['kategori'] == $kategori ? "selected" : "";
                                                echo "<option value='$kategori' $selected>$kategori</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="unit_kerja_id">Unit Kerja</label><br>
                                        <select name="unit_kerja_id" class="form-control" id="unit_kerja_id">
                                            <?php
                                            $sql_unit_kerja = "SELECT * FROM unit_kerja";
                                            $stmt_unit_kerja = $dbh->prepare($sql_unit_kerja);
                                            $stmt_unit_kerja->execute();
                                            $results_unit_kerja = $stmt_unit_kerja->fetchAll();
                                            foreach ($results_unit_kerja as $unit) {
                                                $selected = isset($data['unit_kerja_id']) && $data['unit_kerja_id'] == $unit['id'] ? "selected" : "";
                                                echo "<option value='$unit[id]' $selected>$unit[nama]</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <textarea class="form-control" id="alamat" name="alamat" required><?= isset($data['alamat']) ? $data['alamat'] : '' ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="telpon">Telepon</label>
                                        <input type="text" class="form-control" id="telpon" name="telpon" value="<?= isset($data['telpon']) ? $data['telpon'] : '' ?>" required>
                                    </div>
                                    <!-- Hidden field untuk mengirimkan ID paramedik -->
                                    <input type="hidden" name="id" value="<?= isset($data['id']) ? $data['id'] : '' ?>">
                                    <button class="btn btn-primary" type="submit">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include_once('../include/footer.php') ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
