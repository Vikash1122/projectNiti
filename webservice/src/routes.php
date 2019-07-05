<?php
//echo "hello";die();
use Slim\Http\Request;
use Slim\Http\Response;
use App\Model\User;

// Routes

$app->get('/', function (Request $request, Response $response, array $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");
    // Render index view [{name}]
    return $this->renderer->render($response, 'index.phtml', $args);
});

$authenticate=function($request, $response, $next) {
    // Getting request headers
    $headers = apache_request_headers();
    $resp = array();
//print_r($headers);die();
    // Verifying Authorization Header
    if (isset($headers['Authorization'])) {
    
		//$headers['authorization'] = $request->getParsedBody()['authorization'];
        // get the api key wait mai kr rha kuchh   ok test krna thoda    dekho
        $api_key = isset($headers['Authorization'])?$headers['Authorization']:'';   
        $db = User::isValidApiKey($api_key);
        //print_r($db);die();  
        // validating api key
        if (!$db) {
            // api key is not present in users table
            $resp["error"] = true;
            $resp["message"] = "Access Denied. Invalid Api key";
            $response=$response->withJson($resp, 401);
        } else {
            global $user_id;
            // get user primary key id
            //$user_id = $db->getUserId($api_key);
            $response=$response = $next($request, $response);
        }
    } else {
       // api key is missing in header
        $resp["error"] = true;
        $resp["message"] = "Api key is misssing";
        $response=$response->withJson($resp, 400);
    }
    return $response;
};

/*
*VerifyingAuthToken
*/
$authToken=function($request, $response, $next) {
    // Getting request headers
    $headers = apache_request_headers();
    $resp = array();
    if (isset($headers['x-api-key'])) {
        // get the api key
        $token = isset($headers['x-api-key'])?$headers['x-api-key']:'';
        $user_id = $request->getParsedBody()['user_id'];
        $db = User::auth($token,$user_id);
        // validating api key
        if (!$db) {
            // api key is not present in users table
            $resp["error"] = true;
            $resp["message"] = "Access Denied. Invalid Auth Token key";
            $resp["code"] = '401';
            $response=$response->withJson($resp, 401);
        } else {
            global $user_id;
            // get user primary key id
            $response=$response = $next($request, $response);
        }
    } else {
        // api key is missing in header
        $resp["error"] = true;
        $resp["message"] = "Auth Token key is misssing";
        $resp["code"] = '1000';
        $response=$response->withJson($resp, 200);
    }
    return $response;
};

/**
 * Verifying required params posted or not
 */
$verifyRequiredParams = function (Request $request,Response $response, $next) {
   // $input = $request->getParsedBody();

    $route = $request->getAttribute('route');
    $validators = $route->getArgument('validators');
    $error = false;
    $error_fields = "";
    $request_params = array();
    $request_params = $_REQUEST;

    // Manipulation paramsde la demande PUT
    if ($_SERVER['REQUEST_METHOD'] == 'PUT') {

        parse_str($request->getBody(), $request_params);
    }
    foreach ($validators as $field) {
        if (!isset($request_params[$field]) || strlen(trim($request_params[$field])) <= 0) {
            $error = true;
            $error_fields .= $field . ', ';
        }
    }

    if ($error) {
        //Champ (s) requis sont manquants ou vides
        $resp=array();
        $resp['error']=true;
        $resp["message"] = 'Required field(s) ' . substr($error_fields, 0, -2) . ' is missing or empty';
        $response= $response->withJson($resp, 400);

    }else{    $response = $next($request, $response);}

    return $response;
};

/**
 * Validating email address
 */
$validateEmail = function ($request, $response, $next) {
	$resp = array();
	$route = $request->getAttribute('route');
	$error = false;
    $validators = $route->getArgument('validators');
	$error_fields = "";
    $request_params = array();
    $request_params = $_REQUEST;
	
	if(in_array('email',$validators))
	{
		 foreach ($validators as $field) {
			 if($field=='email')
			 {
                 $email = $request_params[$field];
                 //print_r(filter_var($email, FILTER_VALIDATE_EMAIL));die();
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {				
				$error = true;
				}
			 } 
		}	
	}
		if ($error) {
        $resp=array();
        $resp["error"] = true;
		$resp["message"] = 'Email address is not valid';
        $response= $response->withJson($resp, 400);

    }else{    $response = $next($request, $response);}
	
	 return $response;
};




