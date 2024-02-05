<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman Data Produk</title>
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

                <h3 class="text-white">Data Produk</h3>

                <div class="mb-3">

                    <a type="button" href="tambah_produk.php" class="btn btn-success"> Tambah Produk</a>
                </div>
                <table class="table table-dark table-bordered table-hover">
                    <tr class="text-center">
                        <th>NO</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>
                    <?php 
        include 'aksi/koneksi.php';
        $no = 1;
        $data = mysqli_query($koneksi,"SELECT * FROM produk");
        while ($d = mysqli_fetch_assoc($data)) {
          
       
        ?>

                    <tr class="text-center">
                        <td> <?php echo $no++ ?> </td>
                        <td> <?php echo $d['NamaProduk'] ?> </td>
                        <td> <?php echo $d['Harga'] ?> </td>
                        <td> <?php echo $d['Stok'] ?> </td>
                        <td>
                            <a type="button" href="pembelian.php?id=<?php echo $d['ProdukID'] ?>"
                                class="btn btn-primary"> Beli</a>
                            <a type="button" href="edit_produk.php?id=<?php echo $d['ProdukID'] ?>"
                                class="btn btn-warning"> Edit</a>
                            <a type="button" onclick="confirm('yakin ?')"
                                href="delete_produk.php?id=<?php echo $d['ProdukID'] ?>" class="btn btn-danger">
                                Delete</a>

                        </td>
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