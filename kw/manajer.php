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

require_once "app/mm.php";
$mm = new Mm();
$rows = $mm->tampil();

if(isset($_GET["cari"])){
    $rows = $mm->cari($_GET["nama"]);
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
if(isset($_GET['nim'])) $vnim =$_GET['nim'];
else $vnim ='';
if(isset($_GET['nama'])) $vnama =$_GET['nama'];
else $vnama ='';
if(isset($_GET['smt'])) $vsmt =$_GET['smt'];
else $vsmt ='';

if($vsimpan=='simpan' && ($vnim <>''||$vnama <>''||$vsmt <>'')){
    $mm->simpan();
    $rows = $mm->tampil();
    $vid ='';
    $vnim ='';
    $vnama ='';
    $vsmt ='';
}

if($vaksi=="hapus")  {
    $mm->hapus();
    $rows = $mm->tampil();
}
if($vaksi=="cari")  {
    $rows = $mm->cari();
}

 if($vaksi=="lihat_update")  {
    $urows = $mm->tampil_update();
    foreach ($urows as $row) {
        $vid = $row['id_manajer'];
        $vnim = $row['nim_manajer'];
        $vnama = $row['nama_manajer'];
        $vsmt = $row['smt_manajer'];
    }
 }

if ($vupdate=="update"){
    $mm->update($vid,$vnim,$vnama,$vsmt);
    $rows = $mm->tampil();
    $vid ='';
    $vnim ='';
    $vnama ='';
    $vsmt ='';
}
if ($vreset=="reset"){
    $vid ='';
    $vnim ='';
    $vnama ='';
    $vsmt ='';
}


?>

<form action="?" method="get">
<table>
    <tr><td>NIM</td><td>:</td><td>
        <input type="hidden" name="id" value="<?php echo $vid; ?>" /><input type="text" name="nim" value="<?php echo $vnim; ?>" /></td></tr>
    <tr><td>NAMA</td><td>:</td><td><input type="text" autocomplete="off" name="nama" value="<?php echo $vnama; ?>"/></td></tr>
    <tr><td>SEMESTER</td><td>:</td><td><input type="text" name="smt" value="<?php echo $vsmt; ?>"/></td></tr>
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
        <td>NIM</td>
        <td>NAMA</td>
        <td>SEMESTER</td>
        <td>AKSI</td>
    </tr>

    <?php foreach ($rows as $row) { ?>
        <tr>
            <td><?php echo $row['id_manajer']; ?></td>
            <td><?php echo $row['nim_manajer']; ?></td>
            <td><?php echo $row['nama_manajer']; ?></td>
            <td><?php echo $row['smt_manajer']; ?></td>
            <td><a href="?id_manajer=<?php echo $row['id_manajer']; ?>&aksi=hapus">Hapus</a>&nbsp;&nbsp;&nbsp;
                <a href="?id_manajer=<?php echo $row['id_manajer']; ?>&aksi=lihat_update">Update</a>
                &nbsp;&nbsp;&nbsp;</td>

        </tr>
    <?php } ?>
 </table>
</body>
</html>