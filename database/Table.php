<?php

class Table{
    public $db = null;

    public function __construct(DBController $db){
        if(!isset($db->con)) return null;
        $this->db = $db;
    }

    //fetch units data using getdata method
    public function getData(){
        $result = $this->db->con->query("SELECT property.id, property_name, barangay, available_for, category_name, image_name FROM property, category, unit_images
        WHERE property.category_id = category.id AND property.id = unit_images.unit_id
        GROUP BY property.id");

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

    public function getProperty($lessorid){
        $result = $this->db->con->query("SELECT property.id, property_name, province, city, barangay, category_name
        FROM property 
        LEFT JOIN category
        ON property.category_id = category.id WHERE property.lessor_id = $lessorid");

       $resultArray = array();

       while($item = mysqli_fetch_array($result,MYSQLI_ASSOC)){
           $resultArray[] = $item;
       }
       return $resultArray;;
    }

    public function getDatawParam($propertyID='21'){
        $result = $this->db->con->query("SELECT property_name, barangay, available_for, category_name, username
        FROM property 
        LEFT JOIN category
        ON property.category_id = category.id
        LEFT JOIN lessor
        ON property.lessor_id = lessor.id WHERE property.id = $propertyID");

       $resultArray = array();

       while($item = mysqli_fetch_array($result,MYSQLI_ASSOC)){
           $resultArray[] = $item;
       }
       return $resultArray;
    }

    public function getRoom($propertyID){
        $result = $this->db->con->query("SELECT * FROM room WHERE property_id = $propertyID");

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
        $result = $this->db->con->query("SELECT COUNT(property.id)
        FROM property
        WHERE lessor_id = $lessorid");

        $resultArray = array();

        while($item = mysqli_fetch_array($result,MYSQLI_ASSOC)){
            $resultArray[] = $item;
        }
        return $resultArray;
    }

    // public function getSUM($lessorid){
    //     $result = $this->db->con->query("SELECT SUM(tenants)
    //     FROM property, room
    //     WHERE property.id = room.property_id AND property.lessor_id = $lessorid");

    //     $resultArray = array();

    //     while($item = mysqli_fetch_array($result,MYSQLI_ASSOC)){
    //         $resultArray[] = $item;
    //     }
    //     return $resultArray;
    // }

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
        WHERE room.property_id = property.id AND applicants.room_id = room.id AND applicants.tenant_id = $id");

        $resultArray = array();

        while($item = mysqli_fetch_array($result,MYSQLI_ASSOC)){
            $resultArray[] = $item;
        }
        return $resultArray;
    }

    public function getApplicants($id){
        $result = $this->db->con->query("SELECT first_name, last_name, property_name, room_number, applicants.status FROM applicants, property, room, tenant
        WHERE room.property_id = property.id AND applicants.room_id = room.id AND applicants.tenant_id = tenant.id AND property.lessor_id = $id");

        $resultArray = array();

        while($item = mysqli_fetch_array($result,MYSQLI_ASSOC)){
            $resultArray[] = $item;
        }
        return $resultArray;
    }



 
    // LEFT JOIN unit_images
    // ON units.id = unit_images.unit_id

}