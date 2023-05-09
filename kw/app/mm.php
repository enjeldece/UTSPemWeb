<?php
class Mm {
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
        $sql = "SELECT * FROM tb_manajer";
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
        $sql = "insert into tb_manajer values ('','".$_GET['nim']."','".$_GET['nama']."','".$_GET['smt']."')";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        echo "DATA BERHASIL DISIMPAN !";
    } 

    public function hapus()
    {
        $sqls = "delete from tb_manajer where id_manajer='".$_GET['id_manajer']."'";
        $stmts = $this->db->prepare($sqls);
        $stmts->execute();
        echo "DATA BERHASIL DIHAPUS !";
    }      
    public function tampil_update()
    {
        $sql = "SELECT * FROM tb_manajer where id_manajer='".$_GET['id_manajer']."'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $data = [];
        while ($rows = $stmt->fetch()) {
            $data[] = $rows;
            }
        return $data;
    }
    public function update($id, $nim,$nama,$smt)
    {
        $sql = "update tb_manajer set nim_anggota='".$nim."', nama_anggota='".$nama."', smt_anggota='".$smt."' where id_manajer='".$id."'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        echo "DATA BERHASIL DIUPDATE !";
    } 
    public function cari($nama){
        $sql = "SELECT * FROM tb_manajer WHERE nama_manajer LIKE '%".$nama."%'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $data = [];
        while ($rows = $stmt->fetch()) {
            $data[] = $rows;
            }
        return $data;
    }  

 }