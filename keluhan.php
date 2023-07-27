<?php include "koneksi.php"; 
    if(isset($_GET['edit'])) {
        $esql=mysqli_query($con,"select * from tb_keluhan where kd_keluhan='$_GET[id]'");
        $udata=mysqli_fetch_array($esql);
    }

    if(isset($_POST['ubahdata'])) {
        $keluhan=$_POST['keluhan'];
        $tgl_keluhan=$_POST['tgl_keluhan'];
        $nama_karyawan=$_POST['nama_karyawan'];
        mysqli_query($con, "update tb_keluhan set keluhan='$keluhan',tgl_keluhan='$tgl_keluhan',nama_karyawan='$nama_karyawan' where kd_keluhan='$_GET[id]'");
        echo"<script>alert('Data Sudah Diubah)</script>";
        echo "<script>document.location.href='keluhan.php'</script>";
    }?>

<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body style="background-color:#949494;">
<center><a style="font-family:Lucida Sans Unicode; font-size:30px; color:white;"><b>GHIFARI HAMDANIGIAR</b></a></center>
<center><b style="font-family:Lucida Sans Unicode; color:white;">DAFTAR KELUHAN</b></center>
<br> <br>
<center><ul style="margin-right:40px; font-size:19px;">
    <a style="font-family:tahoma; padding:10px; border-radius:20px; text-decoration:none; background:rgb(73, 73, 73); color:white;" href="index.php">Karyawan</a>
    <a style="font-family:tahoma; padding:10px; border-radius:20px; text-decoration:none; background:rgb(73, 73, 73); color:white; margin-left:60px; margin-right:60px;" href="jabatan.php">Jabatan</a>
    <a style="font-family:tahoma; padding:10px; border-radius:20px; text-decoration:none; background:rgb(73, 73, 73); color:white;" href="keluhan.php">Keluhan</a>
</ul></center>
<br> <br>
<form method="post">
    <center><table border="0" style="border-collapse:collapse; background-color:#1f1f21;">
        <tr>
        <td style="width:300px; background-color:rgb(73, 73, 73);; color:white; font-family:arial;"><b><center><?php
            if(isset($_GET['edit'])) { ?>
            <center>Kolom Pengeditan Data</center>
            <?php }else { ?><center>Kolom Pengisian Data</center><?php }?>
            </center></b></td>
        </tr>
        <tr>
            
           <td><center><a style="font-family:arial; font-size:13px; color:white;">Keluhan</center></a><input value="<?php echo @$udata['keluhan']?>" style="width:300px; border-collapse:collapse;" type="text" name="keluhan" placeholder="Masukkan Keluhan"></td>
        </tr>
        <tr>
            <td><center><a style="font-family:arial; font-size:13px; color:white;">Tanggal Keluhan</a></center><input style="width:300px;" type="date" name="tgl_keluhan" value="<?php echo @$udata['tgl_keluhan']?>" placeholder="Tanggal Keluhan" required></td>
        </tr>
        <tr>
            <td><center><a style="font-family:arial; font-size:13px; color:white;">Nama Karyawan</a></center><input style="width:300px;" type="text" name="nama_karyawan" value="<?php echo @$udata['nama_karyawan']?>" placeholder="Masukkan Nama Karyawan" required></td>
        </tr>
        <tr>
            <td><center><?php
            if(isset($_GET['edit'])) { ?> 
            <button style="width:100%; background:rgb(73, 73, 73); color:white;" type="submit"name="ubahdata">Ubah</button>
            <?php }else { ?><button style="width:100%; background:rgb(73, 73, 73);color:white;" type="submit"name="simpan">Simpan</button><?php }?>
            </center></td>
        </tr>
        <tr><td style="border-bottom:2px solid white;"><br></td></tr>
        <tr style="margin-top:100px;">
        <td><center><a style="font-family:arial; font-size:13px; color:white;">Kolom Pencarian</a></center><input type="text" name="tcari" style="width:300px;" placeholder="Ketik Nama Jabatan"><input style="background:rgb(73, 73, 73); color:white; width:100%;" type="submit" name="cari" value="Cari">
    </tr>
            </center></table></td>
</form> <br> <br>

<table border="1" width="100%" style="border-collapse:collapse; background-color:rgb(228, 227, 227);">
    <tr>
        <td style="background-color:rgb(73, 73, 73);"><font face="arial" color="white"><center><b>No</center></font></td>
        <td style="background-color:rgb(73, 73, 73); width:70px;"><font face="arial" color="white"><center><b>Kode Keluhan</center></td>
        <td style="background-color:rgb(73, 73, 73);"><font face="arial" color="white"><center><b>Keluhan</center></td>
        <td style="background-color:rgb(73, 73, 73);"><font face="arial" color="white"><center><b>Tanggal Keluhan</center></td>
        <td style="background-color:rgb(73, 73, 73);"><font face="arial" color="white"><center><b>Nama Karyawan</center></td>
        <td style="background-color:rgb(73, 73, 73); width:70px;"><font face="arial" color="white"><center><b>Aksi</b></center></td>

        </body>
</html>

<?php

    if(isset($_GET['hapus'])) {
        mysqli_query($con, "delete from tb_keluhan where kd_keluhan='$_GET[id]'");
        echo "<script>alert('Data Terhapus')</script>";
        echo "<script>document.location.href='keluhan.php'</script>";
    }
    if(isset($_POST['simpan'])){
        mysqli_query($con, "insert into tb_keluhan (keluhan, tgl_keluhan, nama_karyawan) values ('$_POST[keluhan]','$_POST[tgl_keluhan]','$_POST[nama_karyawan]')");
        echo "<script>alert('Data Tersimpan');</script>";
        echo "<script>document.location.href='keluhan.php'</script>";
    }
    if(isset($_POST['cari'])){
        $sql = mysqli_query($con, "SELECT * FROM tb_keluhan where nama_karyawan like '%$_POST[tcari]%'");
    }else{
        $sql = mysqli_query($con, "SELECT * FROM tb_keluhan");
    }
    $no=0;
    while ($data=mysqli_fetch_array($sql)) {
        $no++;
  
?>

<tr style="font-family:arial;">
    <td><br><center><?php echo $no ?></center><br></td>
    <td><br><center><?php echo $data ['kd_keluhan'] ?><br><br></center></td>
    <td><br><center><?php echo $data ['keluhan'] ?><br><br></center></td>
    <td><br><center><?php echo $data ['tgl_keluhan'] ?><br><br></center></td>
    <td><br><center><?php echo $data ['nama_karyawan'] ?><br><br></center></td>
    <td><center><a href="?edit&id=<?php echo $data['kd_keluhan']?>" style="text-decoration:none; color:blue;">Edit</a><br>
        <a href="?hapus&id=<?php echo $data['kd_keluhan']?>" style="text-decoration:none; color:red;">Hapus</a></center></td>
<?php
} ?>