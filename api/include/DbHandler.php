<?php
require 'vendor/autoload.php';
/**
 * Class to handle all db operations
 * This class will have CRUD methods for database tables
 *
 * 
 * 
 */
class DbHandler {

    private $conn;
    private $db;
    private $newcon;
	public $base_url = 'http://localhost/MyProject/public/api/';
    public $upload_path = "uploads";


    function __construct() {
        require_once dirname(__FILE__) . '/DbConnect.php';
        // opening db connection
        $this->db =  $db = $this->newcon = new DbConnect();
        $this->conn = $db->connect();
    }
	
	/* Project start */
	
	
	public function isUserExist($email, $password){
		$con = $this->conn;
		$sql = "Select * from users where email = '$email' and password = '$password' limit 1";
		$result = mysqli_query($con, $sql);
		$count = mysqli_num_rows($result);
		if($count > 0){
			return true;
		}
		return false;		
	}
	
	public function addNewUser($firstname, $lastname, $email, $password, $mobile, $contact_no, $status){
		$con = $this->conn;
		if(!$this->isUserExist($email, $password)){
			$sql = "Insert into users (firstname, lastname, email, password, mobile, contact_no, status) values ('$fisrtname', '$lastname',$email', '$password', '$mobile','$contact_no','$status')";
			$result = mysqli_query($con, $sql);
			if($result){
				return true;
		    }
		    return false;		
		}
	}
    
    
    /**
     * Validating user api key
     * If the api key is there in db, it is a valid key
     * @param String $api_key user api key
     * @return boolean
     */
    public function isValidApiKey($api_key) {
		
		return "Mpr5OfKUUB1/0Gpzp48iXzXC0gbN6NI+Zx+tBNZtGdA="==$api_key;
    }

	/* Project end */

    

    	
}

?>