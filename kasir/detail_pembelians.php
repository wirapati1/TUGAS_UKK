<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman Detai Pembelian</title>
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
    ?>
</head>

<body style="background-color: rgba(15,25,30,255);">
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <?php 
            include 'sidebars.php'
            ?>

            <div class="col py-3 mt-5 mx-5">
<h3 class="text-white mb-4">Data Semua Pembelian</h3>
                <div class="mb-3">

                    <a type="button" href="tambah_pembelian.php" class="btn btn-success"> Tambah Pembelian</a>
                </div>
                <table class="table table-dark table-bordered table-hover">
                    <tr class="text-center">
                        <th>NO</th>
                        <th>Tanggal Penjualan</th>
                        <th>Nama Pelanggan</th>
                        <th>Nama Produk</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                    </tr>
                    <?php 
        include 'aksi/koneksi.php';
        $no = 1;
        
        $detail =  "SELECT
    penjualan.TanggalPenjualan,
    pelanggan.NamaPelanggan,
    produk.NamaProduk,
    penjualan.TotalHarga,
    detailpenjualan.JumlahProduk
FROM
    penjualan
INNER JOIN
    detailpenjualan ON penjualan.PenjualanID = detailpenjualan.PenjualanID
INNER JOIN
    produk ON detailpenjualan.ProdukID = produk.ProdukID
INNER JOIN
    pelanggan ON penjualan.PelangganID = pelanggan.PelangganID;

        ";
        $data = mysqli_query($koneksi,$detail);
        while ($d = mysqli_fetch_assoc($data)) {
          
       
        ?>

                    <tr class="text-center">
                        <td><?php echo $no++ ?></td>
                        <td> <?php echo $d['TanggalPenjualan'] ?> </td>
                        <td><?php echo $d['NamaPelanggan'] ?></td>
                        <td><?php echo $d['NamaProduk'] ?></td>
                        <td><?php echo $d['JumlahProduk'] ?></td>
                        <td> <?php echo $d['TotalHarga'] ?></td>
                    </tr>



                    <?php  }?>


                </table>




            </div>



        </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>