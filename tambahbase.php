<?php 
include 'koneksi.php';
if ( isset($_POST["submit"])){
    $nama_base = $_POST["nama_base"];
    $deskripsi = $_POST["deskripsi"];
    $builder = $_POST["builder"];
    $gambar1 = $_POST["gambar_satu"];
    $gambar2 = $_POST["gambar_dua"];
    $tgl_upload = $_POST["tgl_upload"];

    $query = "INSERT INTO base VALUES
                ('','$nama_base','$deskripsi','$builder','$gambar1','$gambar2,'$tgl_upload')
                ";
    mysqli_query($koneksi, $query);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Input Base Minecraft</title>
  <!-- Integrasi Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="icon" type="image/x-icon" href="gambar/logo.png">

  <style>
        body {
            /* background-color: #343a40; Warna latar belakang */
            background-image: url(./gambar/besu.png);
            background-size: cover;
            overflow: hidden;
        }
  
    </style>


</head>
<body>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            Form Input Base Minecraft
          </div>
          <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data">
              <div class="mb-3">
                <label for="nama_base" class="form-label">Nama Base</label>
                <input type="text" class="form-control" id="nama_base" name="nama_base" required>
              </div>
              <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
              </div>
              <div class="mb-3">
                <label for="builder" class="form-label">Builder</label>
                <input type="text" class="form-control" id="builder" name="builder" required>
              </div>
              <div class="mb-3">
                <label for="tgl_upload" class="form-label">Tanggal Upload</label>
                <input type="date" class="form-control" id="tgl_upload" name="tgl_upload" required>
              </div>
              <div class="mb-3">
                <label for="gambar1" class="form-label">Gambar 1</label>
                <input type="file" class="form-control" id="gambar1" name="gambar1" accept="image/*" required>
              </div>
              <div class="mb-3">
                <label for="gambar2" class="form-label">Gambar 2</label>
                <input type="file" class="form-control" id="gambar2" name="gambar2" accept="image/*" required>
              </div>
              <button type="submit" class="btn btn-primary" name="submit">Simpan</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Integrasi Bootstrap JS (Opsional, untuk beberapa komponen) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<style>
    body {
      background-color: #343a40; /* Ubah warna latar belakang body menjadi gelap */
      color: #fff; /* Ubah warna teks menjadi putih */
    }

    .card {
      background-color: #454d55; /* Ubah warna latar belakang card menjadi gelap */
      color: #fff; /* Ubah warna teks card menjadi putih */
    }

    .form-control {
      background-color: #495057; /* Ubah warna latar belakang form input */
      color: #fff; /* Ubah warna teks form input */
      border-color: #6c757d; /* Ubah warna border input */
    }

    .form-control:focus {
      background-color: #495057; /* Ubah warna latar belakang form input saat fokus */
      color: #fff; /* Ubah warna teks form input saat fokus */
      border-color: #6c757d; /* Ubah warna border input saat fokus */
      box-shadow: none; /* Hilangkan shadow saat fokus */
    }

    .btn-primary {
      background-color: #007bff; /* Ubah warna tombol menjadi biru */
      border-color: #007bff; /* Ubah warna border tombol */
    }

    .btn-primary:hover {
      background-color: #0069d9; /* Ubah warna tombol saat hover */
      border-color: #0062cc; /* Ubah warna border tombol saat hover */
    }
  </style>