<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Data Club Basket</title>
</head>
<body>
<?php

require_once "app/pp.php";
$pp = new Pp();
$rows = $pp->tampil();

if(isset($_GET["cari"])){
    $rows = $pp->cari($_GET["nama"]);
}

if(isset($_GET['simpan'])) $vsimpan =$_GET['simpan'];
else $vsimpan ='';
if(isset($_GET['update'])) $vupdate =$_GET['update'];
else $vupdate ='';
if(isset($_GET['reset'])) $vreset =$_GET['reset'];
else $vreset ='';
if(isset($_GET['aksi'])) $vaksi =$_GET['aksi'];
else $vaksi ='';
if(isset($_GET['id'])) $vid =$_GET['id'];
else $vid ='';
if(isset($_GET['nama'])) $vnama =$_GET['nama'];
else $vnama ='';
if(isset($_GET['no'])) $vno =$_GET['no'];
else $vno ='';
if(isset($_GET['alamat'])) $valamat =$_GET['alamat'];
else $valamat ='';

if($vsimpan=='simpan' && ($vnama <>''||$vno <>''||$valamat <>'')){
    $pp->simpan();
    $rows = $pp->tampil();
    $vid ='';
    $vnama ='';
    $vno ='';
    $valamat ='';
}

if($vaksi=="hapus")  {
    $pp->hapus();
    $rows = $pp->tampil();
}
if($vaksi=="cari")  {
    $rows = $pp->cari();
}

 if($vaksi=="lihat_update")  {
    $urows = $pp->tampil_update();
    foreach ($urows as $row) {
        $vid = $row['id_pelatih'];
        $vnama = $row['nama_pelatih'];
        $vno = $row['no_pelatih'];
        $valamat = $row['alamat_pelatih'];
    }
 }

if ($vupdate=="update"){
    $pp->update($vid,$vnama,$vno,$valamat);
    $rows = $pp->tampil();
    $vid ='';
    $vnama ='';
    $vno ='';
    $valamat ='';
}
if ($vreset=="reset"){
    $vid ='';
    $vnama ='';
    $vno ='';
    $valamat ='';
}


?>

<form action="?" method="get">
<table>
    <tr><td>NAMA</td><td>:</td><td><input type="text" autocomplete="off" name="nama" value="<?php echo $vnama; ?>"/></td></tr>
    <tr><td>NO TLP</td><td>:</td><td><input type="text" name="no" value="<?php echo $vno; ?>"/></td></tr>
    <tr><td>ALAMAT</td><td>:</td><td><input type="text" name="alamat" value="<?php echo $valamat; ?>"/></td></tr>
    <tr><td></td><td></td><td>
    <input type="submit" name='simpan' value="simpan"/>
    <input type="submit" name='update' value="update"/>
    <input type="submit" name='reset' value="reset"/>
    <input type="submit" name='cari' value="cari"/>
    </td></tr>
</table>
</form>



    <table border="1px">
    <tr>
        <td>ID</td>
        <td>NAMA</td>
        <td>NO TLP</td>
        <td>ALAMAT</td>
        <td>AKSI</td>
    </tr>

    <?php foreach ($rows as $row) { ?>
        <tr>
            <td><?php echo $row['id_pelatih']; ?></td>
            <td><?php echo $row['nama_pelatih']; ?></td>
            <td><?php echo $row['no_pelatih']; ?></td>
            <td><?php echo $row['alamat_pelatih']; ?></td>
            <td><a href="?id_pelatih=<?php echo $row['id_pelatih']; ?>&aksi=hapus">Hapus</a>&nbsp;&nbsp;&nbsp;
                <a href="?id_pelatih=<?php echo $row['id_pelatih']; ?>&aksi=lihat_update">Update</a>
                &nbsp;&nbsp;&nbsp;</td>

        </tr>
    <?php } ?>
 </table>
</body>
</html>