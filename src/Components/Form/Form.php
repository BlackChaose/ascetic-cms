<?php
namespace AsceticCMS\Components\Form;

class Form{
    private $form;
    //FIXME - refactor to universal form constructor!
    public function __construct(array $params){
        if(is_array($params)){
            $methodName = '';
            $method = '';
            switch (strtoupper($params['method'])){
                case 'GET': $method = "GET"; break;
                case 'POST': $method = 'POST'; break;
                case 'PUT': $method = 'POST'; $methodName = 'PUT'; break;
                case 'PATCH': $method = 'POST'; $methodName = 'PATCH'; break;
                case 'DELETE': $method = 'DELETE'; $methodName = 'DELETE'; break;
            }

            $this->form .= "<form name=\"MyForm\" id=\"MyForm\" method=\"".$method."\" action=\"".$params['action']."\" >";
            array_walk($params,function($val,$key){
                if($key !== 'method' && $key !== 'action' && $key !== 'submit'){
                $this->form .= "<".$val." name=\"".$key."\" />"."<br>";
                }else if($key === 'submit'){
                    $this->form .= "<input type=\"submit\" value=\"Send\" />"."<br>";
                }
            });
            if($methodName !== ''){
                $this->form .= "<input type=\"hidden\" name=\"_method\" value=\"".$methodName."\" />";
            }
            $this->form .= "</form>";
        }
    }
    public function show(){
        return $this->form;
    }
}