<?php

require 'config/config.php';
$key = $_GET["kode_matakuliah"];
$nama_matakuliah =$_GET["nama_matakuliah"];
$kode_matakuliah=$_GET["kode_matakuliah"];
$sks = $_GET["sks"];
$notif="";


if(isset($_POST["submit"])){
    $nama_matakuliah =$_POST["nama_matakuliah"];
    $kode_matakuliah=$_POST["kode_matakuliah"];
    $sks = $_POST["sks"];
    if( $nama_matakuliah && $kode_matakuliah && $sks ){
        $sqli= "update matakuliah set nama_matakuliah='$nama_matakuliah', kode_matakuliah='$kode_matakuliah', sks='$sks' where kode_matakuliah='$key'";
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
    <div class="container">
        <h2>Edit Data</h2>
        <h5><?php echo $notif; ?></h5>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="box">
                <table>
                    <tr>
                        <td><p>Masukan Nama Matakuliah:</p></td>
                        <td><input type="text" name="nama_matakuliah" value="<?php echo $nama_matakuliah ;?>" placeholder="masukan nama matakuliah"></td>
                    </tr>
                    <tr>
                        <td><p>Masukan Kode Matakuliah:</p></td>
                        <td><input type="text" name="kode_matakuliah" value="<?php echo $kode_matakuliah ;?>" placeholder="masukan kode matakuliah"></td>
                    </tr>
                    <tr>
                        <td><p>Masukan Jumlah SKS:</p></td>
                        <td><input type="number" name="sks" value="<?php echo $sks ;?>"></td>
                    </tr>
                </table>
            </div>
        <br>
            <div class="tombol">
                <button class="merah"><a href="matakuliah.php?">kembali</a></button>
                <button class="biru" type="submit" name="submit">Kirim</button>
            </div>
        </form>
    </div>
</body>
</html>