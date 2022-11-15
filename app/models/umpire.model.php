<?php 

class UmpireModel{
    private $db;

    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_torneos;charset=utf8', 'root', '');
    }

    public function getAll(){
        $query = $this->db->prepare("SELECT * FROM arbitros");
        $query->execute();

        $umpires = $query->fetchAll(PDO::FETCH_OBJ);
        
        return $umpires;
    }

    public function get($id){
        $query = $this->db->prepare("SELECT * FROM arbitros WHERE id=?");
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function delete($id){
        $query = $this->db->prepare("DELETE FROM arbitros WHERE id=?");
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function insert($arbitro, $residencia, $id_asoc){
        $query = $this->db->prepare("INSERT INTO arbitros (arbitro, residencia, id_asociacion_fk) VALUES(?,?,?)");
        $query->execute([$arbitro, $residencia, $id_asoc]);
        return $this->db->lastInsertId();
    }
    public function update($arbitro, $residencia,$id_asoc, $id){
        $query = $this->db->prepare("UPDATE arbitros SET arbitro =?, residencia =?, id_asociacion_fk=? WHERE id=?");
        $query->execute([$arbitro, $residencia, $id_asoc, $id]);
        return $this->db->lastInsertId();
    }

    public function getAllOrder($order=null){
        if ($order == "ASC"){
            $query = $this->db->prepare("SELECT * FROM arbitros ORDER BY arbitro");
            $query->execute();        
            $umpires = $query->fetchAll(PDO::FETCH_OBJ);   
            return $umpires;
            }
            if($order =="DESC"){
            $query = $this->db->prepare("SELECT * FROM arbitros ORDER BY arbitro DESC");
            $query->execute(); 
            $umpires = $query->fetchAll(PDO::FETCH_OBJ);            
            return $umpires;
            }
    }
    public function paginate($start,$limit){
    $query = $this->db->prepare("SELECT * FROM arbitros LIMIT $limit OFFSET $start");
    $query->execute();
    $umpires = $query->fetchAll(PDO::FETCH_OBJ);
        
    return $umpires;
    }

    public function getByResidence($filter, $value){
        $query= $this->db->prepare("SELECT * FROM arbitros WHERE $filter LIKE '$value'");
        $query->execute();
        $umpires = $query->fetchAll(PDO::FETCH_OBJ);
        
        return $umpires;
    }

}