$app->post('/registration', App\Controller\UserController::class . ':registration')->setArguments(['validators' => ['firstname','email','mobile','status','login_type']])->add($authenticate);
$app->post('/login', App\Controller\UserController::class . ':login')->setArguments(['validators' => ['mobile','login_type']])->add($authenticate);
$app->post('/sendOtp', App\Controller\UserController::class . ':sendOtp')->setArguments(['validators' => ['mobile']])->add($authenticate);
$app->post('/editProfile', App\Controller\UserController::class . ':edit')->setArguments(['validators' => ['user_id']])->add($authenticate)->add($authToken);
$app->post('/viewProfile', App\Controller\UserController::class . ':view')->setArguments(['validators' => ['user_id']])->add($authenticate)->add($authToken);
$app->post('/logout', App\Controller\UserController::class . ':logout')->setArguments(['validators' => ['user_id']])->add($authenticate);
$app->post('/dropdown', App\Controller\UserController::class. ':dropdown')->setArguments(['validators'=> ['user_id','type']])->add($authenticate)->add($authToken);

$app->post('/home', App\Controller\HomeController::class . ':home')->setArguments(['validators' => ['user_id']])->add($authenticate)->add($authToken);
$app->post('/feedback', App\Controller\HomeController::class . ':contactUs')->setArguments(['validators' => ['user_id','email','message']])->add($authenticate)->add($authToken);

$app->post('/addCard', App\Controller\CardController::class . ':addCard')->setArguments(['validators' => ['user_id','bank_name','card_type','card_holder_name','card_number','expire_date']])->add($authenticate)->add($authToken);
$app->post('/viewAllCards', App\Controller\CardController::class . ':view')->setArguments(['validators' => ['user_id']])->add($authenticate)->add($authToken);
$app->post('/addPrimaryCard', App\Controller\CardController::class . ':addPrimaryCard')->setArguments(['validators'=> ['card_id','user_id']])->add($authenticate)->add($authToken);

$app->post('/addPropertInfo', App\Controller\PropertyController::class . ':addPropertInfo')->setArguments(['validators'=> ['user_id','villa_or_aptNo','building_name','no_ofBedrooms','area','street_no','address','lat','lng']])->add($authenticate)->add($authToken);
$app->post('/editPropertyInfo', App\Controller\PropertyController::class . ':editPropertyInfo')->setArguments(['validators'=> ['user_id','property_id','villa_or_aptNo','building_name','no_ofBedrooms','area','street_no','address','lat','lng']])->add($authenticate)->add($authToken);

$app->post('/viewAmc', App\Controller\AmcController::class. ':view')->setArguments(['validators'=> ['amc_id','user_id']])->add($authenticate)->add($authToken);
$app->post('/pendingAmc', App\Controller\AmcController::class . ':pendingAmc')->setArguments(['validators'=>['user_id']])->add($authenticate)->add($authToken);
$app->post('/addAmc', App\Controller\AmcController::class . ':addAmc')->setArguments(['validators'=>['user_id']])->add($authenticate)->add($authToken);

$app->post('/addJob', App\Controller\JobController::class. ':addJob')->setArguments(['validators'=> ['user_id','address_id','service_id','job_date']])->add($authenticate)->add($authToken);
$app->post('/addGuestJob', App\Controller\JobController::class. ':add')->setArguments(['validators'=> ['user_id','address_id','service_id','job_date']])->add($authenticate)->add($authToken);
$app->post('/viewAllJobs', App\Controller\JobController::class. ':viewAllJobs')->setArguments(['validators'=> ['user_id']])->add($authenticate)->add($authToken);
$app->post('/viewJobDetail', App\Controller\JobController::class . ':view')->setArguments(['validators'=>['user_id','job_id']])->add($authenticate)->add($authToken);
$app->post('/selectJob', App\Controller\JobController::class. ':selectJob')->setArguments(['validators'=> ['user_id']])->add($authenticate)->add($authToken);
$app->post('/viewJob', App\Controller\JobController::class . ':viewJob')->setArguments(['validators'=>['user_id','job_id']])->add($authenticate)->add($authToken);
$app->post('/viewJobDates', App\Controller\JobController::class . ':viewJobDates')->setArguments(['validators'=>['user_id']])->add($authenticate)->add($authToken);


$app->post('/viewPackage', App\Controller\PackageController::class. ':view')->setArguments(['validators'=>['user_id']])->add($authenticate)->add($authToken);
