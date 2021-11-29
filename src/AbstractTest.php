<?php

namespace Paytic\Payments\Tests;

use Omnipay\Common\Http\Client;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Request as HttpRequest;

/**
 * Class AbstractTest
 */
abstract class AbstractTest extends TestCase
{
    protected $object;

    /**
     * @var \Guzzle\Http\Client
     */
    protected $client;

    /**
     * @param $path
     * @return HttpRequest
     */
    protected function generateRequestFromFixtures($path)
    {
        $httpRequest = HttpRequest::createFromGlobals();
        $parameters = require $path;
        
        if (isset($parameters['GET'])) {
            $httpRequest->query->replace($parameters['GET']);
        }
        if (isset($parameters['query'])) {
            $httpRequest->query->replace($parameters['query']);
        }
        if (isset($parameters['POST'])) {
            $httpRequest->request->replace($parameters['POST']);
        }
        if (isset($parameters['request'])) {
            $httpRequest->request->replace($parameters['request']);
        }

        return $httpRequest;
    }

    protected function setUp() : void
    {
        parent::setUp();
        $this->client = new Client();
//        $this->client->setConfig(
//            [
//                'curl.CURLOPT_SSL_VERIFYHOST' => false,
//                'curl.CURLOPT_SSL_VERIFYPEER' => false
//            ]
//        );
//        $this->client->setSslVerification(false, false);
    }
}
