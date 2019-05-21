<?php
namespace AsceticCMS\Components\ServerInfo;
use \DateTime;
Class ServerInfo{
    public function show(){
        $time = new DateTime();
        //$time->setTimestamp($_SERVER['REQUEST_TIME']);
        $strTime = $time->format('Y-m-d H:i:s');                    

        $result = "<div class=\"server-info\" style=\"position: relative; margin: 10px; padding: 5px; color: blue; background-color: lightgray; font-size: large; font-weitht: bolder;\">";
        $result .= "<table style=\"border: 1px solid black; border-collapse: collapse; border-spacing: 5px; font-family: symbol; \">";

        $result .= "<thead style = \"background-color: lightgreen;\">";
        $result .= "<th style = \"border: 1px solid black;\">HOST</th>";
        $result .= "<th style = \"border: 1px solid black;\">USER AGENT</th>"; 
        $result .= "<th style = \"border: 1px solid black;\">PORT</th>";
        $result .= "<th style = \"border: 1px solid black;\">REMOTE ADDR</th>";       
        $result .= "<th style = \"border: 1px solid black;\">REDIRECT URL</th>";       
        $result .= "<th style = \"border: 1px solid black;\">PROTOCOL</th>";       
        $result .= "<th style = \"border: 1px solid black;\">METHOD</th>";       
        $result .= "<th style = \"border: 1px solid black;\">QUERY STRING</th>";       
        $result .= "<th style = \"border: 1px solid black;\">REQUEST URI</th>";       
        $result .= "<th style = \"border: 1px solid black;\">SCRIPT NAME</th>";       
        $result .= "<th style = \"border: 1px solid black;\">TIME</th>";       
        $result .= "</thead>";
        $result .= "<tbody style = \"font-size: small; border: 1px solid black; background-color: yellow;\">";
        $result .= "<tr>";
        $result .= "<td style = \"border: 1px solid black;\">".$_SERVER['HTTP_HOST']."</td>";
        $result .= "<td style = \"border: 1px solid black;\">".$_SERVER['HTTP_USER_AGENT']."</td>";
        $result .= "<td style = \"border: 1px solid black;\">".$_SERVER['SERVER_PORT']."</td>";            
        $result .= "<td style = \"border: 1px solid black;\">".$_SERVER['REMOTE_ADDR']."</td>";
        //FIXME
        if(!empty($_SERVER['REDIRECT_URL'])){
            $result .= "<td style = \"border: 1px solid black;\">".$_SERVER['REDIRECT_URL']."</td>";
        }  else {
            $result .= "<td style = \"border: 1px solid black;\"></td>";
        }      
        $result .= "<td style = \"border: 1px solid black;\">".$_SERVER['SERVER_PROTOCOL']."</td>";
        $result .= "<td style = \"border: 1px solid black;\">".$_SERVER['REQUEST_METHOD']."</td>";
        $result .= "<td style = \"border: 1px solid black;\">".$_SERVER['QUERY_STRING']."</td>";
        $result .= "<td style = \"border: 1px solid black;\">".$_SERVER['REQUEST_URI']."</td>";
        $result .= "<td style = \"border: 1px solid black;\">".$_SERVER['SCRIPT_NAME']."</td>";
        $result .= "<td style = \"border: 1px solid black;\">".$strTime."</td>";
        $result .= "</tr>";

        $result .= "</tbody";
        $result .= "</div>";
        return $result;
    }
}