<?php
include 'aksi/koneksi.php';
$id = $_GET['id'];
$result = mysqli_query($koneksi,"DELETE FROM produk where ProdukId = '$id'");

if ($result) {
    # code...
    echo "<script>
    alert('Data Berhasil Didelete !');
    document.location='./data_produk.php';</script>";
}else {
        # code...
        echo "<script>
        alert('Data Gagal Didelete !');
        document.location='./data_produk.php';</script>";
    
}