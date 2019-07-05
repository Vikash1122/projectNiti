<?php
    namespace App\Controller;
    use Slim\Http\Request;
    use Slim\Http\Response;

    use App\Model\Package;
    use App\Model\PackageCategory;
    use App\Model\PackageService;

    class PackageController {

        public function view(Request $request, Response $response, array $args){
            $input = $request->getParsedBody();
            $type= $input['package_type'];

            if($type == 'STANDARD'){
                $packages = Package::with('packcat')->where('package_type','=',$type)->get();
            }elseif($type == 'PLUS'){
                $packages = Package::with('packcat')->where('package_type','=','STANDARD')->orWhere('package_type','=','PLUS')->get();
            }elseif($type == 'PREMIUM'){
                $packages = Package::with('packcat')
                        ->where('package_type','=','STANDARD')
                        ->orWhere('package_type','=','PLUS')
                        ->orWhere('package_type','=','PREMIUM')
                        ->get();
            }
//print_r($packages);die();
           // $packages = Package::with('packcat')->where('package_type','=',$type)->get();
            foreach($packages as $pack){
                foreach($pack['packcat'] as $cat){
                    $pc = PackageService::where('package_cat_id','=',$cat->id)->get();
                
                    $cat['pc']= $pc;
                }
            }
            //print_r($packages);die();
            if($packages){
                $resp["message"] = "Package Listed Successfully!";
                $resp['code'] = '200';
                $resp['status'] = '1';
                $resp['body'] = $packages;
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
    