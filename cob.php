<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel Base Minecraft</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="gambar/logo.png">
    <style>
        body {
            background-color: #f8f9fa; /* Warna latar belakang */
        }
        .table-dark th {
            background-color: #343a40; /* Warna latar belakang header tabel */
            color: #fff; /* Warna teks pada header tabel */
        }
    </style>
</head>
<body>
<div class="container mt-5">
        <div class="row mb-3">
            <div class="col">
                <a href="#" class="btn btn-success">
                    <i class="fas fa-plus"></i> Tambah Base
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h2 class="text-center mb-5">Tabel Base Minecraft</h2>
                <div class="table-responsive">
                    <table class="table table-danger table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">NO</th>
                                <th scope="col">Nama Base</th>
                                <th scope="col">Deskripsi</th>
                                <th scope="col">Builder</th>
                                <th scope="col">Gambar 1</th>
                                <th scope="col">Gambar 2</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $batas = 10;
                            $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
                            $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;    

                            $previous = $halaman - 1;
                            $next = $halaman + 1;

                            $query = "SELECT * FROM base LIMIT $halaman_awal, $batas";
                            $result = mysqli_query($koneksi, $query);
                            $nomor = $halaman_awal + 1;

                            while ($d = mysqli_fetch_assoc($result)) {
                            ?>
                                <tr>
                                    <td><?php echo $nomor++; ?></td>
                                    <td><?php echo $d['nama_base']; ?></td>
                                    <td><?php echo $d['deskripsi']; ?></td>
                                    <td><?php echo $d['builder']; ?></td>
                                    <td><img src="<?php echo $d['gambar_satu']; ?>" class="img-fluid" style="width: 300px; height: 100px;" alt="Gambar Base"></td>
                                    <td><img src="<?php echo $d['gambar_dua']; ?>" class="img-fluid" style="width: 300px; height: 100px;" alt="Gambar Base"></td>
                                    <td><?php echo $d['tgl_upload']; ?></td>
                                    <td>
                                        <a href="#" class="btn btn-primary btn-sm">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <button class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash-alt"></i> Delete
                                        </button>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Integrasi Bootstrap JS (Opsional, untuk beberapa komponen) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
