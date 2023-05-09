<?php
class Pp {
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
        $sql = "SELECT * FROM tb_pelatih";
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
        $sql = "insert into tb_pelatih values ('','".$_GET['nama']."','".$_GET['no']."','".$_GET['alamat']."')";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        echo "DATA BERHASIL DISIMPAN !";
    } 

    public function hapus()
    {
        $sqls = "delete from tb_pelatih where id_pelatih='".$_GET['id_pelatih']."'";
        $stmts = $this->db->prepare($sqls);
        $stmts->execute();
        echo "DATA BERHASIL DIHAPUS !";
    }      
    public function tampil_update()
    {
        $sql = "SELECT * FROM tb_pelatih where id_pelatih='".$_GET['id_pelatih']."'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $data = [];
        while ($rows = $stmt->fetch()) {
            $data[] = $rows;
            }
        return $data;
    }
    public function update($id,$nama,$no,$alamat)
    {
        $sql = "update tb_pelatih set nama_pelatih='".$nama."', no_pelatih='".$no."', alamat_pelatih='".$alamat."' where id_pelatih='".$id."'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        echo "DATA BERHASIL DIUPDATE !";
    } 
    public function cari($nama){
        $sql = "SELECT * FROM tb_pelatih WHERE nama_pelatih LIKE '%".$nama."%'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $data = [];
        while ($rows = $stmt->fetch()) {
            $data[] = $rows;
            }
        return $data;
    }  

 }