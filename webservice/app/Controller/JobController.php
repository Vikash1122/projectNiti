<?php
    namespace App\Controller;
   
    use Slim\Http\Request;
    use Slim\Http\Response;

    use App\Model\Job;
    use App\Model\JobService;
    use App\Model\SurveyorReport;
    use App\Model\Amc;

    class JobController {
        
        // public function addJob(Request $request, Response $response, array $args){
        //     $input = $request->getParsedBody();
        //     $data = array();
        //     $res = Job::InsertJob($input);
        //     $job_id = $res;
        //    //print_r(count($input['itemData']));die();
        //     foreach($input['itemData'] as $item){
        //         $data['job_id'] = $res;
        //         $data['service_id'] = (int)$item['service_id'];
        //         $data['specify_problem'] = $item['specify_problem'];
        //         $data['additional_notes'] = $item['additional_notes'];

        //         if (isset($_FILES['service_image']) && !empty($_FILES['service_image']['name'])) {
        //             $time = time();
        //             $est_attachments = $_FILES['service_image'];
        //             $data['service_image'] = uniqid(rand()).$est_attachments['name'];
        //             $folderPath = public_path() . '/uploads/job_images/';
        //             move_uploaded_file($est_attachments['tmp_name'], $folderPath.$data['service_image']);
        //            // $estimate['service_image'] = $time . '_' . $est_attachments['name'];
        //         }
        //         $result = JobService::InsertJobService($data);

        //        // print_r($result);
        //     }
        //     if ($result) {
        //         $resp["message"] = "Your Job Details successfully Added";
        //         $resp['code'] = '200';
        //         $resp['status'] = '1';
        //         $resp['job_id'] =$res;
        //         $resp['request'] = $input;
            
        //     }else{
        //         $resp["message"] = "Oops! There is something went wrong! PLease Try Again";
        //         $resp['code'] = '400';
        //         $resp['status'] = '3';
        //         $resp['job_id'] = '';
        //         $resp['request'] = $input;
        //     }
        //      $response = $response->withJson($resp, 200);
                  
        //     return $response;

        // }

        public function addJob(Request $request, Response $response, array $args){
            $input = $request->getParsedBody();
            $data = array();
            $res = Job::InsertJob($input);
            $job_id = $res;
           // print_r($input);die();
            $myarray= array();
            foreach($input['service_id'] as $t=>$id){
                if (isset($_FILES['service_image']) && !empty($_FILES['service_image']['name'][$t])) {
                    $service_image = $_FILES['service_image'];
                    
                    $input['service_image'] = uniqid(rand()).$service_image['name'][$t];
                    $folderPath = $_SERVER['DOCUMENT_ROOT'].'/public/uploads/job_images/';
                  move_uploaded_file($service_image['tmp_name'][$t], $folderPath.$input['service_image']);
               }
                    $all = array(
                    'job_id' =>$res,
                    'service_id' => $id,
                    'specify_problem' => $input['specify_problem'][$t] ,
                    'additional_notes' => $input['additional_notes'][$t], 
                    'service_image' => $input['service_image'] 
                );
                   
                    array_push($myarray,$all);
                    
            } 
                $result = JobService::insert($myarray);
           
            if ($result) {
                $resp["message"] = "Your Job Created successfully Added";
                $resp['code'] = '200';
                $resp['status'] = '1';
                $resp['job_id'] =$res;
                $resp['request'] = $input;
            
            }else{
                $resp["message"] = "Oops! There is something went wrong! PLease Try Again";
                $resp['code'] = '400';
                $resp['status'] = '3';
                $resp['job_id'] = '';
                $resp['request'] = $input;
            }
             $response = $response->withJson($resp, 200);
                  
            return $response;

        }

        public function add(Request $request, Response $response, array $args){
            $input = $request->getParsedBody();
            $data = array();
            //if($input['payment_status'] == 'success'){
                $check = Amc::where('title','=',$input['title'])->where('user_id','=',$input['user_id'])->first();
           
                if($check == ''){
                    // create new Amc and save it
                    
                    $amc = Amc::InsertGuest($input);
                    
                    $res = Job::InsertGuestJob($input,$amc);
                    $job_id = $res;
                    
                    $myarray= array();
                   // print_r($_FILES['service_image']);die();
                    foreach($input['service_id'] as $t=>$id){

                        if (isset($_FILES['service_image']) && !empty($_FILES['service_image']['name'][$t])) {
                             $service_image = $_FILES['service_image'];
                             
                             $input['service_image'] = uniqid(rand()).$service_image['name'][$t];
                             $folderPath = $_SERVER['DOCUMENT_ROOT'].'/public/uploads/job_images/';
                           move_uploaded_file($service_image['tmp_name'][$t], $folderPath.$input['service_image']);
                        }


                            $all = array(
                            'job_id' =>$res,
                            'service_id' => $id,
                            'specify_problem' => $input['specify_problem'][$t] ,
                            'additional_notes' => $input['additional_notes'][$t],
                            'service_image' => $input['service_image'] 
                        );
                            array_push($myarray,$all);
                    } 
                    $result = JobService::insert($myarray);

                }
                //print_r($input);die();
                if ($result) {
                    $resp["message"] = "Your Job Created successfully Added";
                    $resp['code'] = '200';
                    $resp['status'] = '1';
                    $resp['job_id'] =$res;
                    $resp['request'] = $input;
                }else{
                    $resp["message"] = "Oops! While creating job Something Went wrong. Please try with different nick name!";
                    $resp['code'] = '400';
                    $resp['status'] = '4';
                    $resp['job_id'] = '';
                    $resp['request'] = $input;
                }
            // }else{
            //     $resp["message"] = "Transaction failed! Please Try again after some time!";
            //     $resp['code'] = '400';
            //     $resp['status'] = '4';
            //     $resp['job_id'] = '';
            // }
            
            $response = $response->withJson($resp, 200);
            return $response;

        }

        public function viewAllJobs(Request $request, Response $response, array $args){
            $input = $request->getParsedBody();
            $data = array();
            $device_type = $input['device_type'];
            $result = Job::viewallJobs($input,$device_type);
         
            if ($result) {
                $resp["message"] = "Jobs Listed successfully!";
                $resp['code'] = '200';
                $resp['status'] = '1';
                $resp['body'] =$result;
                $resp['request'] = $input;
            
            }else{
                $resp["message"] = "No Record Found!";
                $resp['code'] = '400';
                $resp['status'] = '0';
                $resp['body'] = '';
                $resp['request'] = $input;
            }
             $response = $response->withJson($resp, 200);
                  
            return $response;

        }

        public function view(Request $request, Response $response, array $args){
            $input = $request->getParsedBody();
            $device_type = $input['device_type'];
            $result = Job::viewJob($input,$device_type);
            $CommentData = SurveyorReport::viewJobComment($input,$device_type);
            // $result['total_price'] = $result['CommentData']['total_price'];
            // $result['total_time'] = $result['CommentData']['total_time'];
           // print_r($CommentData);die();

            if ($result) {
                $resp["message"] = "Job Detail View success!";
                $resp['code'] = '200';
                $resp['status'] = '1';
                $resp['body'] =array(
                    'jobData'=>$result,
                    'commentData'=>$CommentData
                );
                $resp['request'] = $input;
            
            }else{
                $resp["message"] = "No Data Found!";
                $resp['code'] = '400';
                $resp['status'] = '0';
                $resp['body'] = '';
                $resp['request'] = $input;
            }
             $response = $response->withJson($resp, 200);
                  
            return $response;
        }

        public function selectJob(Request $request, Response $response, array $args){
            $input = $request->getParsedBody();
            $user_id = $input['user_id'];
            $result = SurveyorReport::viewJObs($user_id);

           // print_r($result);die();
            if ($result) {
                $resp["message"] = "Jobs Listed successfully!";
                $resp['code'] = '200';
                $resp['status'] = '1';
                $resp['body'] =$result;
                $resp['request'] = $input;
            
            }else{
                $resp["message"] = "No Data Found!";
                $resp['code'] = '400';
                $resp['status'] = '0';
                $resp['body'] = '';
                $resp['request'] = $input;
            }
             $response = $response->withJson($resp, 200);
                  
            return $response;
        }

        public function viewJob(Request $request, Response $response, array $args){
            $input = $request->getParsedBody();
           
            $device_type = $input['device_type'];
            $result = Job::viewPayConfirmJob($input,$device_type);
            
            //print_r($result);die();
            if ($result) {
                $resp["message"] = "Job Detail View success!";
                $resp['code'] = '200';
                $resp['status'] = '1';
                $resp['body'] = $result;
                //$resp['request'] = $input;
            
            }else{
                $resp["message"] = "No Data Found!";
                $resp['code'] = '400';
                $resp['status'] = '0';
                $resp['body'] = '';
                $resp['request'] = $input;
            }
             $response = $response->withJson($resp, 200);
                  
            return $response;
        }
       
        public function viewJobDates(Request $request, Response $response, array $args){
            $input = $request->getParsedBody();
            $result = Job::viewallJobsDate($input);
            
            if ($result) {
                $resp["message"] = "Current Month Job Dates View success!";
                $resp['code'] = '200';
                $resp['status'] = '1';
                $resp['body'] = $result;
                //$resp['request'] = $input;
            
            }else{
                $resp["message"] = "No Data Found!";
                $resp['code'] = '400';
                $resp['status'] = '0';
                $resp['body'] = '';
                $resp['request'] = $input;
            }
             $response = $response->withJson($resp, 200);
                  
            return $response;
        }
    }
    