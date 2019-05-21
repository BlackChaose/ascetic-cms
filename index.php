<?php
use AsceticCMS\Lib\Response;

//todo: add autoload
require 'vendor/autoload.php';
ini_set('display_errors',1);
$app = new AsceticCMS\Lib\App();
$si = new AsceticCMS\Components\ServerInfo\ServerInfo();
$app->get('',function() use($si) {
    $resp = new Response('200 Ok!', $si->show());
    $resp -> send();
});
$app->get('/tst/1', function(){
    $resp = new Response('200 Ok!', "HI! Dunduk! How are you?");
    $resp -> send();
});
$app->get('/tst/put', function(){
    $tpl = new AsceticCMS\Components\Form\Form(['method'=>'PUT', 'action'=>'/tst/user', 'name'=>'input', 'email'=>'input', 'submit' => 'send']);
    $resp = new Response('200 Ok!', $tpl->show());
    $resp -> send();
});
$app->put('/tst/user' , function(){
    $resp = new Response('201 Ok!', "<strong>PUT response</strong><br><pre>".$_POST['name']."<br>".$_POST['email']."</pre>");
    $resp -> send();
});
$app->run();
#echo phpinfo();

?>