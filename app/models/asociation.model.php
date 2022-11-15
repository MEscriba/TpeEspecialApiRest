<?php

class AsociationModel{
    private $db;
    
    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_torneos;charset=utf8', 'root', '');
    }

    public function getAll(){
        $query = $this->db->prepare("SELECT * FROM asociaciones");
        $query->execute();

        $asociations = $query->fetchAll(PDO::FETCH_OBJ);
        
        return $asociations;
    }

    public function get($id){
        $query = $this->db->prepare("SELECT * FROM asociaciones WHERE id_asociacion =?");
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }
    public function insert($asociacion, $region){
        $query = $this->db->prepare("INSERT INTO asociaciones (asociacion, region) VALUES(?,?)");
        $query->execute([$asociacion, $region]);
        return $this->db->lastInsertId();
    }

    public function delete($id){
        $query = $this->db->prepare("DELETE FROM asociaciones WHERE id_asociacion =?");
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }
    public function update($asociacion, $region, $id){
        $query = $this->db->prepare("UPDATE asociaciones SET asociacion =?, region =? WHERE id_asociacion=?");
        $query->execute([$asociacion, $region, $id]);
        return $this->db->lastInsertId();
    }
   public function getAllOrder($order){
    if ($order == "ASC"){
    $query = $this->db->prepare("SELECT * FROM asociaciones ORDER BY asociacion");
    $query->execute();

    $asociations = $query->fetchAll(PDO::FETCH_OBJ);
        
    return $asociations;
    }
    if($order =="DESC"){
    $query = $this->db->prepare("SELECT * FROM asociaciones ORDER BY asociacion DESC");
    $query->execute();

    $asociations = $query->fetchAll(PDO::FETCH_OBJ);
        
    return $asociations;
    }
   }
   
   public function paginate($start, $limit){
    $query = $this->db->prepare("SELECT * FROM asociaciones LIMIT $limit OFFSET $start");
    $query->execute();
    $asociations = $query->fetchAll(PDO::FETCH_OBJ);
        
    return $asociations;
   }
}