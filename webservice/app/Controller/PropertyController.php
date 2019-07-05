<?php
    namespace App\Controller;
    use Slim\Http\Request;
    use Slim\Http\Response;

    use App\Model\User;
    use App\Model\Property;

    class PropertyController {

        public function addPropertInfo(Request $request, Response $response, array $args){
            $input = $request->getParsedBody();
            
                // create new Amc and save it
            $amc = new Property();
            $amc->user_id = $input['user_id'];
            $amc->villa_or_aptNo = $input['villa_or_aptNo'];
            $amc->building_name = $input['building_name'];
            $amc->no_ofBedrooms = $input['no_ofBedrooms'];
            $amc->area = $input['area'];
            $amc->street_no = $input['street_no'];
            $amc->lat = $input['lat'];
            $amc->lng = $input['lng'];
            $amc->address = $input['address'];
            $amc->save();
            $inser_id = $amc->id;
          
            if ($amc) {
                $resp["message"] = "Your AMC Details successfully Added";
                $resp['code'] = '200';
                $resp['status'] = '1';
                $resp['amc_id'] =$inser_id;
            
            }else{
                $resp["message"] = "Oops! There is something went wrong! PLease Try Again";
                $resp['code'] = '400';
                $resp['status'] = '3';
                $resp['card_id'] = '';
            }
             $response = $response->withJson($resp, 200);
                  
            return $response;
        }

        public function editPropertyInfo(Request $request, Response $response, array $args){
            $input = $request->getParsedBody();
            $user_id = $input['user_id'];
            $property_id = $input['property_id'];

            $property = Property::find($property_id);

            if(isset($property) && !empty($property)){
                if ($input['villa_or_aptNo'] == '') {
                    $property->villa_or_aptNo = $property->villa_or_aptNo;
                } else {
                    $property->villa_or_aptNo = $input['villa_or_aptNo'];
                }
                if ($input['building_name'] == '') {
                    $property->building_name = $property->building_name;
                } else {
                    $property->building_name = $input['building_name'];
                }
                if($input['no_ofBedrooms'] == ''){
                    $property->no_ofBedrooms = $property->no_ofBedrooms;
                }else{
                    $property->no_ofBedrooms = $input['no_ofBedrooms'];
                }
                if($input['area'] == ''){
                    $property->area = $property->area;
                }else{
                    $property->area = $input['area'];
                }
                if($input['street_no'] == ''){
                    $property->street_no = $property->street_no;
                }else{
                    $property->street_no = $input['street_no'];
                }
                if($input['lat'] == ''){
                    $property->lat = $property->lat;
                }else{
                    $property->lat = $input['lat'];
                }
                if($input['lng'] == ''){
                    $property->lng = $property->lng;
                }else{
                    $property->lng = $input['lng'];
                }
                $update = $property->update();
            }
            if ($update) {
                $resp["message"] = "Your Property Details successfully Updated";
                $resp['code'] = '200';
                $resp['status'] = '1';
               // $resp['amc_id'] =$inser_id;
            
            }else{
                $resp["message"] = "Oops! There is something went wrong! PLease Try Again";
                $resp['code'] = '400';
                $resp['status'] = '3';
                $resp['request'] = $input;
            }
             $response = $response->withJson($resp, 200);
                  
            return $response;
        }
    }
    