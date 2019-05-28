<?php
use AsceticCMS\Lib\Response;
use AsceticCMS\Lib\SimpleRecord;
use AsceticCMS\Lib\Render;
use AsceticCMS\Components\AsceticForm\AsceticForm;

/**@todo: add autoload */
/**@todo: add ExceptionHandler */

require 'vendor/autoload.php';
ini_set('display_errors',1);
$app = new AsceticCMS\Lib\App();
$si = new AsceticCMS\Components\ServerInfo\ServerInfo();
$app->get('',function() use($si) {
    $resp = new Response('200 Ok!', $si->show());
    $resp -> send();
});

$app->get('/zen',function() use($si) {
    $text=array(
       "zen" => array(
        '🎖Красивое лучше, чем уродливое.',
        '🎖Явное лучше, чем неявное.',
        '🎖Простое лучше, чем сложное.',
        '🎖Сложное лучше, чем запутанное.',
        '🎖Плоское лучше, чем вложенное.',
        '🎖Разреженное лучше, чем плотное.',
        '🎖Читаемость имеет значение.',
        '🎖Особые случаи не настолько особые, чтобы нарушать правила.',
        '🎖При этом практичность важнее безупречности.',
        '🎖Ошибки никогда не должны замалчиваться.',
        '🎖Если не замалчиваются явно.',
        '🎖Встретив двусмысленность, отбрось искушение угадать.',
        '🎖Должен существовать один — и, желательно, только один — очевидный способ сделать это.',
        '🎖Хотя он поначалу может быть и не очевиден, если вы не голландец[5].',
        '🎖Сейчас лучше, чем никогда.',
        '🎖Хотя никогда зачастую лучше, чем прямо сейчас.',
        '🎖Если реализацию сложно объяснить — идея плоха.',
        '🎖Если реализацию легко объяснить — идея, возможно, хороша.',
        '🎖Пространства имён — отличная вещь! Давайте будем делать их больше!'
        )
    );
    $resp = new Response('200 Ok!', json_encode($text,JSON_UNESCAPED_UNICODE));
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

$app->get('/form', function(){
    $conf='{
        "title": "User Card",
        "form": {
            "name": "testForm",
            "method": "POST",
            "action": null
        },
        "labels": ["first name", "last name", "town", "country", "INN", "phone", "email"],
        "inputs": ["name", "surname", "Moscow", "Russia", "none", "+79259259259", "admin@mail.ru"],
        "submit": "Submit Query"
    }';
  
    $resp = new Response('200 Ok!', Render::renderView($conf,'MailForm.php'));
    $resp -> send();
});

$app->run();
#echo phpinfo();

?>
