<?php
    namespace App\Controller;
   
    use Slim\Http\Request;
    use Slim\Http\Response;

    use App\Model\Card;

    class CardController {
        
        public function addCard(Request $request, Response $response, array $args){
            $input = $request->getParsedBody();
            $isCheck = Card::where('card_number','=',$input['card_number'])->where('user_id','=',$input['user_id'])->first();
            
            if($isCheck == ''){
                $isCardPrimary = Card::where('user_id','=',$input['user_id'])->where('isPrimary','=',1)->first();
            
                // create new Card and save it
            $card = new Card;
            $card->user_id = $input['user_id'];
            $card->bank_name = $input['bank_name'];
            $card->card_type = $input['card_type'];
            $card->card_holder_name = $input['card_holder_name'];
            $card->card_number = $input['card_number'];
         //   $card->expire_date = date('Y-m-d H:i:s', strtotime($input['expire_date']));
            $card->expire_date = $input['expire_date'];
            $card->cvv = $input['cvv'];
            if($isCardPrimary  == ''){
                $card->isPrimary = 1;
            }else{
                $card->isPrimary = 0;
            }
            $card->save();
            $inser_id = $card->id;
            }
            
            if ($card) {
                $resp["message"] = "Your Card Details successfully Added";
                $resp['code'] = '200';
                $resp['status'] = '1';
                $resp['card_id'] =$inser_id;
            
            } else if($isCheck){
                $resp["message"] = "Oops! This Card number is already Exists! Please Try with Another Card Number!!";
                $resp['code'] = '400';
                $resp['status'] = '4';
                $resp['card_id'] = '';
            } else{
                $resp["message"] = "Oops! There is something went wrong! PLease Try Again";
                $resp['code'] = '400';
                $resp['status'] = '3';
                $resp['card_id'] = '';
            }
             $response = $response->withJson($resp, 200);
                  
            return $response;

        }

        public function view(Request $request, Response $response, array $args){
            $input = $request->getParsedBody();
            $user_id = $input['user_id'];

                $card = Card::where('user_id','=',$user_id)->get();

            if($card){
                $resp["message"] = "All Card Listed!";
                $resp['code'] = '200';
                $resp['status'] = '1';
                /*$resp['body'] = array(
                    'userData'=> $user,
                    'cardData'=> $card
                );*/
                $resp['body']= $card;
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

        public function addPrimaryCard(Request $request, Response $response, array $args){
            $input = $request->getParsedBody();
            $card = Card::where('user_id','=',$input['user_id'])->where('isPrimary','=',1)->first();
            if($card){
                $data = array(
                    'isPrimary'=>0
                );
                $isCardP = Card::where('id','=',$card->id)->where('user_id','=',$card->user_id)->update($data);
                if($isCardP){
                    $data = array(
                        'isPrimary'=>$input['isPrimary']
                    );
                    $isCardPrimary = Card::where('id','=',$input['card_id'])->where('user_id','=',$input['user_id'])->update($data);   
                }
            }else{
                $data = array(
                    'isPrimary'=>$input['isPrimary']
                );
                $isCardPrimary = Card::where('id','=',$input['card_id'])->where('user_id','=',$input['user_id'])->update($data);
                
            }
         
            if ($isCardPrimary) {
                $resp["message"] = "Your Card Updated successfully As Primary Card!";
                $resp['code'] = '200';
                $resp['status'] = '1';
            
            } else{
                $resp["message"] = "This card is already a Primary Card!";
                $resp['code'] = '400';
                $resp['status'] = '4';
                $resp['request'] = $input;
            }
             $response = $response->withJson($resp, 200);
                  
            return $response;

        }
    }
    