<?php

class Table{
    public $db = null;

    public function __construct(DBController $db){
        if(!isset($db->con)) return null;
        $this->db = $db;
    }

    //fetch units data using getdata method
    public function getData(){
        $result = $this->db->con->query("SELECT units.id, name, address, available_for, category_name, image_name FROM units, category, unit_images
        WHERE units.category_id = category.id AND units.id = unit_images.unit_id
        GROUP BY units.id");

       $resultArray = array();

       while($item = mysqli_fetch_array($result,MYSQLI_ASSOC)){
           $resultArray[] = $item;
       }
       return $resultArray;
    }

    public function getUnits($lessorid){
        $result = $this->db->con->query("SELECT units.id, name, address, category_name
        FROM units 
        LEFT JOIN category
        ON units.category_id = category.id WHERE units.lessor_id = $lessorid");

       $resultArray = array();

       while($item = mysqli_fetch_array($result,MYSQLI_ASSOC)){
           $resultArray[] = $item;
       }
       return $resultArray;;
    }

    public function getDatawParam($unitID='21'){
        $result = $this->db->con->query("SELECT name, address, available_for, category_name, username
        FROM units 
        LEFT JOIN category
        ON units.category_id = category.id
        LEFT JOIN lessor
        ON units.lessor_id = lessor.id WHERE units.id = $unitID");

       $resultArray = array();

       while($item = mysqli_fetch_array($result,MYSQLI_ASSOC)){
           $resultArray[] = $item;
       }
       return $resultArray;
    }

    public function getRoom($unitID){
        $result = $this->db->con->query("SELECT * FROM rooms WHERE unit_id = $unitID");

       $resultArray = array();

       while($item = mysqli_fetch_array($result,MYSQLI_ASSOC)){
           $resultArray[] = $item;
       }
       return $resultArray;
    }

    public function getLessor(){
        $result = $this->db->con->query("SELECT * FROM lessor");

       $resultArray = array();

       while($item = mysqli_fetch_array($result,MYSQLI_ASSOC)){
           $resultArray[] = $item;
       }
       return $resultArray;
    }

    public function getCOUNT($lessorid){
        $result = $this->db->con->query("SELECT COUNT(units.id)
        FROM units
        WHERE lessor_id = $lessorid");

        $resultArray = array();

        while($item = mysqli_fetch_array($result,MYSQLI_ASSOC)){
            $resultArray[] = $item;
        }
        return $resultArray;
    }

    public function getSUM($lessorid){
        $result = $this->db->con->query("SELECT SUM(tenants)
        FROM units, rooms
        WHERE units.id = rooms.unit_id AND units.lessor_id = $lessorid");

        $resultArray = array();

        while($item = mysqli_fetch_array($result,MYSQLI_ASSOC)){
            $resultArray[] = $item;
        }
        return $resultArray;
    }

    public function getCategory(){
        $result = $this->db->con->query("SELECT * FROM category");

        $resultArray = array();

        while($item = mysqli_fetch_array($result,MYSQLI_ASSOC)){
            $resultArray[] = $item;
        }
        return $resultArray;
    }

    public function getApplication($id){
        $result = $this->db->con->query("SELECT name, address, room_number, price, applicants.status FROM applicants, units, rooms
        WHERE rooms.unit_id = units.id AND applicants.room_id = rooms.id AND applicants.tenant_id = $id");

        $resultArray = array();

        while($item = mysqli_fetch_array($result,MYSQLI_ASSOC)){
            $resultArray[] = $item;
        }
        return $resultArray;
    }

    public function getApplicants($id){
        $result = $this->db->con->query("SELECT first_name, last_name, units.name, room_number, applicants.status FROM applicants, units, rooms, tenant
        WHERE rooms.unit_id = units.id AND applicants.room_id = rooms.id AND applicants.tenant_id = tenant.id AND units.lessor_id = $id");

        $resultArray = array();

        while($item = mysqli_fetch_array($result,MYSQLI_ASSOC)){
            $resultArray[] = $item;
        }
        return $resultArray;
    }



 
    // LEFT JOIN unit_images
    // ON units.id = unit_images.unit_id

}