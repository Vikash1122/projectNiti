<?php
    namespace App\Controller;
    use Slim\Http\Request;
    use Slim\Http\Response;

    use App\Model\User;
    use App\Model\Amc;

    class AmcController {

        public function addAmc(Request $request, Response $response, array $args){
            $input = $request->getParsedBody();
            $check = Amc::where('title','=',$input['title'])->where('user_id','=',$input['user_id'])->first();
            //print_r($check == '');die();
            if($check == ''){
                // create new Amc and save it
                $amc = Amc::InsertAmc($input);
            }
            
            if ($amc > 0) {
                $resp["message"] = "Your AMC Details successfully Added";
                $resp['code'] = '200';
                $resp['status'] = '1';
                $resp['amc_id'] =$amc;
            
            }else{
                $resp["message"] = "Oops! This Amc is already exists! Please TRy with Another Nick Name!!";
                $resp['code'] = '400';
                $resp['status'] = '4';
                $resp['card_id'] = '';
            }
             $response = $response->withJson($resp, 200);
                  
            return $response;
        }

        
        public function view(Request $request, Response $response, array $args){
            $input = $request->getParsedBody();
            $user_id = $input['user_id'];

            $amc = Amc::viewAllAmc($input);
//print_r($amc);die();
            if($amc){
                $resp["message"] = "AMC Listed Successfully!";
                $resp['code'] = '200';
                $resp['status'] = '1';
                $resp['body'] = $amc;
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


        public function pendingAmc(Request $request, Response $response, array $args){
            $input = $request->getParsedBody();
            $user_id = $input['user_id'];
            //$status = $input['amc_status'];
            $pendingAmc = Amc::viewAllPendingAmc($input);
            //$pendingAmc = Amc::where('user_id','=',$user_id)->where('amc_status','=',0)->get();
            //print_r($pendingAmc);die();

            if($pendingAmc){
                $resp["message"] = "Pending AMC's Listed Successfully!";
                $resp['code'] = '200';
                $resp['status'] = '1';
                $resp['body'] = $pendingAmc;
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


    }
    