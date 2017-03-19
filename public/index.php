<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
//print phpinfo(); die;
use AsceticCMS\Lib\Render;
use AsceticCMS\Lib\Request;
use AsceticCMS\Lib\Response;
use AsceticCMS\Lib\SimpleRecord;

/**
 * @todo: add ExceptionHandler
 */

require '../vendor/autoload.php';
$app = new AsceticCMS\Lib\App();
$si = new AsceticCMS\Components\ServerInfo\ServerInfo();

/**
 * main page
 * @todo        normal main page
 */
$app->get('', function () use ($si) {
	$resp = new Response('200 Ok!', $si->show());
	$resp->send();
});

/**
 * api's routes
 * @todo         all standard api
 */
$app->get('/api/table/:name/describe', function () {

	$param = Request::cmpPlaceholder('/api/table/:name/describe', $_SERVER['REQUEST_URI']);
	$tableName = $param['name'];

	$result = json_encode(SimpleRecord::describeTable($tableName), JSON_UNESCAPED_UNICODE);
	$resp = new Response('200 JSON', $result);
	$resp->send();
});

$app->get('/api/table/:name', function () {
	$param = array();
	/*for debug*//**FIXME: delete after debuging! */
	sleep(3);
	$param = Request::cmpPlaceholder('/api/table/:name', $_SERVER['REQUEST_URI']);

	$tableName = $param['name'];

	$result = json_encode(SimpleRecord::readTable($tableName, 10), JSON_UNESCAPED_UNICODE);
	$resp = new Response('200 JSON', $result);
	$resp->send();
});

$app->get('/api/table/:name/:param/:num', function () {
	$param = array();
	/*for debug*//**FIXME: delete after debuging! */
	sleep(3);
	$param = Request::cmpPlaceholder('/api/table/:name/:param/:num', $_SERVER['REQUEST_URI']);

	$tableName = $param['name'];
	$paramName = $param['param'];
	$num = ($param['num']) ? $param['num'] : 10;

	$result = json_encode(SimpleRecord::readTableByParam($tableName, $paramName, $num), JSON_UNESCAPED_UNICODE);
	$resp = new Response('200 JSON', $result);
	$resp->send();
});

$app->get('/api/table/:name/:id', function () {
	$param = array();
	/*for debug*//**FIXME: delete after debuging! */
	sleep(3);
	$param = Request::cmpPlaceholder('/api/table/:name/:id', $_SERVER['REQUEST_URI']);

	$tableName = $param['name'];
	$paramId = $param['id'];

	$result = json_encode(SimpleRecord::readTableById($tableName, $paramId), JSON_UNESCAPED_UNICODE);
	$resp = new Response('200 JSON', $result);
	$resp->send();
});

/**
 * calc zen of python. good word! (ruRU)
 */
$app->get('/zen', function () use ($si) {
	$text = array(
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
			'🎖Пространства имён — отличная вещь! Давайте будем делать их больше!',
		),
	);
	$resp = new Response('200 Ok!', json_encode($text, JSON_UNESCAPED_UNICODE));
	$resp->send();
});

/**
 * phpinfo()
 */
$app->get('/phpinfo', function () {
	$resp = new Response('200 Ok!', phpinfo());
	$resp->send();
});

/**
 * test page
 * @todo        fix: delete
 */
$app->get('/tst/1', function () {
	$resp = new Response('200 Ok!', "HI! How are you?");
	$resp->send();
});

$app->get('/tst/put', function () {
	$tpl = new AsceticCMS\Components\Form\Form(['method' => 'PUT', 'action' => '/tst/user', 'name' => 'input', 'email' => 'input', 'submit' => 'send']);
	$resp = new Response('200 Ok!', $tpl->show());
	$resp->send();
});

$app->get('/tst/db', function () {
	$dt = new SimpleRecord();
	$resp = new Response('200 Ok!', implode(";", $dt->readTable('users')));
	//$resp = new Response('200 Ok!', phpinfo());
	$resp->send();
});

$app->get('/tst/tpl', function () {
	$ren = new Render();
	$ren->run('./src/MVC/Views/View.tpl');
	$s = implode('<br>', $ren->show());
	$resp = new Response('200 Ok!', $s);
	$resp->send();
});

/**
 * test put forms
 * @todo        create standard form and delete test
 */
$app->put('/tst/user', function () {
	$resp = new Response('201 Ok!', "<strong>PUT response</strong><br><pre>" . $_POST['name'] . "<br>" . $_POST['email'] . "</pre>");
	$resp->send();
});

$app->get('/form', function () {
	$conf = '{
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
	//FIXME!
	$resp = new Response('200 Ok!', Render::renderView($conf, 'MailForm.phtml'));
	$resp->send();
});

/**
 * run our app! Must have!
 */
$app->run();
#echo phpinfo();
