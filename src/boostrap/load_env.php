<?php

use Symfony\Component\Dotenv\Dotenv;

if (file_exists(TEST_BASE_PATH . DIRECTORY_SEPARATOR . '.env')) {

    $dotenv = new Dotenv();
    $dotenv->bootEnv(TEST_BASE_PATH.'/.env');
}

function envVar($key)
{
    if (isset($_ENV[$key])) {
        return $_ENV[$key];
    }
    return getenv($key);
}
