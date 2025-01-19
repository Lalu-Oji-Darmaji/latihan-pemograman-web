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

    $nim = "";
    $kode_matakuliah = "";
    $nidn = "";
    $nilai = "";
    $notif= "";
   
    if(isset($_POST["submit"])){
        $nim = $_POST["nim"];
        $kode_matakuliah = $_POST["kode_matakuliah"];
        $nidn = $_POST["nidn"];
        $nilai = $_POST["nilai"];
        if($nim && $kode_matakuliah && $nidn && $nilai){
            $sqli = "insert into perkuliahan(nim,kode_matakuliah,nidn,nilai) values ('$nim','$kode_matakuliah','$nidn','$nilai')";
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
        <h2>Tambah Data Perkuliahan</h2>
    <h4><?php echo $notif; ?></h4>
    <form action="" method="post">
        <div class="box">
        <table>
            <tr>
                <td>
                    <p>Nim Mahasiswa:</p>
                </td>
                <td>
                    <select name="nim" value="nim">
                        <?php for($i=0;$i<count($mahasiswa);$i++): ?>
                            <option value="<?php echo $mahasiswa [$i]["nim"]; ?>"><?php echo $mahasiswa [$i]["nim"];?></option>
                        <?php endfor; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <p>Kode Matakuliah:</p>
                </td>
                <td>
                    <select name="kode_matakuliah" value="kode_matakuliah">
                        <?php for($i=0;$i<count($matakuliah);$i++): ?>
                            <option value="<?php echo $matakuliah [$i]["kode_matakuliah"];?>"><?php echo $matakuliah [$i]["kode_matakuliah"];?></option>
                        <?php endfor; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <p>Nidn Dosen:</p>
                </td>
                <td>
                    <select name="nidn" value="nidn">
                        <?php for($i=0;$i<count($dosen);$i++): ?>
                            <option value="<?php echo $dosen [$i]["nidn"]; ?>"><?php echo $dosen [$i]["nidn"];?></option>
                        <?php endfor; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <p>Masukan Nilai:</p>
                </td>
                <td>
                    <input type="text" name="nilai" placeholder="Masukan Nilai">
                </td>
            </tr>
                </table>
            </div>
            <div class="tombol">
                <button class="merah"><a href="index.php">kembali</a></button>
                <button class="biru" name="submit" value="submit">Tambah</button>
            </div>
        </form>
    </div>
</body>
</html>