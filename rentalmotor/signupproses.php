<?php
include 'db.php'; // Terhubung ke koneksi.php

// Pastikan metode yang digunakan adalah POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $nama_user = $_POST['nama'];
    $email_user = $_POST['email'];
    $telp_user = $_POST['telepon'];
    $address_user = $_POST['alamat'];
    $username = $_POST['username'];
    $password_user = md5($_POST['password']);

    // Mendapatkan informasi file kartu identitas
    $kartu_identitas_name = $_FILES['kartu_identitas']['name'];
    $kartu_identitas_tmp = $_FILES['kartu_identitas']['tmp_name'];

    // Lokasi direktori untuk menyimpan file kartu identitas
    $upload_dir = "kartuidentitas/";

    // Path lengkap untuk menyimpan file
    $upload_file = $upload_dir . basename($kartu_identitas_name);

    // Pindahkan file kartu identitas ke direktori upload
    if (move_uploaded_file($kartu_identitas_tmp, $upload_file)) {
        // File berhasil diupload, simpan informasi ke database
        $sql = "INSERT INTO tb_user (nama_user, email_user, telp_user, address_user, username, kartu_identitas, password_user)
                VALUES ('$nama_user', '$email_user', '$telp_user', '$address_user', '$username', '$upload_file', '$password_user')";

        if (mysqli_query($conn, $sql)) {
            header("location:login.php");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    } else {
        echo "Gagal mengupload file.";
    }
} else {
    echo "Invalid request method.";
}
?>
