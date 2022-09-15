<?php

use Nip\Container\Container;
use Nip\Database\DatabaseManager;

$container = new Container();
Container::setInstance($container);
$container->set('inflector', \Nip\Inflector\Inflector::instance());

$translator = Mockery::mock(\Nip\I18n\Translator::class)->shouldAllowMockingProtectedMethods()->makePartial();
$translator->shouldReceive('persistLocale');

$container->set('translator', $translator);
$container->set('request', new \Nip\Http\Request());

$manager = new DatabaseManager();
$connection = new \Nip\Database\Connections\Connection(false);

$adapter = \Mockery::mock(\Nip\Database\Adapters\MySQLi::class)->makePartial();
$adapter->shouldReceive('cleanData')->andReturnArg(0);

$connection->setAdapter($adapter);
$manager->setConnection($connection, 'main');

Container::getInstance()->set('db', $manager);
Container::getInstance()->set('db.connection', $connection);

$data = [
    'payments' => $configData
];
$container->set('config', new \Nip\Config\Config($data));
