<?php
    require 'config/config.php';
    $query = $conn->query("SELECT * FROM mahasiswa");
    $mahasiswa = [];
    while ($row = $query->fetch_assoc()){
        $mahasiswa[] = $row;
    }

    if(isset($_GET['op'])){
        $op=$_GET['op'];
        if($op=$_GET['op']=='hapus'){
            $nim=$_GET['nim'];
            $sqli = "delete from mahasiswa where nim='$nim'";
            $q1 = mysqli_query($conn,$sqli);
        }
    }
   

    include('layout/header.php');

    if (count($mahasiswa) > 0):
        $no=1;
        ?>  
        <h3>Data Mahasiswa</h3>
        <table border="1" cellpadding="10" cellspacing="0">
        <tr style="background-color:#0a0a0a; color: #ee8c0d;">
            <td>No</td>
            <td>Nim</td>
            <td>nama</td>
            <td>Tanggal Lahir</td>
            <td>Alamat</td>
            <td>Jenis Kelamin</td>
            <td>Opsi</td>
        </tr>
        <?php
        foreach($mahasiswa as $index => $row):
        ?>
        
            <tr>
                <td><?php echo $no++;?></td>
                <td><?php echo $row['nim'] ;?></td>
                <td><?php echo $row['nama_mhs'] ;?></td>
                <td><?php echo $row['tgl_lahir'] ;?></td>
                <td><?php echo $row['alamat'] ;?></td>
                <td><?php echo $row['jenis_kelamin'] ;?></td>
                <td><a href="edit_mahasiswa.php?nim=<?= $row['nim']; ?> &nama_mhs=<?= $row['nama_mhs'];?> &tgl_lahir=<?= $row['tgl_lahir'];?> &alamat=<?=$row['alamat'];?> &jenis_kelamin=<?= $row['jenis_kelamin'];?>" class="biru">Edit</a>
                <a href="mahasiswa.php?op=hapus&nim=<?= $row['nim']; ?>" onclick="return confirm('Yakin ingin menghapus data')" class="merah">Hapus</a></td>
            </tr>

            
   
        <?php
        endforeach;
        ?>
        </table>
        <button class="hitam">
            <a class="oren" href="tambah_mahasiswa.php">Tambah Data</a>
        </button>
   
        <?php
    else:
        echo "data tidak ada";
    endif; ?>
<?php 
    include("layout/footer.php")
?>    