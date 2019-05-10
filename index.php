<?php
//todo: add autoload
require 'vendor/autoload.php';
ini_set('display_errors',1);
$app = new AsceticCMS\App();

echo "<pre>";
echo $app->sayHello();
echo "\n";
echo $app->showInfo();
echo "</pre>";

#echo phpinfo();

?>