<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman Pembelian</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Option 1: Include in HTML -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <?php 
    session_start();
    if ($_SESSION['level'] == '') {
        # code...
        echo "<script>
        alert('belum login !');
        document.location='./index.php';</script>";
    }
     if ($_SESSION['level'] !== 'petugas') {
        # code...
        echo "<script>
        alert('anda tidak ada akses untuk masuk ke halaman ini!');
        document.location='./dashboard.php';</script>";
    }
    ?>
</head>

<body style="background-color: rgba(15,25,30,255);">
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <?php 
            include 'sidebars.php'
            ?>

            <div class="col py-3  mx-5">

                <?php 
include 'aksi/koneksi.php';
$id = $_GET['id'];
$result = mysqli_query($koneksi,"SELECT * FROM produk where ProdukID = '$id'");
while ($d = mysqli_fetch_assoc($result)) {
    # code...


?>
                <form action="aksi/pembelian.php" method="post" class="  col-6 justify-content-center mx-auto ">
                    <div>
                        <img src="assets/beli.webp" width="30%" class="d-block mx-auto mb-3" alt="">
                        <h2 class="text-white text-center">Tambah Pembelian Sekarang !</h2>
                    </div>
                    <div class="mb-3 text-white">
                        <label for="NamaProduk" class="form-label">Nama Produk : <?php echo $d['NamaProduk'] ?></label>
                        <input required type="hidden" name="ProdukID" value=" <?php echo $d['ProdukID'] ?>"
                            style="color: white; border: none; background-color: #1a2b32;" class="form-control"
                            id="ProdukID">

                    </div>
                    <div class="mb-3 text-white">
                        <label for="NamaProduk" class="form-label">Tanggal Pembelian :
                            <?php echo date("Y-m-d") ?></label>
                        <input required type="hidden" name="tanggal" value=" <?php echo date("Y-m-d")?>"
                            style="color: white; border: none; background-color: #1a2b32;" class="form-control"
                            id="tanggal">

                    </div>

                    <div class="mb-3 text-white">
                        <label for="Harga" class="form-label">Harga Produk : <?php echo $d['Harga'] ?></label>
                        <input required type="hidden" name="Harga" value=" <?php echo $d['Harga'] ?>"
                            style="color: white; border: none; background-color: #1a2b32;" class="form-control"
                            id="Harga">

                    </div>
                    <div class="mb-3 text-white">
                        <label for="Stok" class="form-label">Stok Produk : <?php echo $d['Stok'] ?></label>
                        <input required type="hidden" name="Stok" value=" <?php echo $d['Stok'] ?>"
                            style="color: white; border: none; background-color: #1a2b32;" class="form-control"
                            id="Stok">

                    </div>
                    <div class="mb-3 text-white">
                        <label for="Total Harga" class="form-label">Total Harga :
                        </label>
                        <input style="color: white; border: none; background-color: #1a2b32;" type="text"
                            id="totalHarga" name="total" readonly>


                    </div>
                    <div class="mb-3 text-white">
                        <label for="NamaPelanggan" class="form-label">Nama Pelanggan</label>


                        <select name="PelangganID" required
                            style="color: white; border: none; background-color: #1a2b32;" class="form-control"
                            id="level" id="">

                            <?php 
            include 'aksi/koneksi.php';
            $result = mysqli_query($koneksi , "SELECT PelangganID ,NamaPelanggan FROM pelanggan");
            
            while ($d =mysqli_fetch_assoc($result)) {
                # code...
            
            ?>
                            <option value="<?php echo $d['PelangganID'] ?>"><?php echo $d['NamaPelanggan'] ?></option>
                            <?php }?>

                        </select>


                    </div>


                    <div class="mb-3 text-white">
                        <label for="Jumlah" class="form-label">Jumlah</label>
                        <input required type="number" oninput="hitungTotal()" name="Jumlah"
                            style="color: white; border: none; background-color: #1a2b32;" class="form-control"
                            id="Jumlah">

                    </div>


                    <button type="submit" class="btn btn-primary w-100">Tambah Pelanggan</button>
                </form>
                <?php } ?>



            </div>



        </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script>
    function hitungTotal() {
        // Ambil nilai harga dan jumlah
        var harga = document.getElementById("Harga").value;
        var jumlah = document.getElementById("Jumlah").value;

        // Hitung total harga
        var totalHarga = harga * jumlah;

        // Tampilkan total harga
        document.getElementById("totalHarga").value = totalHarga;
    }
    </script>
</body>

</html>