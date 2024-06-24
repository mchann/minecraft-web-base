<?php
require 'functions.php';

$id_base = $_GET["id_base"];

if (hapus($id_base) > 0 ){
    echo "
    <script>
        alert('data berhasil dihapus');
        document.location.href = 'base.php';
    </script>
    ";
}else{
    echo "
    <script>
        alert('data gagal dihapus');
        document.location.href = 'base.php';
    </script>
    ";
}
?>