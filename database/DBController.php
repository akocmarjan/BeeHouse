<?php
// "Driver={MySQL ODBC 8.0 UNICODE Driver};Server=MYSQL8002.site4now.net;
// Database=db_a881cd_mydb;
// Uid=a881cd_mydb;
// Password=YOUR_DB_PASSWORD"
class DBController{
    // Database Connection Properties
    protected $host = 'localhost';
    protected $user = 'root';
    protected $password = '';
    protected $database = 'beehouse';

    // Connection property
    public $con = null;

    // Call constructor
    public function __construct(){
        $this->con = mysqli_connect($this->host,$this->user,$this->password,$this->database);
        if($this->con->connect_error){
            echo "Fail".$this->con->connect_error;
        }
    }

    public function __destruct(){
        $this->closeConnection();
    }

    //for closing connection
    protected function closeConnection(){
        if($this->con != null){
            $this->con->close();
            $this->con = null;
        }
    }

    function runQuery($query) {
		$result = mysqli_query($this->con,$query);
		while($row=mysqli_fetch_assoc($result)) {
			$resultset[] = $row;
		}		
		if(!empty($resultset))
			return $resultset;
	}
	
	function numRows($query) {
		$result  = mysqli_query($this->con, $query);
		$rowcount = mysqli_num_rows($result);
		return $rowcount;	
	}
	
	function executeQuery($query) {
	    $result  = mysqli_query($this->con, $query);
	    return $result;	
	}
}

