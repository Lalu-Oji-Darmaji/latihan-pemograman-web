<?php
    require 'config/config.php';
    $nim = "";
    $nama_mhs = "";
    $tgl_lahir = "";
    $alamat = "";
    $jenis_kelamin = "";
    $notif= "";
   
    if(isset($_POST["submit"])){
        $nim = $_POST["nim"];
        $nama_mhs = $_POST["nama_mhs"];
        $jenis_kelamin = $_POST["jenis_kelamin"];
        $alamat = $_POST["alamat"];
        $tgl_lahir = $_POST["tgl_lahir"];
        
        if($nim && $nama_mhs && $jenis_kelamin && $alamat && $tgl_lahir){
            $sqli = "insert into mahasiswa(nim,nama_mhs,jenis_kelamin,alamat,tgl_lahir) values ('$nim','$nama_mhs','$jenis_kelamin','$alamat','$tgl_lahir')";
            $q1 = mysqli_query($conn,$sqli);
            $notif= "Data telah ditambahkan";
        }else{
            $notif= "Data Kurang, Isi Semua Kolom!";
        }
    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link rel="stylesheet" href="style.css"/>
<body>
    <div class="container_edit">
        <h2>Tambah Data Mahasiswa</h2>
        <h4><?php echo $notif; ?></h4>
        <form action="" method="post">
            <div class="box">
                <table>
                <tr>
                    <td><p>Nama :</p></td><td><input type="text" name="nama_mhs" placeholder="Masukan Nama"></td>
                </tr>
                <tr>
                    <td><p>Nim :</p></td><td><input type="text" name="nim" placeholder="Masukan Nim"></td>
                </tr>
                <tr>
                    <td><p>Tanggal lahir :</p></td><td><input type="date" name="tgl_lahir" ></td>
                </tr>
                <tr>
                    <td><p>Alamat :</p></td><td><input type="text" name="alamat" placeholder="Masukan Alamat"></td>
                </tr>
                <tr>
                    <td>
                        <p>Jenis Kelamin:</p>
                    </td>
                    <td>
                        <select name="jenis_kelamin" value="jenis_kelamin">
                        <option value="Laki - Laki" <?php if($jenis_kelamin == "Laki - Laki") echo "selected";?>>Laki - Laki</option>
                        <option value="Perempuan" <?php if($jenis_kelamin == "Perempuan") echo "selected";?>>Perempuan</option>
                        </select>
                    </td>
                </tr>
                </table>
            </div>
            <div class="tombol">
                <button class="merah"><a href="mahasiswa.php">kembali</a></button>
                <button class="biru" name="submit" value="submit">Tambah</button>
            </div>
        </form>
    </div>
</body>
</html>