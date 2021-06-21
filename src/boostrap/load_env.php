<?php

if (file_exists(TEST_BASE_PATH . DIRECTORY_SEPARATOR . '.env')) {
    $dotenv = Dotenv\Dotenv::createImmutable(TEST_BASE_PATH);
    $dotenv->load();
}

function envVar($key)
{
    if (isset($_ENV[$key])) {
        return $_ENV[$key];
    }
    return getenv($key);
}
