<?php
    require 'config/config.php';
    $nidn = "";
    $nama_dosen = "";
    $notif= "";
   
    if(isset($_POST["submit"])){
        $nidn = $_POST["nidn"];
        $nama_dosen = $_POST["nama_dosen"];
        
        if($nidn && $nama_dosen){
            $sqli = "insert into dosen(nidn,nama_dosen) values ('$nidn','$nama_dosen')";
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
        <h2>Tambah Data Dosen</h2>
        <h4><?php echo $notif; ?></h4>
        <form action="" method="post">
            <div class="box">
                <table>
                    <tr>
                        <td><p>Nama :</p></td><td><input type="text" name="nama_dosen" placeholder="Masukan Nama"></td>
                    </tr>
                    <tr>
                        <td><p>Nidn :</p></td><td><input type="text" name="nidn" placeholder="Masukan Nidn"></td>
                    </tr>
                </table>
            </div>
            <div class="tombol">
                <button class="merah"><a href="dosen.php">kembali</a></button>
                <button name="submit" value="submit" class="biru">Tambah</button>
            </div>
        </form>
    </div>
</body>
</html>