<?php
    namespace App\Controller;
    use Slim\Http\Request;
    use Slim\Http\Response;

    use App\Model\Service;
    use App\Model\Banner;
    use App\Model\Job;
    use App\Model\ContactUs;

    class HomeController {
        
        public $base_url = 'http://192.168.1.57/MyProject/';
        public $upload_path = "public/uploads";
        

        public function home(Request $request, Response $response, array $args){
            $input = $request->getParsedBody();
            $user_id = $input['user_id'];
            $device_type = $input['device_type'];
            $service = Service::Select('id','service_name','service_code','service_code','instant_service_price','service_icon')->where('status','=',1)->get();
            $banner = Banner::viewallBanners($device_type);

            $latestJobs = Job::viewlatestJob($input,$device_type);
           // $eurl_arr = array();
            if($device_type == 1){
                foreach($service as $ser){
                    if(isset($ser['service_icon']) && !empty($ser['service_icon'])){
                        $eurl = 'http://3.16.87.53/public/uploads/services/'.'mdpi_'.$ser['service_icon'];
                   
                        $ser['eurl'] = $eurl;
                    }else{
                        $ser['eurl'] = '';
                    }
                    
                }
            }elseif($device_type == 2){
                foreach($service as $ser){
                    if(isset($ser['service_icon']) && !empty($ser['service_icon'])){
                        $eurl = 'http://3.16.87.53/public/uploads/services/'.'hdpi_'.$ser['service_icon'];
                   
                        $ser['eurl'] = $eurl;
                    }else{
                        $ser['eurl'] = '';
                    }
                }
            }elseif($device_type == 3){
                foreach($service as $ser){
                    if(isset($ser['service_icon']) && !empty($ser['service_icon'])){
                        $eurl = 'http://3.16.87.53/public/uploads/services/'.'xhdpi_'.$ser['service_icon'];
                   
                        $ser['eurl'] = $eurl;
                    }else{
                        $ser['eurl'] = '';
                    }
                }
            }elseif($device_type == 4){
                foreach($service as $ser){
                    if(isset($ser['service_icon']) && !empty($ser['service_icon'])){
                        $eurl = 'http://3.16.87.53/public/uploads/services/'.'xxhdpi_'.$ser['service_icon'];
                   
                        $ser['eurl'] = $eurl;
                    }else{
                        $ser['eurl'] = '';
                    }
                }
            }elseif($device_type == 5){
                foreach($service as $ser){
                    if(isset($ser['service_icon']) && !empty($ser['service_icon'])){
                        $eurl = 'http://3.16.87.53/public/uploads/services/'.'xxxhdpi_'.$ser['service_icon'];
                   
                        $ser['eurl'] = $eurl;
                    }else{
                        $ser['eurl'] = '';
                    }
                }
            }else{
                foreach($service as $ser){
                    if(isset($ser['service_icon']) && !empty($ser['service_icon'])){
                        $eurl = 'http://3.16.87.53/public/uploads/services/'.$ser['service_icon'];
                   
                        $ser['eurl'] = $eurl;
                    }else{
                        $ser['eurl'] = '';
                    }
                }
            }
            if($service){
                $resp["message"] = "Home Data Listed successfully";
                $resp["current_date"] = array(
                    'date'=>  date('d/m/Y'),
                    'day'=> date('D')
                );
                $resp['code'] = '200';
                $resp['status'] = '1';
                $resp['body'] = array(
                    'serviceData'=>$service,
                   // 'service_eurl'=>,
                    'bannerData'=>$banner,
                    'userJobs'=>$latestJobs
                );
            }else{
                $resp["message"] = "No Record Found!";
                $resp['code'] = '400';
                $resp['status'] = '0';
                $resp['body'] = array(
                    'serviceData'=>'',
                    'bannerData'=>'',
                    'userJobs'=>''
                );
            }
            $response = $response->withJson($resp, 200);
            return $response;
        }


        public function contactUs(Request $request, Response $response, array $args){
            $input = $request->getParsedBody();
           
            $res = ContactUs::InsertQueries($input);
            //print_r($result);die();

            if ($res) {
                $resp["message"] = "Your Query send Successfully! We will get back to you shortly!";
                $resp['code'] = '200';
                $resp['status'] = '1';
                $resp['query_id'] =$res;
                $resp['request'] = $input;
            
            }else{
                $resp["message"] = "Oops! There is something went wrong! PLease Try Again";
                $resp['code'] = '400';
                $resp['status'] = '3';
                $resp['query_id'] = '';
                $resp['request'] = $input;
            }
             $response = $response->withJson($resp, 200);
                  
            return $response;
        }
    }
    