<?php
require_once 'admin_header.php';
require_once 'admin_sidebar.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Paramedik</title>
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


                            
                            <div class="container mt-5">
                                <h2 class="text-center">Data Paramedik</h2>
                                <a href="add.php"><button class="btn btn-primary mb-1">Tambah Data</button></a>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Gender</th>                                            
                                            <th>TTL</th>
                                            <th>Kategori</th>
                                            <th>Telepon</th>
                                            <th>Alamat</th>
                                            <th>Unit Kerja</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                    require '../dbkoneksi.php';
                                ?>
                                        <?php
                                        $no = 1;
                                        $sql = "SELECT paramedik.*, unit_kerja.nama AS unit_kerja_id
                                                FROM paramedik 
                                                INNER JOIN unit_kerja ON paramedik.unit_kerja_id = unit_kerja.id";
                                        $stmt = $dbh->prepare($sql);
                                        $stmt->execute();
                                        $result = $stmt->fetchAll();
                                        foreach ($result as $row) { ?>
                                        <tr>                                            
                                            <td>
                                                <?= $row['nama'] ?>
                                            </td>
                                            <td>
                                                <?php
                                                        if ($row['gender'] == 'L') {
                                                            echo "Laki-Laki";
                                                        } elseif ($row['gender'] == 'P') {
                                                            echo "Perempuan";
                                                        } else {
                                                            // Penanganan jika nilai gender tidak valid
                                                            echo "Tidak Diketahui";
                                                        }
                                                    ?>
                                            </td>
                                            <td>
                                                <?= $row['tmp_lahir'] ?>,
                                                <?= date('d F Y', strtotime($row['tgl_lahir'])); ?>
                                            </td>
                                            
                                            <td>
                                                <?= $row['kategori'] ?>
                                            </td>
                                            <td>
                                                <?= $row['telpon'] ?>
                                            </td>
                                            <td>
                                                <?= $row['alamat'] ?>
                                            </td>
                                            <td>
                                                <?= $row['unit_kerja_id'] ?>
                                            </td>
                                            <td>
                                                <a href="edit.php?id=<?= $row['id'] ?>"><button
                                                        class='btn btn-warning'>Edit</button></a>
                                                <a href="delete.php?id=<?= $row['id'] ?>"><button
                                                        class='btn btn-danger'>Delete</button></a>
                                            </td>
                                        </tr>
                                        <?php }
                                                    ?>
                                    </tbody>
                                </table>
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