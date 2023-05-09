<?php
 class mhsw {
 private $db;
 public function __construct()
     {
   try {
 $this->db = new PDO("mysql:host=localhost;dbname=dbakademik", "root", "solo1234"); } catch (PDOException $e) { die ("Error " . $e->getMessage());
        }
    }
    public function tampil()
    {
        $sql = "SELECT * FROM tb_mhsw";
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
        $sql = "insert into tb_mhsw values ('','".$_GET['nim']."','".$_GET['nama']."','".$_GET['alamat']."')";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        echo "DATA BERHASIL DISIMPAN !";
    } 

     public function hapus()
    {
        $sql = "delete from tb_mhsw where mhsw_id='".$_GET['mhsw_id']."'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        echo "DATA BERHASIL DIHAPUS !";
    }      
 
 }