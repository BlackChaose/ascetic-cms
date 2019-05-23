<?php
namespace AsceticCMS\Components\AsceticForm;

class AsceticForm
{
    private $params = array();
    private $result = '';

    public function __construct(array $param)
    {

        if (!is_array($param)) {
            throw new Exception("invalid input param in AsceticForm constructor!");
        }
        $methodName = '';
        $method = '';
        switch (strtoupper($param['method'])){
            case 'GET': $method = "GET"; break;
            case 'POST': $method = 'POST'; break;
            case 'PUT': $method = 'POST'; $methodName = 'PUT'; break;
            case 'PATCH': $method = 'POST'; $methodName = 'PATCH'; break;
            case 'DELETE': $method = 'DELETE'; $methodName = 'DELETE'; break;
        }
        
        $this->params = $param;
        $this->params['method'] = $method;
        $this->params['methodName'] = $methodName;

        //fixme: generate form from params!
        //fixme: 
    }


}
