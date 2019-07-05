<?php
    namespace App\Controller;
   
    use Slim\Http\Request;
    use Slim\Http\Response;

    use App\Model\User;

    class Home {
        
        public function home(Request $request, Response $response, array $args)  {
            $data = User::all();
            echo "<pre>"; print_r($data); exit ;
            return $response->withJson('you are here');
        }
    }
    