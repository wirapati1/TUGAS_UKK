<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman Tambah Pembelian</title>
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

            <div class="col py-3 ">


                <form action="aksi/proses_tambah_pembelian.php" method="post"   class=" col-6 justify-content-center mx-auto mt-5 ">
                    <div>
                        <img src="assets/pelanggan.webp" width="30%" class="d-block mx-auto mb-3" alt="">
                        <h2 class="text-white text-center">Tambah Pembelian Sekarang !</h2>
                    </div>

                    <div class="mb-3 text-white">
                        <label for="NamaProduk" class="form-label">Tanggal Pembelian :
                            <?php echo date("Y-m-d") ?></label>
                        <input required type="hidden" name="tanggal_transaksi" value=" <?php echo date("Y-m-d")?>"
                            style="color: white; border: none; background-color: #1a2b32;" class="form-control"
                            id="tanggal_transaksi">

                    </div>


                      <div class="mb-3 text-white">
                        <label for="NamaPelanggan" class="form-label"> Pilih Nama Pelanggan</label>


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
   <div id="barang-container">
    <div class="barang text-white">
        <div>
      <label>Pilih Nama Produk:</label>
      <select class="produk form-control"  required style="color: white; border: none; background-color: #1a2b32;"  class="form-control" name="produk[]">
        <?php
        include 'aksi/koneksi.php';
        $sql_produk = "SELECT ProdukID, NamaProduk, Harga FROM produk";
        $result_produk = mysqli_query($koneksi, $sql_produk);
        if (mysqli_num_rows($result_produk) > 0) {
            while ($row_produk = mysqli_fetch_assoc($result_produk)) {
                echo "<option value='" . $row_produk['ProdukID'] . "' data-harga='" . $row_produk['Harga'] . "'>" . $row_produk['NamaProduk'] . "</option>";
            }
        } else {
            echo "<option value=''>Tidak ada produk</option>";
        }
        ?>
        </div>



           <div class="mb-3 text-white d-none">
                        <label for="kosong" class="form-label">kosong</label>
                        <input   type="number"  min="1" oninput="hitungTotal()" name="kosong[]" style="color: white; border: none; background-color: #1a2b32;" class="form-control kosong d-none" id="kosong">

                    </div>

           <div class="mb-3 mt-3 text-white">
                        <label for="jumlah" class="form-label">jumlah</label>
                        <input required type="number"  min="1" oninput="hitungTotal()" name="jumlah[]" style="color: white; border: none; background-color: #1a2b32;" class="form-control jumlah" id="jumlah">

                    </div>
           
      
      
                    <div class="mb-3 text-white">
                        <label for="harga" class="form-label">Harga</label>
                        <input readonly type="number" name="harga[]" style="color: white; border: none; background-color: #1a2b32;" class="form-control harga"
                            id="harga">

                    </div>
             <div class="mb-3 text-white">
                        <label for="total" class="form-label">Total Harga</label>
                        <input readonly type="text" name="total[]" style="color: white; border: none; background-color: #1a2b32;" class="form-control total"
                            id="total">

                    </div>
      
                    <button type="submit" class="btn btn-primary ">Tambah Pembelian</button>
    </div>
  </div>

                </form>




            </div>



        </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script>
        
function hitungTotal() {
    var barang = document.getElementsByClassName("barang");
    for (var i = 0; i < barang.length; i++) {
        var harga = barang[i].getElementsByClassName("produk")[0].options[barang[i].getElementsByClassName("produk")[0].selectedIndex].getAttribute("data-harga");
        var jumlah = barang[i].getElementsByClassName("jumlah")[0].value;
        var total = parseInt(harga) * parseInt(jumlah);
        barang[i].getElementsByClassName("harga")[0].value = harga;
        barang[i].getElementsByClassName("total")[0].value = total;
    }
}
    </script>
</body>

</html>