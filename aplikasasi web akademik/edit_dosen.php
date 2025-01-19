<?php

require 'config/config.php';
$key = $_GET["nidn"];
$nidn =$_GET["nidn"];
$nama_dosen=$_GET["nama_dosen"];
$notif="";


if(isset($_POST["submit"])){
    $nidn = $_POST["nidn"];
    $nama_dosen = $_POST["nama_dosen"];
    if($nidn && $nama_dosen){
        $sqli= "update dosen set nidn='$nidn', nama_dosen='$nama_dosen' where nidn='$key'";
        $q1 = mysqli_query($conn,$sqli);
        $notif="Edit berhasil";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Dosen</title>
</head>
<link rel="stylesheet" href="style.css"/>
<body>
    <div class="container_edit">
        <h2>Edit Data</h2>
        <h5><?php echo $notif; ?></h5>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="box">
                <table>
                    <tr>
                        <td><p>Masukan Nama:</p></td>
                        <td><input type="text" name="nama_dosen" value="<?php echo $nama_dosen ;?>" placeholder="masukan nama"></td>
                    </tr>
                    <tr>
                        <td><p>Masukan NIDN:</p></td>
                        <td><input type="text" name="nidn" value="<?php echo $nidn ;?>" placeholder="masukan nidn"></td>
                    </tr>
                </table>
            </div>
            <br>
            <div class="tombol">
                <button class="merah"><a href="dosen.php?">kembali</a></button>
                <button class="biru" type="submit" name="submit">Kirim</button>
            </div>
        </form>
    </div>
</body>
</html>