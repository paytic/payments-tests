<?php

define('PROJECT_BASE_PATH', dirname(dirname(dirname(dirname(dirname(__DIR__))))));
define('TEST_BASE_PATH', PROJECT_BASE_PATH.DIRECTORY_SEPARATOR.'tests');
define('TEST_FIXTURE_PATH', TEST_BASE_PATH.DIRECTORY_SEPARATOR.'fixtures');

require PROJECT_BASE_PATH.'/vendor/autoload.php';

$configData = $configData ?? [];

require __DIR__.DIRECTORY_SEPARATOR.'load_env.php';
require __DIR__.DIRECTORY_SEPARATOR.'load_container.php';

