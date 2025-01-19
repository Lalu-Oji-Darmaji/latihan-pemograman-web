
<?php
    require 'config/config.php';
    $query = $conn->query("SELECT * FROM perkuliahan");
    $perkuliahan = [];
    while ($row = $query->fetch_assoc()){
        $perkuliahan[] = $row;
    }

    if(isset($_GET['op'])){
        $op=$_GET['op'];
        if($op=$_GET['op']=='hapus'){
            $nilai=$_GET['nilai'];
            $nim=$_GET['nim'];
            $nidn=$_GET['nidn'];
            $kode_matakuliah=$_GET['kode_matakuliah'];
            $sqli = "delete from perkuliahan where nilai='$nilai' AND nim='$nim' AND nidn='$nidn' AND kode_matakuliah='$kode_matakuliah'";
            $q1 = mysqli_query($conn,$sqli);
        }
    }
   

    include('layout/header.php');

    if (count($perkuliahan) > 0):
        $no=1;
        ?>   
        <h3>Data Perkuliahan</h3>
        <table border="1" cellpadding="10" cellspacing="0">
        <tr style="background-color:#0a0a0a; color: #ee8c0d;">
            <td>No</td>
            <td>Nim</td>
            <td>Kode Matakuliah</td>
            <td>Nidn</td>
            <td>Nilai</td>
            <td>Opsi</td>
        </tr>
        <?php
        foreach($perkuliahan as $index => $row):
        ?>
        
            <tr>
                <td><?php echo $no++;?></td>
                <td><?php echo $row['nim'] ;?></td>
                <td><?php echo $row['kode_matakuliah'] ;?></td>
                <td><?php echo $row['nidn'] ;?></td>
                <td><?php echo $row['nilai'] ;?></td>
                <td><a href="edit_perkuliahan.php?nim=<?= $row['nim'];?> &kode_matakuliah=<?= $row['kode_matakuliah'];?> &nidn=<?= $row['nidn'];?> &nilai=<?= $row['nilai'];?>" class="biru">Edit</a> 
                <a href="index.php?op=hapus&nilai=<?= $row['nilai'] ;?> &nim=<?= $row['nim'];?> &kode_matakuliah=<?= $row['kode_matakuliah'];?> &nidn=<?= $row['nidn'];?>" onclick="return confirm('Yakin ingin menghapus data')" class="merah">Hapus</a></td>
            </tr>
   
        <?php
        endforeach;
        ?>
       
        </table>
        <button class="hitam">
            <a class="oren" href="tambah_perkuliahan.php">Tambah Data</a>
        </button>
    
        <?php
    else:
        echo "data tidak ada";
    endif; ?>
<?php 
    include("layout/footer.php")
?>    
