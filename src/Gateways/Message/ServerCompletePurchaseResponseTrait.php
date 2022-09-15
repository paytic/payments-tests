<?php

namespace Paytic\Payments\Tests\Gateways\Message;

use Paytic\Payments\Gateways\Providers\Euplatesc\Message\ServerCompletePurchaseResponse;

/**
 * Trait ServerCompletePurchaseResponseTrait
 * @package Paytic\Payments\Tests\Gateways\Message
 */
trait ServerCompletePurchaseResponseTrait
{
    public function testHasSendMethod()
    {
        $response = $this->getNewResponse();

        static::assertTrue(method_exists($response, 'send'));
    }

    abstract protected function getNewResponse();
}
