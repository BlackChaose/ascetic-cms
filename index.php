<?php
use AsceticCMS\Lib\Response;
use AsceticCMS\Lib\SimpleRecord;
use AsceticCMS\Lib\Render;

/**@todo: add autoload */
/**@todo: add ExceptionHandler */

require 'vendor/autoload.php';
ini_set('display_errors',1);
$app = new AsceticCMS\Lib\App();
$si = new AsceticCMS\Components\ServerInfo\ServerInfo();
$app->get('',function() use($si) {
    $resp = new Response('200 Ok!', 123);
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

$app->get('/tst/db', function(){
    $dt = new SimpleRecord();    
    $resp = new Response('200 Ok!', implode(";", $dt->readTable('users')));
    //$resp = new Response('200 Ok!', phpinfo());
    $resp -> send();
});

$app->get('/tst/tpl', function(){
    $ren = new Render();
    $ren->run('./src/MVC/Views/View.tpl');
    $s = implode('<br>',$ren->show());
    $resp = new Response('200 Ok!', $s);    
    $resp -> send();
});

$app->put('/tst/user' , function(){
    $resp = new Response('201 Ok!', "<strong>PUT response</strong><br><pre>".$_POST['name']."<br>".$_POST['email']."</pre>");
    $resp -> send();
});
$app->run();
#echo phpinfo();

?>
