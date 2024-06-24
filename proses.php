<?php
// Termasuk file koneksi ke database
include 'koneksi.php';

// Proses insert data jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai dari form
    $nama_base = $_POST['nama_base'];
    $deskripsi = $_POST['deskripsi'];
    $builder = $_POST['builder'];
    $tgl_upload = $_POST['tgl_upload'];

    // Proses upload gambar 1
    $gambar1 = $_FILES['gambar1']['name'];
    $temp_gambar1 = $_FILES['gambar1']['tmp_name'];
    $folder_gambar1 = "upload/" . $gambar1;
    move_uploaded_file($temp_gambar1, $folder_gambar1);

    // Proses upload gambar 2
    $gambar2 = $_FILES['gambar2']['name'];
    $temp_gambar2 = $_FILES['gambar2']['tmp_name'];
    $folder_gambar2 = "upload/" . $gambar2;
    move_uploaded_file($temp_gambar2, $folder_gambar2);

    // Query SQL untuk insert data
    $query = "INSERT INTO base (nama_base, deskripsi, builder, gambar_satu, gambar_dua, tgl_upload) 
              VALUES ('$nama_base', '$deskripsi', '$builder', '$folder_gambar1', '$folder_gambar2', '$tgl_upload')";

    // Eksekusi query dan cek keberhasilan
    if (mysqli_query($koneksi, $query)) {
        // Redirect ke halaman tabel base setelah berhasil
        header("Location: tabel_base.php");
        exit();
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }

    // Menutup koneksi database
}