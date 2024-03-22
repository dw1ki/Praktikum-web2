<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nilai Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">WEB02</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Review PHP
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                PHP5 OOP
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button type="button" class="btn btn-outline-dark">Submit</button>
                    </form>
                </div>
            </div>
        </nav>

        <br>
        <h4>Form Nilai Ujian</h4>
        <hr>

        <div class="w-50 p-3, mx-auto p-2">
            <form method="post" action="nilai_mahasiswa.php">
                <div class="form-group row">
                    <label for="nim" class="col-4 col-form-label">NIM</label>
                    <div class="col-8">
                        <input id="nim" name="nim" type="text" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="mk" class="col-4 col-form-label">Pilih MK</label>
                    <div class="col-8">
                        <select id="mk" name="mk" class="custom-select">
                            <option value="pemweb2">Pemrograman Web2</option>
                            <option value="jarkom">Jaringan Komputer</option>
                            <option value="statprob">Statistika & Probabilitas</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nilai" class="col-4 col-form-label">Nilai</label>
                    <div class="col-8">
                        <input id="nilai" name="nilai" type="text" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="offset-4 col-8">
                        <button type="submit" name="submit" class="btn btn-success">Simpan</button>
                    </div>
                </div>
            </form>
        </div>


<?php
  if (isset($_POST["submit"])) {
    require_once "class_mhs.php";

    // Set nilai properti pada objek dari nilai yang diisi pada form
    $nim = $_POST["nim"];
    $mk = $_POST["mk"];
    $nilai = $_POST["nilai"];

    // Buat objek baru dari class NilaiMahasiswa
    $nilaiMahasiswa1 = new NilaiMahasiswa($nim, $mk, $nilai);

    // Menampilkan informasi nilai mata kuliah
    echo "<hr>";
    echo "<p>NIM: " . $nilaiMahasiswa1->nim . "</p>";
    echo "<p>Nama Mata Kuliah: " . $nilaiMahasiswa1->mk . "</p>";
    echo "<p>Nilai: " . $nilaiMahasiswa1->nilai . "</p>";
    echo "<p>Hasil Ujian: " . $nilaiMahasiswa1->grade() . "</p>";
    echo "<p>Grade: " . $nilaiMahasiswa1->hasil() . "</p>";
  }
  ?>