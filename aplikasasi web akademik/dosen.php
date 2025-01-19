<?php
    require 'config/config.php';
    $query = $conn->query("SELECT * FROM dosen");
    $dosen = [];
    while ($row = $query->fetch_assoc()){
        $dosen[] = $row;
    }

    if(isset($_GET['op'])){
        $op=$_GET['op'];
        if($op=$_GET['op']=='hapus'){
            $nidn=$_GET['nidn'];
            $sqli = "delete from dosen where nidn='$nidn'";
            $q1 = mysqli_query($conn,$sqli);
        }
    }
   

    include('layout/header.php');

    if (count($dosen) > 0):
        $no=1;
        ?> 
        <h3>Data Dosen</h3>
        <table border="1" cellpadding="10" cellspacing="0">
        <tr style="background-color:#0a0a0a; color: #ee8c0d;">
            <td>No</td>
            <td>Nidn</td>
            <td>Nama</td>
            <td>Opsi</td>
        </tr>
        <?php
        foreach($dosen as $index => $row):
        ?>
        
            <tr>
                <td><?php echo $no++;?></td>
                <td><?php echo $row['nidn'] ;?></td>
                <td><?php echo $row['nama_dosen'] ;?></td>
                <td><a href="edit_dosen.php?nidn=<?= $row['nidn'];?> &nama_dosen=<?= $row['nama_dosen'];?>" class="biru">Edit</a> 
                <a href="dosen.php?op=hapus&nidn=<?=$row['nidn'];?>" onclick="return confirm('Yakin ingin menghapus data')" class="merah">Hapus</a></td>
            </tr>

            
   
        <?php
        endforeach;
        ?>
        </table>
        <button class="hitam">
            <a class="oren" href="tambah_dosen.php">Tambah Data</a>
        </button>
        <?php
    else:
        echo "data tidak ada";
    endif; ?>
<?php 
    include("layout/footer.php")
?>    