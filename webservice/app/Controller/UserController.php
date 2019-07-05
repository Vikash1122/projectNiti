<?php
    namespace App\Controller;
   
    use Slim\Http\Request;
    use Slim\Http\Response;

    use App\Model\User;
    use App\Model\Card;
    use App\Model\Amc;


    class UserController {

        public function registration(Request $request, Response $response, array $args){
            $input = $request->getParsedBody();
            $isRegistered = User::where('mobile','=',$input['mobile'])->first();
            $arraydata = array(
                'userData'=>$isRegistered
            );
            if($isRegistered == ''){
                $token = bin2hex(openssl_random_pseudo_bytes(12));

                // create new user and save it
            $user = new User;
            $user->firstname = $input['firstname'];
            $user->lastname = $input['lastname'];
            $user->email = $input['email'];
            $user->mobile = $input['mobile'];
            $user->contact_no = $input['contact_no'];
            $user->login_type = $input['login_type'];
            $user->status = $input['status'];
            $user->device_type = $input['device_type'];
            $user->access_token = $token;
            $user->save();
            $inser_id = $user->id;
            }
            
            if ($user) {
                $registeredData = User::where('id','=',$inser_id)->first();
                $resp["message"] = "You successfully Registered";
                $resp['code'] = '200';
                $resp['status'] = '1';
                $resp['user_id'] =$inser_id;
                $resp['body'] = $registeredData;
            
            } else if($isRegistered){
                //$otp_generate = $User::generateOTP();
                $resp["message"] = "Oops! This mobile number is already registered! Please TRy with Another Mobile Number!!";
                $resp['code'] = '400';
                $resp['status'] = '4';
                $resp['user_id'] = $arraydata['userData'][0]['id'];
                $resp['request'] = $input;
            } else{
                $resp["message"] = "Oops! There is something went wrong! PLease TRy Again";
                $resp['code'] = '400';
                $resp['status'] = '3';
                $resp['user_id'] = '';
                $resp['request'] = $input;
            }
             $response = $response->withJson($resp, 200);
                  
            return $response;

        }

        public function sendOtp(Request $request, Response $response, array $args){
            $input = $request->getParsedBody();
            
            $isRegistered = User::where('mobile','=',$input['mobile'])->first();
            $arraydata = array(
                'userData'=>$isRegistered
            ); 
            //IF New User
            if($isRegistered == ''){
               $otp_generate = User::generateOTP();
        
            }
            if ($otp_generate) {
                $resp["message"] = "Otp Generate successfully";
                $resp['code'] = '200';
                $resp['status'] = '1';
                $resp['otp'] = $otp_generate;
            
            } else{
                $resp["message"] = "Oops! This mobile number is already registered! Please TRy with Another Mobile Number!!";
                $resp['code'] = '200';
                $resp['status'] = '4';
                $resp['otp'] = '';
                $resp['request'] = $input;
            }
             $response = $response->withJson($resp, 200);
            return $response;

        }

        public function login(Request $request, Response $response, array $args){
            //$headers = apache_request_headers();
        
            $input = $request->getParsedBody();
            $mobile = $input['mobile'];
            $login_type = $input['login_type'];
            $device_type = $input['device_type'];
            //$password = md5($input['password']);
            //$password = $input['password'];
            $token = bin2hex(openssl_random_pseudo_bytes(12));
            
             $otp_generate = User::generateOTP();
            $data = array(
                'access_token'=>$token,
                'login_type'=>$login_type,
                'device_type'=>$device_type
                );
                //print_r($data);die();
            $updatetoken = User::where('mobile','=',$mobile)->update($data);
            $isRegistered = User::where('mobile','=',$mobile)->first();
            if(isset($isRegistered->profile_pic) && !empty($isRegistered->profile_pic)){
                $eurl = 'http://3.16.87.53/public/uploads/users/'.$isRegistered->profile_pic;
                $isRegistered['eurl'] = $eurl;
            }else{
                $isRegistered['eurl'] = '';
            }
            //print_r($isRegistered);die();
            if($isRegistered != '' && $updatetoken){
                $resp["message"] = "You successfully Login";
                $resp['code'] = '200';
                $resp['status'] = '2';
                $resp['body'] =$isRegistered;
                $resp['otp'] =  $otp_generate;
                
            }else{
                $resp["message"] = "You Are not Registered User. PLease Register and login.";
                $resp['code'] = '200';
                $resp['status'] = '4';
                $resp['body'] =$isRegistered;
                $resp['otp'] = '';	
                $resp['request'] = $input;
            }
            
            $response = $response->withJson($resp, 200);
                
            return $response;
        }

        public function view(Request $request, Response $response, array $args){
            $input = $request->getParsedBody();
            $user_id = $input['user_id'];

                $user = User::find($user_id);
                if(isset($user->profile_pic) && !empty($user->profile_pic)){
                    $eurl = 'http://3.16.87.53/public/uploads/users/'.$user->profile_pic;
                    $user['eurl'] = $eurl;
                }else{
                    $eurl = '';
                }
                $card = Card::where('user_id','=',$user_id)->where('isPrimary','=',1)->first();

            if($user){
                $resp["message"] = "Your Profile!";
                $resp['code'] = '200';
                $resp['status'] = '1';
                $resp['body'] = array(
                    'userData'=> $user,
                    'cardData'=> $card
                );
            }else{
                $resp["message"] = "Oops! Something Went Wrong !!";
                $resp['code'] = '400';
                $resp['status'] = '0';
                $resp['body'] ='';
                $resp['request'] = $input;
            }

            $response = $response->withJson($resp, 200);
                
            return $response;
        }

        public function edit(Request $request, Response $response, array $args){
            $input = $request->getParsedBody();
            $firstname = $input['firstname'];
            $lastname = $input['lastname'];
            $email = $input['email'];
            $user_id = $input['user_id'];

                $user = User::find($user_id);
                if ($firstname == '') {
                    $user->firstname = $user->firstname;
                } else {
                    $user->firstname = $firstname;
                }
                if ($lastname == '') {
                    $user->lastname = $user->lastname;
                } else {
                    $user->lastname = $lastname;
                }
                if ($email == '') {
                    $user->email = $user->email;
                } else {
                    $user->email = $email;
                }
//print_r($_FILES['profile_pic']);die();
                if (isset($_FILES['profile_pic']) && !empty($_FILES['profile_pic']['name'])) {
                   // $time = time();
                    $profile_pic = $_FILES['profile_pic'];
                    $input['profile_pic'] = uniqid(rand()).$profile_pic['name'];
                    $folderPath = $_SERVER['DOCUMENT_ROOT'].'/public/uploads/users/';
                  //print_r($_SERVER['DOCUMENT_ROOT']);die();
                  move_uploaded_file($profile_pic['tmp_name'], $folderPath.$input['profile_pic']);
                }

                $profile_pic = $input['profile_pic'];
                if ($profile_pic == '') {
                    $user->profile_pic = $user->profile_pic;
                } else {
                    $user->profile_pic = $profile_pic;
                }
                $update = $user->update();

                $user = User::find($user_id);
                if(isset($user->profile_pic) && !empty($user->profile_pic)){
                    $eurl = 'http://3.16.87.53/public/uploads/users/'.$user->profile_pic;
                    $user['eurl'] = $eurl;
                }else{
                    $eurl = '';
                }

            if($update){
                $resp["message"] = "Your Profile Updated successfully";
                $resp['code'] = '200';
                $resp['status'] = '1';
                $resp['eurl'] = $eurl;
            }else{
                $resp["message"] = "Oops! There is Something Went Wrong while Updating Profile.";
                $resp['code'] = '400';
                $resp['status'] = '0';
                $resp['request'] = $input;
            }

            $response = $response->withJson($resp, 200);
                
            return $response;
        }

        

        public function logout(Request $request, Response $response, array $args){
            $input = $request->getParsedBody();
            $user_id = $input['user_id'];
            $user = User::findOrfail($user_id);
            if($user){
                $token = NULL;
                $login_type = NULL;
                $device_type = NULL;

                $data = array(
                    'access_token'=>$token,
                    'login_type'=>$login_type,
                    'device_type'=>$device_type
                    );
                $updatetoken = User::where('id','=',$user_id)->update($data);
                if($updatetoken){
                    $resp["message"] = "Logout Successfully";
                    $resp['code'] = '200';
                    $resp['status'] = '1';
                }else{
                    $resp["message"] = "Oops! Something Went Wrong";
                    $resp['code'] = '400';
                    $resp['status'] = '0';
                    $resp['request'] = $input;
                }
            }
            $response = $response->withJson($resp, 200);
                
            return $response;
        }

        public function dropdown(Request $request, Response $response, array $args){
            $input = $request->getParsedBody();
            $user_id = $input['user_id'];
            $res = array();
            if(in_array($input['type'],array('amc_location','company_profile'))) {
                switch($input['type']){
        
                    case 'amc_location' :
                        $result =  Amc::select('title','id')->where('amcs.type','=',1)->where('user_id','=',$user_id)->get();
                        
                        if ($result){
                            $res = $result;
                        }
                        
                        break;
                    case 'company_profile' :
                        $cond = "1";
                        if($input['id']) {
                            $cond .= " AND user_id = {$input['id']}";
                        }
                        $result =  $conn->query("SELECT * FROM company_profiles WHERE $cond");
                        while ($row = $result->fetch_assoc()){
                            $res[] = $row;
                        }
                        break;
                }
               // print_r($res);die();
                if(count($res)>0) {
                    $resp["message"] = "Listed!";
                    $resp['code'] = '200';
                    $resp['status'] = '1';
                    $resp['body'] = $res;
                }
                else {
                    $resp["message"] = "No record found";
                    $resp['code'] = '200';
                    $resp['status'] = '0';
                    $resp['body'] = $res;
                }
            }
            else{
                $resp["message"] = "Mismatch args";
                $resp['code'] = '101';
                $resp['status'] = '4';
                $resp['body'] = $res;
            }
        
            $response=$response->withJson($resp, 200);
        
            return $response;

        }
        
    }
    