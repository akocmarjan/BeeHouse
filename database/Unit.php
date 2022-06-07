<?php

class Unit{
    public $db = null;

    public function __construct(DBController $db){
        if(!isset($db->con)) return null;
        $this->db = $db;
    }

    //fetch units data using getdata method
    public function getData(){
       $result = $this->db->con->query("SELECT name, address, category_name, room_number, slots, price, status, tenants
       FROM units
       INNER JOIN category
       ON units.category_id = category.id
       INNER JOIN rooms
       ON units.id = rooms.id");

       $resultArray = array();

       while($item = mysqli_fetch_array($result,MYSQLI_ASSOC)){
           $resultArray[] = $item;
       }
       return $resultArray;
    }
}