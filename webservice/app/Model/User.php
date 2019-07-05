<?php
    namespace App\Model;

    use Illuminate\Database\Eloquent\Model;
    
    class User extends Model {
        //
        protected $table = 'users';
        public $timestamps = false;
        
        public function demo() {
            return 'Hello this ' ;
        }

        public function isValidApiKey($api_key) {
        
            //echo "jhasgd";
            return "Mpr5OfKUUB1/0Gpzp48iXzXC0gbN6NI+Zx+tBNZtGdA="==$api_key;
        }

        public function auth($token, $user_id)
        {
            if($token){
                $data = User::where('access_token','=',$token)->where('id','=',$user_id)->first();
                return $data;
            }else{
                return false;
            }
        }
        /**
         * Generating random Unique MD5 String for user Api key
         */
        public function generateOTP() {
            $a = '';
            for ($i = 0; $i<4; $i++) 
            {
                $a .= mt_rand(0,9);
            }
            return $a;
        }
         
        public function checkOtp(){
            $check = User::where('mobile','=',$mobile)->where('otp','=',$otp)->first();
            return $check;
        }




        public function otp($otp,$client_id,$type=2)
{
		
	$stmt = $this->conn->prepare("SELECT user_id,user_type,otp FROM user_otp WHERE client_id = ? AND otp = ? limit 1");
        
		if($num_row > 0) {
			$stmt = $this->conn->prepare("UPDATE ".$table." set status = 1 where ".$table_id." = ?");
			
			$stmt->bind_param("i", $user_id);
			$stmt->execute();
			$num_affected_rows = $stmt->affected_rows;
			$stmt->close();
			
			//return user id
			$resp['error'] = false ;
			$resp['user_id'] = $user_id ;			
			$resp['user_type'] = $user_type ;
			$user_data = $this->db->find($table,array('conditions'=>array("$table_id=$user_id")));
            $resp["all_info"] = $user_data;	
			//send registration successfull email
			$rstmt = $this->conn->prepare("SELECT name,email,mobile FROM $table WHERE $table_id = ? limit 1");
        		$rstmt->bind_param("s", $user_id);		
        		$rstmt->execute();
		
			$rstmt->bind_result($name,$email,$mobile);
			$rstmt->store_result();
			$rstmt->fetch();
			$rstmt->close();
			$data = array();
			if(!empty($email))
			{
				$url = 'https://www.nittygritty.co';
				ob_start();
				include('template/registration.php');
				$html = ob_get_clean();
				$emails['to'] = $email;			
				$this->email($emails,'Welcome to aapkatrade',$html);
			}
			else 
			{
				$message = "Dear ".$name;
				$message .= "Congratulations on joining aapkatrade - You have made the right choice!";
				$message .= "Mobile:".$mobile;
				$message .= "Thank you,";
				$message .= "Aapka Trade Team";
				$this->sms($mobile,$message);	
			}

		}
		else {
			$resp['error'] = true ;			
		}
		
		return $resp;
}

        public function isUserExist($email, $password){
            $data = User::where('email','=',$email)->where('email','=',$password)->get();
            print_r($data);die();
            $sql = "Select * from users where email = '$email' and password = '$password' limit 1";
            $result = mysqli_query($con, $sql);
            $count = mysqli_num_rows($result);
            if($count > 0){
                return true;
            }
            return false;		
        }
    }
