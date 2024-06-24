<?php 
include 'koneksi.php'; 

function query($query){
    global $koneksi;
    $result = mysqli_query($koneksi,$query);
    $row = [];
    while ( $row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}


function tambah($base){
    global $koneksi;
    $nama_base = htmlspecialchars($base["nama_base"]);
    $deskripsi = htmlspecialchars($base["deskripsi"]);
    $builder = htmlspecialchars($base["builder"]);
    $tgl_upload = htmlspecialchars($base["tgl_upload"]);


    // File uploads handling
    $gambar1 = $_FILES["gambar1"]["name"];
    $gambar2 = $_FILES["gambar2"]["name"];
    $gambar1_temp = $_FILES["gambar1"]["tmp_name"];
    $gambar2_temp = $_FILES["gambar2"]["tmp_name"];
    move_uploaded_file($gambar1_temp, "./img/" . $gambar1);
    move_uploaded_file($gambar2_temp, "./img/" . $gambar2);

    $query = "INSERT INTO base (id_base, nama_base, deskripsi, builder, gambar_satu, gambar_dua, tgl_upload) VALUES
    ('','$nama_base', '$deskripsi', '$builder', '$gambar1', '$gambar2', '$tgl_upload')";
    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);

}


function hapus($id_base){
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM base WHERE id_base = $id_base");

    return mysqli_affected_rows($koneksi);
}

function edit($base){
    global $koneksi;
    $id_base = $base["id_base"];
    $nama_base = htmlspecialchars($base["nama_base"]);
    $deskripsi = htmlspecialchars($base["deskripsi"]);
    $builder = htmlspecialchars($base["builder"]);
    $tgl_upload = htmlspecialchars($base["tgl_upload"]);


    // File uploads handling
    $gambar1 = $_FILES["gambar1"]["name"];
    $gambar2 = $_FILES["gambar2"]["name"];
    $gambar1_temp = $_FILES["gambar1"]["tmp_name"];
    $gambar2_temp = $_FILES["gambar2"]["tmp_name"];
    move_uploaded_file($gambar1_temp, "./img/" . $gambar1);
    move_uploaded_file($gambar2_temp, "./img/" . $gambar2);
   

    $query = "UPDATE base SET
    nama_base = '$nama_base',
    deskripsi = '$deskripsi',
    builder = '$builder',
    tgl_upload = '$tgl_upload',
    gambar_satu = '$gambar1',
    gambar_dua = '$gambar2'
    WHERE id_base = $id_base
    ";


    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);

}


?>