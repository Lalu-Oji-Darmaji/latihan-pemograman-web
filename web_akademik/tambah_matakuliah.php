<?php
    require 'config/config.php';
    $kode_matakuliah = "";
    $nama_matakuliah = "";
    $sks= "";
    $notif="";
   
    if(isset($_POST["submit"])){
        $nama_matakuliah = $_POST["nama_matakuliah"];
        $kode_matakuliah = $_POST["kode_matakuliah"];
        $sks = $_POST["sks"];
        
        if($nama_matakuliah && $kode_matakuliah && $sks){
            $sqli = "insert into matakuliah(nama_matakuliah,kode_matakuliah,sks) values ('$nama_matakuliah','$kode_matakuliah','$sks')";
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
        <h2>Tambah Data Matakuliah</h2>
        <h4><?php echo $notif; ?></h4>
        <form action="" method="post">
            <div class="box">
                <table>
                    <tr>
                        <td><p>Nama :</p></td><td><input type="text" name="nama_matakuliah" placeholder="Nama Matakuliah"></td>
                    </tr>
                    <tr>
                        <td><p>Kode Matakuliah :</p></td><td><input type="text" name="kode_matakuliah" placeholder="Kode Matakuliah"></td>
                    </tr>
                    <tr>
                        <td><p>Nim :</p></td><td><input type="number" name="sks" placeholder="Jumlah SKS"></td>
                    </tr>
                </table>
            </div>
            <div class="tombol">
                <button class="merah"><a href="matakuliah.php">kembali</a></button>
                <button class="biru" name="submit" value="submit">Tambah</button>
            </div>
        </form>
    </div>
</body>
</html>