<?php
    class Post{
        private $conn;
        private $table = 'property';

        public $id;
        public $property_name;
        public $category_id;
        public $category_name;
        public $region;
        public $province;
        public $city;
        public $barangay;
        public $postal;
        public $username;
        public $available_for;
        public $image_name;
        public $added_at;

        public function __construct($db){
            $this->conn = $db;
        }

        public function read(){
            $query = 'SELECT
                p.id,
                p.property_name, 
                p.barangay, 
                p.city, 
                p.available_for,
                p.added_at, 
                c.category_name, 
                l.username, 
                i.image_name
                FROM property p 
                LEFT JOIN category c
                ON p.category_id = c.id
                LEFT JOIN lessor l
                ON p.lessor_id = l.id
                LEFT JOIN unit_images i
                ON p.id = i.property_id
                GROUP BY p.id
                ORDER BY p.added_at DESC';

            $stmt = $this->conn->prepare($query);

            $stmt->execute();

            return $stmt;
        }
    }