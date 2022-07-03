<?php

class Table{
    public $db = null;

    public function __construct(DBController $db){
        if(!isset($db->con)) return null;
        $this->db = $db;
    }

    //fetch units data using getdata method
    public function getData(){
        $result = $this->db->con->query("SELECT property.id, property_name, barangay, city, available_for, category_name, image_name FROM property, category, unit_images
        WHERE property.category_id = category.id AND property.id = unit_images.property_id
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
        $result = $this->db->con->query("SELECT property.id as property_id, category_id as category_id, property_name, region, province, city, barangay, postal, available_for, rand_id, category_name
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
        $result = $this->db->con->query("SELECT property_name, barangay, city, available_for, category_name, username, first_name, last_name, rand_id
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
        $result = $this->db->con->query("SELECT COUNT(id) FROM lessor");

       $resultArray = array();

       while($item = mysqli_fetch_array($result,MYSQLI_ASSOC)){
           $resultArray[] = $item;
       }
       return $resultArray;
    }

    public function getUsers(){
        $result = $this->db->con->query("SELECT COUNT(id) FROM user ");

       $resultArray = array();

       while($item = mysqli_fetch_array($result,MYSQLI_ASSOC)){
           $resultArray[] = $item;
       }
       return $resultArray;
    }

    public function getPropertyCount(){
        $result = $this->db->con->query("SELECT COUNT(id) FROM property ");

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

    public function getSUM($lessorid){
        $result = $this->db->con->query("SELECT SUM(tenants)
        FROM property, room
        WHERE property.id = room.property_id AND property.lessor_id = $lessorid");

        $resultArray = array();

        while($item = mysqli_fetch_array($result,MYSQLI_ASSOC)){
            $resultArray[] = $item;
        }
        return $resultArray;
    }

    public function getSUMIncome($lessorid){
        $result = $this->db->con->query("select sum(price) from tenant
        left join room on room.id = tenant.room_id
        left join property on property.id = room.property_id
        WHERE property.lessor_id = $lessorid");

        $resultArray = array();

        while($item = mysqli_fetch_array($result,MYSQLI_ASSOC)){
            $resultArray[] = $item;
        }
        return $resultArray;
    }

    public function getCOUNTAPP($lessorid){
        $result = $this->db->con->query("SELECT applicants.id as applicants_id FROM applicants, property, room, user
        WHERE room.property_id = property.id AND applicants.room_id = room.id AND applicants.user_id = user.id AND property.lessor_id = $lessorid");

        $rows = mysqli_num_rows($result);
    
        return $rows;
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
        $result = $this->db->con->query("SELECT applicants.id, property_name, city, barangay, room_number, price, applicants.status FROM applicants, property, room
        WHERE room.property_id = property.id AND applicants.room_id = room.id AND applicants.user_id = $id");

        $resultArray = array();

        while($item = mysqli_fetch_array($result,MYSQLI_ASSOC)){
            $resultArray[] = $item;
        }
        return $resultArray;
    }

    public function getApplicants($id){
        $result = $this->db->con->query("SELECT applicants.id as applicants_id, room.id as room_id, user.id as user_id, first_name, last_name, gender, phone, property_name, room_number, applicants.status FROM applicants, property, room, user
        WHERE room.property_id = property.id AND applicants.room_id = room.id AND applicants.user_id = user.id AND property.lessor_id = $id");

        $resultArray = array();

        while($item = mysqli_fetch_array($result,MYSQLI_ASSOC)){
            $resultArray[] = $item;
        }
        return $resultArray;
    }

    public function getTenant($id){
        $result = $this->db->con->query("SELECT tenant.id as tenant_id, room.id as tenant_room_id, first_name, last_name, gender, tenant.status, started_at, due_date, price FROM room, tenant, user
        WHERE tenant.user_id = user.id AND tenant.room_id = $id
        GROUP BY tenant.id");

        $resultArray = array();

        while($item = mysqli_fetch_array($result,MYSQLI_ASSOC)){
            $resultArray[] = $item;
        }
        return $resultArray;
    }

    public function getSearchResult($search_term, $this_page_first_result,  $result_per_page){
        $result = $this->db->con->query("SELECT *
        FROM `property`, category, unit_images
        WHERE property.category_id = category.id AND property.id = unit_images.property_id AND ((province LIKE'%$search_term%')
          OR (city LIKE '%$search_term%')
          OR (barangay LIKE '%$search_term%')
          OR (property_name LIKE '%$search_term%'))
        GROUP BY property.id
        ORDER BY property.id ASC
        LIMIT $this_page_first_result, $result_per_page");

        $resultArray = array();
        while($item = mysqli_fetch_array($result,MYSQLI_ASSOC)){
            $resultArray[] = $item;
        }
        return $resultArray;
    }
    public function getAmenity($rand_id){
        $result = $this->db->con->query("SELECT * FROM amenity
        LEFT JOIN amenity_category
        ON amenity.amenity_category_id = amenity_category.id
        WHERE amenity.rand_id = $rand_id");

        $resultArray = array();
        while($item = mysqli_fetch_array($result,MYSQLI_ASSOC)){
            $resultArray[] = $item;
        }
        return $resultArray;
    }

    public function getRows($search_term){
        $result = $this->db->con->query("SELECT *
        FROM `property`, category, unit_images
        WHERE property.category_id = category.id AND property.id = unit_images.property_id AND ((province LIKE'%$search_term%')
          OR (city LIKE '%$search_term%')
          OR (barangay LIKE '%$search_term%')
          OR (property_name LIKE '%$search_term%'))
        GROUP BY property.id
        ORDER BY property.id ASC");

        $rows = mysqli_num_rows($result);
        
        return $rows;
    }

    public function getCurrentHome($id){
        $result = $this->db->con->query("SELECT property_name, room_number, price, started_at,  due_date, tenant.status as tenant_status FROM property, room, tenant
        WHERE property.id = room.property_id AND tenant.room_id = room.id AND tenant.user_id = $id
        GROUP BY tenant.id");

        $resultArray = array();
        while($item = mysqli_fetch_array($result,MYSQLI_ASSOC)){
            $resultArray[] = $item;
        }
        return $resultArray;
    }


}
