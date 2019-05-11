<?php
//todo: add autoload
require 'vendor/autoload.php';
ini_set('display_errors',1);
$app = new AsceticCMS\Lib\App();

echo "<pre>";
echo $app->sayHello();
echo "\n";
echo $app->showInfo();
echo "\n";
echo "</pre>";

$si = new AsceticCMS\Components\ServerInfo\ServerInfo();

echo $si->show();
$app->get('/tst/1',function(){
    echo "HI! Dunduk! How are you?";
});
$app->run();
#echo phpinfo();

?>