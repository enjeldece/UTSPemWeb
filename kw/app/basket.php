<?php
class Basket {
private $db;
public function __construct()
{
try {

$this->db =
new PDO("mysql:host=localhost;dbname=basket", "root", "");
} catch (PDOException $e) {
 die ("Error " . $e->getMessage());
 }
}
public function tampil()
    {
        $sql = "SELECT * FROM tb_anggota";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $data = [];
        while ($rows = $stmt->fetch()) {
            $data[] = $rows;
            }
        return $data;
    }

    public function simpan()
    {
        $sql = "insert into tb_anggota values ('','".$_GET['nim']."','".$_GET['nama']."','".$_GET['smt']."','".$_GET['posisi']."')";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        echo "DATA BERHASIL DISIMPAN !";
    } 

    public function hapus()
    {
        $sqls = "delete from tb_anggota where id_anggota='".$_GET['id_anggota']."'";
        $stmts = $this->db->prepare($sqls);
        $stmts->execute();
        echo "DATA BERHASIL DIHAPUS !";
    }      
    public function tampil_update()
    {
        $sql = "SELECT * FROM tb_anggota where id_anggota='".$_GET['id_anggota']."'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $data = [];
        while ($rows = $stmt->fetch()) {
            $data[] = $rows;
            }
        return $data;
    }
    public function update($id, $nim,$nama,$smt,$posisi)
    {
        $sql = "update tb_anggota set nim_anggota='".$nim."', nama_anggota='".$nama."', smt_anggota='".$smt."', posisi='".$posisi."' where id_anggota='".$id."'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        echo "DATA BERHASIL DIUPDATE !";
    } 
    public function cari($nama){
        $sql = "SELECT * FROM tb_anggota WHERE nama_anggota LIKE '%".$nama."%'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $data = [];
        while ($rows = $stmt->fetch()) {
            $data[] = $rows;
            }
        return $data;
    }  

 }