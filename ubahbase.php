<?php 
include 'koneksi.php';
require 'functions.php';

$id_base = $_GET["id_base"];
$base = query("SELECT * FROM base WHERE id_base = $id_base ")[0];

if ( isset($_POST["submit"])){

    if (edit($_POST) > 0 ){
        echo "
        <script>
            alert('data berhasil diubah');
            document.location.href = 'base.php';
        </script>
        ";
    }else{
        echo " <script>
            alert('data gagal diubah');
            document.location.href = 'base.php';
        </script>";
    }

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Edit Base Minecraft</title>
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
  <div class="container mt-3">
    <div class="row justify-content-center">
      <div class="col-md-7">
        <div class="card">
          <div class="card-header">
            Form Edit Base Minecraft
          </div>
          <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id_base" value="<?= $base["id_base"] ?>">
              <div class="mb-3">
                <label for="nama_base" class="form-label">Nama Base</label>
                <input type="text" class="form-control" id="nama_base" name="nama_base" required value="<?= $base["nama_base"] ?>">
              </div>
              <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required value=""><?= $base["deskripsi"] ?></textarea>
              </div>
              <div class="mb-3">
                <label for="builder" class="form-label">Builder</label>
                <input type="text" class="form-control" id="builder" name="builder" required value="<?= $base["builder"] ?>">
              </div>
              
              <div class="mb-3">
                <label for="gambar1" class="form-label">Gambar 1</label>
                <input type="file" class="form-control" id="gambar1" name="gambar1" accept="image/*" required><?php if (!empty($base['gambar_satu'])): ?>
                <img src="./img/<?= $base['gambar_satu'] ?>" class="img-thumbnail mt-2" style="max-width: 65px;">
                <?php endif; ?>
              </div>
              <div class="mb-3">
                <label for="gambar2" class="form-label">Gambar 2</label>
                <input type="file" class="form-control" id="gambar2" name="gambar2" accept="image/*" required>
                <?php if (!empty($base['gambar_dua'])): ?>
                    <img src="./img/<?= $base['gambar_dua'] ?>" class="img-thumbnail mt-2" style="max-width: 65px;">
                <?php endif; ?>
              </div>
              <div class="mb-3">
                <label for="tgl_upload" class="form-label">Tanggal Upload</label>
                <input type="date" class="form-control" id="tgl_upload" name="tgl_upload" required value="<?= $base["tgl_upload"] ?>">
              </div>
              <button type="submit" class="btn btn-primary" name="submit">Edit Base</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<style>
    body {
      background-color: #343a40; 
      color: #fff; 
    }

    .card {
      background-color: #454d55; 
      color: #fff; 
    }

    .form-control {
      background-color: #495057; 
      color: #fff;
      border-color: #6c757d; 
    }

    .form-control:focus {
      background-color: #495057; 
      color: #fff;
      border-color: #6c757d; 
      box-shadow: none; 
    }

    .btn-primary {
      background-color: #007bff; 
      border-color: #007bff; 
    }

    .btn-primary:hover {
      background-color: #0069d9; 
      border-color: #0062cc; 
    }
  </style>