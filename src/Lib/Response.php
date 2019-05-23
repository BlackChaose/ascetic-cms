<?php
namespace AsceticCMS\Lib;

class Response{
    private $callback;
    private $body;    
    public function __construct($code, $bdTxt)
    {
        if(!is_string($code) || !is_string($bdTxt)) throw new \Exception("not valid params in Response's __construct");
        switch ($code){
        
            case '100 Continue!': 
            $this -> callback = function(){
                http_response_code(100);
            };
            break;

            case '102 Processing!': 
            $this -> callback = function(){
                http_response_code(102);
            };
            break;
            
            case '200 Ok!': 
                $this -> callback = function(){
                    http_response_code(200);
                };
                break;

            case '201 Ok!': 
                $this -> callback = function(){
                    http_response_code(201);
                };
                break;
            
            case '301 Redirect!': 
                $this -> callback = function(){
                    http_response_code(301);
                };
                break;
                
            case '302 Found!': 
                $this -> callback = function(){
                    http_response_code(302);
                };
                break;

            case '400 Bad Request!': 
                $this -> callback = function(){
                    http_response_code(400);
                };
                break;                
            
            case '401 Unauthorized': 
                $this -> callback = function(){
                    http_response_code(401);
                };
                break;

            case '403 Forbidden!': 
                $this -> callback = function(){
                    http_response_code(403);
                };
                break;        

            case '404 Not Found!': 
                $this -> callback = function(){
                    http_response_code(404);
                };
                break;    
            
            case '405 Not Acceptable': 
                $this -> callback = function(){
                    http_response_code(405);
                };
                break;
            default: 
                $this -> callback = function(){
                    http_response_code(500);
                };
                break;
        }
        $this->body = $bdTxt;        
    }
    public function send(){
        call_user_func($this->callback);
        echo $this->body;
    }
}