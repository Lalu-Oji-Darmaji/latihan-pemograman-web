<?php

require 'config/config.php';
$nim=$_GET["nim"];
$nama_mhs=$_GET["nama_mhs"];
$alamat=$_GET["alamat"];
$jenis_kelamin=$_GET["jenis_kelamin"];
$tgl_lahir=$_GET["tgl_lahir"];
$notif="";


if(isset($_POST["submit"])){
    $tgl_lahir=$_POST["tgl_lahir"];
    if($tgl_lahir==''){
        $tgl_lahir=$_GET["tgl_lahir"];
    }  
    $key = $_GET["nim"];
    $nim = $_POST["nim"];
    $nama_mhs = $_POST["nama_mhs"];
    $alamat = $_POST["alamat"];
    $jenis_kelamin = $_POST["jenis_kelamin"];
    
    if($nim && $nama_mhs && $jenis_kelamin && $alamat){
        $sqli= "update mahasiswa set nim='$nim', nama_mhs='$nama_mhs', jenis_kelamin='$jenis_kelamin', alamat='$alamat', tgl_lahir='$tgl_lahir' where nim='$key'";
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
    <title>Edit Mahasiswa</title>
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
                        <td><input type="text" name="nama_mhs" value="<?php echo $nama_mhs ;?>" placeholder="masukan nama"></td>
                    </tr>
                    <tr>
                        <td><p>Masukan NIM:</p></td>
                        <td><input type="text" name="nim" value="<?php echo $nim ;?>" placeholder="masukan nim"></td>
                    </tr>
                    <tr>
                        <td><p>Masukan Jenis Kelamin:</p></td>
                        <td>
                            <select name="jenis_kelamin" value="<?php echo $jenis_kelamin ;?>">
                                <option value="Laki - Laki" <?php if($jenis_kelamin== "Laki - Laki") echo "selected";?>>Laki - Laki</option>
                                <option value="Perempuan" <?php if($jenis_kelamin == "Perempuan") echo "selected";?>>Perempuan</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><p>Masukan Alamat:</p></td>
                        <td><input type="text" name="alamat" value="<?php echo $alamat ;?>" placeholder="masukan alamat"></td>
                    </tr>
                    <tr>
                        <td><p>Tanggal Lahir:</p></td>
                        <td><input type="date" name="tgl_lahir" value="<?php echo $tgl_lahir ;?>" placeholder="pppp"></td>
                    </tr>
                </table>
            </div>
        <br>
            <div class="tombol">
                <button class="merah"><a href="mahasiswa.php?">kembali</a></button>
                <button class="biru" type="submit" name="submit">Kirim</button>
            </div>
        </form>
    </div>
</body>
</html>