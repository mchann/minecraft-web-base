<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Input Material Minecraft</title>
  <!-- link link nya -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="icon" type="image/x-icon" href="gambar/logo.png">
</head>
<body>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            Form Input Material Minecraft
          </div>
          <div class="card-body">
            <form action="process.php" method="POST" enctype="multipart/form-data">
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
              <button type="submit" class="btn btn-primary">Simpan</button>
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
