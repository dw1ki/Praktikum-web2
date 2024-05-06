<?php
require_once 'admin_header.php';
require_once 'admin_sidebar.php';

require '../dbkoneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // Query untuk mengambil data kelurahan berdasarkan id
    $sql = "SELECT * FROM kelurahan WHERE id = ?";
    $stmt = $dbh->prepare($sql);
    $stmt->execute([$id]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
}

if (isset($_POST['submit'])) {   
    $_nama = $_POST['nama'];
    $_kec_id = $_POST['kec_id'];

    $data = [$_nama, $_kec_id, $id];
    // Query SQL untuk update data kelurahan berdasarkan id
    $sql = "UPDATE kelurahan SET nama = ?, kec_id = ? WHERE id = ?";
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
    <title>Edit Data Kelurahan</title>
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
                                <h2 class="text-center">Edit Data Kelurahan</h2><br>
                                <form action="edit.php?id=<?= $row['id'] ?>" method="POST">                                    
                                    <div class="form-group row">
                                        <label for="nama" class="col-4 col-form-label">Nama Kelurahan</label>
                                        <div class="col-8">
                                            <input id="nama" name="nama" type="text" class="form-control"
                                                value="<?= $row['nama'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="kec_id" class="col-4 col-form-label">Kecamatan ID</label>
                                        <div class="col-8">
                                            <input id="kec_id" name="kec_id" type="text" class="form-control"
                                                value="<?= $row['kec_id'] ?>">
                                        </div>
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