<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial Pagination - Malasngoding.com</title>
    <link href="http://fonts.cdnfonts.com/css/minecraftia" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/basemc.css">
    
</head>
<body>
    <div class="container">
        <center>
            <h2>Membuat Pagination PHP, MySQLI dan Bootstrap 4 dengan Tema Minecraft</h2>
        </center>
        <div class="menu-options">
            <a href="#" class="btn btn-success">Tambah Base</a>
            <button class="btn-minecraft" id="tambah1">Tambah Base</button>
            
        </div>
        <br>     
        <table class="table-minecraft" >
            <thead>
                <tr style="font-family: 'Minecraftia', sans-serif;">
                    <th>No.</th>
                    <th>Nama Base</th>
                    <th>Deskripsi</th>
                    <th>Builder</th>
                    <th>Tanggal</th>
                    <th>Gambar 1</th>
                    <th>Gambar 2</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                // Masukkan koneksi.php disini
                // include 'koneksi.php';
                $batas = 10;
                $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
                $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;    

                $previous = $halaman - 1;
                $next = $halaman + 1;
                
             
                $data = mysqli_query($koneksi,"select * from base");
                $jumlah_data = mysqli_num_rows($data);
                $total_halaman = ceil($jumlah_data / $batas);
                
                $base = mysqli_query($koneksi,"select * from base limit $halaman_awal, $batas");
                $nomor = $halaman_awal+1;

                // Simulasi data
                // $data = [
                //     ['nama_base' => 'Base 1', 'deskripsi' => 'Deskripsi Base 1', 'builder' => 'Builder 1', 'tgl_upload' => '2024-06-12'],
                //     ['nama_base' => 'Base 2', 'deskripsi' => 'Deskripsi Base 2', 'builder' => 'Builder 2', 'tgl_upload' => '2024-06-13'],
                //     ['nama_base' => 'Base 3', 'deskripsi' => 'Deskripsi Base 3', 'builder' => 'Builder 3', 'tgl_upload' => '2024-06-14'],
                //     ['nama_base' => 'Base 3', 'deskripsi' => 'Deskripsi Base 3', 'builder' => 'Builder 3', 'tgl_upload' => '2024-06-14'],
                // ];

                foreach($data as $nomor => $d) {
                    ?>
                    <tr>
                        <td><?php echo $nomor + 1; ?></td>
                        <td><?php echo $d['nama_base']; ?></td>
                        <td><?php echo $d['deskripsi']; ?></td>
                        <td><?php echo $d['builder']; ?></td>
                        <td><?php echo $d['gambar_satu']; ?></td>
                        <td><?php echo $d['gambar_dua']; ?></td>
                        <td><?php echo $d['tgl_upload']; ?></td>
                        <td>
                            <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i>Edit</a>
                            <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>Delete</button>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
        <!-- Tambahkan navigasi pagination di sini -->
        <nav>
            <ul class="pagination justify-content-center">
                <li class="page-item">
                    <a class="page-link" <?php if($halaman > 1){ echo "href='?halaman=$previous'"; } ?>>Previous</a>
                </li>
                <!-- Tambahkan bagian navigasi halaman di sini -->
                <!-- Misalnya: -->
                <!-- <?php 
                // for($x=1;$x<=$total_halaman;$x++){
                //     echo "<li class='page-item'><a class='page-link' href='?halaman=$x'>$x</a></li>";
                // }
                ?> -->
                <li class="page-item">
                    <a class="page-link" <?php if($halaman < $total_halaman) { echo "href='?halaman=$next'"; } ?>>Next</a>
                </li>
            </ul>
        </nav>
    </div>
</body>
</html>
<script>
    
    document.getElementById("tambah1").addEventListener("click", function() {
      window.location.href = "tambahbase.php";
    });
</script>