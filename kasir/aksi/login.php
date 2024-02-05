<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body style="background-color: rgba(15,25,30,255);">
    <?php

?>
</body>

</html>





<?php

session_start();
include 'koneksi.php';

 $username = $_POST['username'];
 $password= $_POST['password'];

 $login = mysqli_query($koneksi,"SELECT * FROM petugas where username ='$username' ");
 $data = mysqli_fetch_assoc($login);

 if ($data) {
    # code...
    if (password_verify($password , $data['password'])) {
        
        $_SESSION['username'] = $username;
        $_SESSION['level'] = $data['level'];

        if ( $_SESSION['level'] == 'admin') {
            # code...
            header("Location:../dashboard.php");
        }
        elseif ( $_SESSION['level'] == 'petugas') {
            # code...
            header("Location:../dashboard.php");
        }
        
    } else {
        echo "<script>
        alert('Password Salah !');
        document.location='../login.php';</script>;";
    
     }
 }
  else {
    echo "<script>
    alert('Username Tidak Ada !');
    document.location='../login.php';
   </script>";




 }?>