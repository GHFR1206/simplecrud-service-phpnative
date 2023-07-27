<?php include "koneksi.php";
if (isset($_GET['edit'])) {
    $esql = mysqli_query($con, "select * from tb_karyawan where kd_karyawan='$_GET[id]'");
    $udata = mysqli_fetch_array($esql);
}

if (isset($_POST['ubahdata'])) {
    $nama = $_POST['nama_karyawan'];
    $jk = $_POST['jk'];
    $no_hp = $_POST['no_hp'];
    $jabatan = $_POST['jabatan'];
    mysqli_query($con, "update tb_karyawan set nama_karyawan='$nama',jk='$jk',no_hp='$no_hp',jabatan='$jabatan' where kd_karyawan='$_GET[id]'");
    echo "<script>alert('Data Sudah Diubah)</script>";
    echo "<script>document.location.href='index.php'</script>";
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
</head>

<body style="background-color:#949494;">


    <center><a style="font-family:Lucida Sans Unicode; font-size:30px; color:white;"><b>GHIFARI HAMDANIGIAR</b></a></center>
    <center><b style="font-family:Lucida Sans Unicode; color:white;">DAFTAR KARYAWAN</b></center>
    <br> <br>
    <center>
        <ul style="margin-right:40px; font-size:19px;">
            <a style="font-family:tahoma; padding:10px; border-radius:20px; text-decoration:none; background:rgb(73, 73, 73); color:white;" href="index.php">Karyawan</a>
            <a style="font-family:tahoma; padding:10px; border-radius:20px; text-decoration:none; background:rgb(73, 73, 73); color:white; margin-left:60px; margin-right:60px;" href="jabatan.php">Jabatan</a>
            <a style="font-family:tahoma; padding:10px; border-radius:20px; text-decoration:none; background:rgb(73, 73, 73); color:white;" href="keluhan.php">Keluhan</a>
        </ul>
    </center>
    <br> <br>

    <form method="post">
        <center>
            <table border="0" style="border-collapse:collapse; background-color:#1f1f21;">
                <tr>
                    <td style="width:300px; background-color:rgb(73, 73, 73);; color:white; font-family:arial;"><b>
                            <center><?php
                                    if (isset($_GET['edit'])) { ?>
                                    <center>Kolom Pengeditan Data</center>
                                <?php } else { ?><center>Kolom Pengisian Data</center><?php } ?>
                            </center>
                        </b></td>
                </tr>
                <tr>

                    <td>
                        <center><a style="font-family:arial; font-size:13px; color:white;">Nama Karyawan</center></a><input value="<?php echo @$udata['nama_karyawan'] ?>" style="width:300px; border-collapse:collapse;" type="text" name="nama_karyawan" placeholder="Masukkan Nama">
                    </td>
                </tr>
                <tr>
                    <td>
                        <center><a style="font-family:arial; font-size:13px; color:white;">Jenis Kelamin</a></center><select name="jk" style="width:100%;">
                            <?php
                            $jk = array("Laki-laki", "Perempuan");
                            foreach ($jk as $jk) { ?>
                                <option value="<?php echo $jk ?>" <?php if ($jk == @$udata['jk']) echo "selected='selected'" ?>><?php echo $jk ?></option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <center><a style="font-family:arial; font-size:13px; color:white;">Nomor Handphone</a></center><input style="width:300px;" type="text" name="no_hp" value="<?php echo @$udata['no_hp'] ?>" placeholder="Masukkan Nomor Handphone" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <center><a style="font-family:arial; font-size:13px; color:white;">Jabatan Karyawan</a></center><select name="jabatan" style="width:100%;>" <?php
                                                                                                                                                                    $jab = array("Programmer", "Programmer", "System analyst", "Web developer", "Designer", "Technical support");
                                                                                                                                                                    foreach ($jab as $jab) { ?> <option value=" <?php echo $jab ?>" <?php if ($jab == @$udata['nama_jabatan']) echo "selected='selected'" ?>><?php echo $jab ?></option>
                        <?php } ?>
                    </td>
                </tr>


                <tr>
                    <td>
                        <center><?php
                                if (isset($_GET['edit'])) { ?>
                                <button style="width:100%; background:rgb(73, 73, 73); color:white;" type="submit" name="ubahdata">Ubah</button>
                            <?php } else { ?><button style="width:100%; background:rgb(73, 73, 73);color:white;" type="submit" name="simpan">Simpan</button><?php } ?>
                        </center>
                    </td>
                </tr>
                <tr>
                    <td style="border-bottom:2px solid white;"><br></td>
                </tr>
                <tr style="margin-top:100px;">
                    <td>
                        <center><a style="font-family:arial; font-size:13px; color:white;">Kolom Pencarian</a></center><input type="text" name="tcari" style="width:300px;" placeholder="Ketik Nama Karyawan"><input style="background:rgb(73, 73, 73); color:white; width:100%;" type="submit" name="cari" value="Cari">
                </tr>
        </center>
        </table>
        </td>
    </form> <br> <br>
    <br>
    <table border="1" width="100%" style="border-collapse:collapse; background-color:rgb(228, 227, 227);">
        <tr>
            <td style="background-color:rgb(73, 73, 73);">
                <font face="arial" color="white">
                    <center><b>No</center>
                </font>
            </td>
            <td style="background-color:rgb(73, 73, 73); width:90px;">
                <font face="arial" color="white">
                    <center><b>Kode Karyawan</center>
            </td>
            <td style="background-color:rgb(73, 73, 73);">
                <font face="arial" color="white">
                    <center><b>Nama Karyawan</center>
            </td>
            <td style="background-color:rgb(73, 73, 73);">
                <font face="arial" color="white">
                    <center><b>Jenis Kelamin</center>
            </td>
            <td style="background-color:rgb(73, 73, 73);">
                <font face="arial" color="white">
                    <center><b>Nomor Handphone</center>
            </td>
            <td style="background-color:rgb(73, 73, 73);">
                <font face="arial" color="white">
                    <center><b>Jabatan</b></center>
            </td>
            <td style="background-color:rgb(73, 73, 73);">
                <font face="arial" color="white">
                    <center><b>Aksi</b></center>
            </td>

            <script src="sweetalert2.min.js"></script>

</body>

</html>


<?php

if (isset($_GET['hapus'])) {
    mysqli_query($con, "delete from tb_karyawan where kd_karyawan='$_GET[id]'");
    echo "<script>alert('Data Terhapus')</script>";
}
if (isset($_POST['simpan'])) {
    mysqli_query($con, "insert into tb_karyawan (nama_karyawan, jk, no_hp, jabatan) values ('$_POST[nama_karyawan]','$_POST[jk]','$_POST[no_hp]','$_POST[jabatan]')");
    echo "<script>alert('Data Tersimpan');</script>";
    echo "<script>document.location.href='index.php'</script>";
}
if (isset($_POST['cari'])) {
    $sql = mysqli_query($con, "SELECT * FROM tb_karyawan where nama_karyawan like '%$_POST[tcari]%'");
} else {
    $sql = mysqli_query($con, "SELECT * FROM tb_karyawan");
}
$no = 0;
while ($data = mysqli_fetch_array($sql)) {
    $no++;

?>

    <tr style="font-family:arial;">
        <td>
            <center><?php echo $no ?></center>
        </td>
        <td>
            <center><br><?php echo $data['kd_karyawan'] ?><br><br></center>
        </td>
        <td>
            <center><br><?php echo $data['nama_karyawan'] ?><br><br></center>
        </td>
        <td>
            <center><br><?php echo $data['jk'] ?></center><br>
        </td>
        <td>
            <center><br><?php echo $data['no_hp'] ?></center><br>
        </td>
        <td>
            <center><br><?php echo $data['jabatan'] ?></center><br>
        </td>
        <td>
            <center><a href="?edit&id=<?php echo $data['kd_karyawan'] ?>" style="text-decoration:none; color:blue;">Edit</a><br>
                <a href="?hapus&id=<?php echo $data['kd_karyawan'] ?>" style="text-decoration:none; color:red;">Hapus</a>
            </center>
        </td>
    <?php
} ?>