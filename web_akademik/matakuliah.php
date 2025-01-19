<?php
    require 'config/config.php';
    $query = $conn->query("SELECT * FROM matakuliah");
    $matakuliah = [];
    while ($row = $query->fetch_assoc()){
        $matakuliah[] = $row;
    }

    if(isset($_GET['op'])){
        $op=$_GET['op'];
        if($op=$_GET['op']=='hapus'){
            $kode_matakuliah=$_GET['kode_matakuliah'];
            $sqli = "delete from matakuliah where kode_matakuliah='$kode_matakuliah'";
            $q1 = mysqli_query($conn,$sqli);
        }
    }
   
   

    include('layout/header.php');

    if (count($matakuliah) > 0):
        $no=1;
        ?>
        <h3>Data Matakuliah</h3>
        <table border="1" cellpadding="10" cellspacing="0">
        <tr style="background-color:#0a0a0a; color: #ee8c0d;">
            <td>No</td>
            <td>Nama Matakuliah</td>
            <td>Kode Matakuliah</td>
            <td>SKS</td>
            <td>Opsi</td>
        </tr>
        <?php
        foreach($matakuliah as $index => $row):
        ?>
        
            <tr>
                <td><?php echo $no++;?></td>
                <td><?php echo $row['nama_matakuliah'] ;?></td>
                <td><?php echo $row['kode_matakuliah'] ;?></td>
                <td><?php echo $row['sks'] ;?></td>
                <td><a href="edit_matakuliah.php?nama_matakuliah=<?= $row['nama_matakuliah'];?> &kode_matakuliah=<?= $row['kode_matakuliah'];?> &sks=<?= $row['sks'];?>" class="biru">Edit</a> 
                <a href="matakuliah.php?op=hapus&kode_matakuliah=<?= $row['kode_matakuliah'];?>" onclick="return confirm('Yakin ingin menghapus data')" class="merah">Hapus</a></td>
            </tr>

            
   
        <?php
        endforeach;
        ?>
        </table>
        <button class="hitam">
            <a class="oren" href="tambah_matakuliah.php">Tambah Data</a>
        </button>
        <?php
    else:
        echo "data tidak ada";
    endif; ?>
<?php 
    include("layout/footer.php")
?>    