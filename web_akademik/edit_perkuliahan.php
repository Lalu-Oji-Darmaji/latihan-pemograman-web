<?php

require 'config/config.php';

$query = $conn->query("SELECT * FROM mahasiswa");
while ($row = $query->fetch_assoc()){
    $mahasiswa[] = $row;
}

$query2 = $conn->query("SELECT * FROM matakuliah");
$matakuliah = [];
while ($row = $query2->fetch_assoc()){
    $matakuliah[] = $row;
}

$query3 = $conn->query("SELECT * FROM dosen");
$dosen = [];
while ($row = $query3->fetch_assoc()){
    $dosen[] = $row;
}


$key = $_GET["nilai"];
$nim =$_GET["nim"];
$nidn =$_GET["nidn"];
$kode_matakuliah=$_GET["kode_matakuliah"];
$nilai = $_GET["nilai"];
$notif="";


if(isset($_POST["submit"])){
    $nim =$_POST["nim"];
    $nidn =$_POST["nidn"];
    $kode_matakuliah=$_POST["kode_matakuliah"];
    $nilai = $_POST["nilai"];
    if( $nim && $kode_matakuliah && $nidn && $nilai ){
        $sqli= "update perkuliahan set nim='$nim', kode_matakuliah='$kode_matakuliah', nidn='$nidn', nilai='$nilai' where nilai='$key'";
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
        <h2>Edit Data Perkuliahan</h2>
        <h5><?php echo $notif; ?></h5>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="box">
                <table>
                    <tr>
                        <td><p>Nim Mahasiswa:</p></td>
                        <td>
                            <select name="nim" value="<?php echo $nim ?>">
                                <?php for($i=0;$i<count($mahasiswa);$i++): ?>
                                    <option value="<?php echo $mahasiswa [$i]["nim"]; ?>"><?php echo $mahasiswa [$i]["nim"];?></option>
                                 <?php endfor; ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><p>Kode Matakuliah:</p></td>
                        <td>
                            <select name="kode_matakuliah" value="<?php echo $kode_matakuliah ?>">
                                <?php for($i=0;$i<count($matakuliah);$i++): ?>
                                    <option value="<?php echo $matakuliah [$i]["kode_matakuliah"];?>"><?php echo $matakuliah [$i]["kode_matakuliah"];?></option>
                                <?php endfor; ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><p>Nidn Dosen:</p></td>
                        <td>
                            <select name="nidn" value="<?php echo $nidn ?>">
                                <?php for($i=0;$i<count($dosen);$i++): ?>
                                    <option value="<?php echo $dosen [$i]["nidn"]; ?>"><?php echo $dosen [$i]["nidn"];?></option>
                                <?php endfor; ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><p>Masukan Nilai:</p></td>
                        <td><input type="text" name="nilai" value="<?php echo $nilai ?>" placeholder="Masukan Nilai"></td>
                    </tr>
                </table>
            </div>
        <br>
            <div class="tombol">
                <button class="merah"><a href="index.php?">kembali</a></button>
                <button class="biru" type="submit" name="submit">Kirim</button>
            </div>
        </form>
    </div>
</body>
</html>