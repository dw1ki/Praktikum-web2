<?php
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "dbpuskesmas");

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;
    }
    return $rows;
}

function registrasi($data) {
    global $conn;
    
    $email = strtolower(stripslashes($data["email"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);
    $role = "user";

    // cek konfirmasi password
    if( $password !== $password2 ) {
        echo "<script>
                alert('konfimasi password tidak sesuai!')
              </script>";
        return false;
    }

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan user baru ke database
    mysqli_query($conn, "INSERT INTO user (email, password, role) VALUES ('$email', '$password', '$role')");

    return mysqli_affected_rows($conn);

}

?>