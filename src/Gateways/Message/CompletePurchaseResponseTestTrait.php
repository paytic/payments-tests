<?php

namespace Paytic\Payments\Tests\Gateways\Message;

/**
 * Trait CompletePurchaseResponseTestTrait
 * @package Paytic\Payments\Tests\Gateways\Message
 */
trait CompletePurchaseResponseTestTrait
{
    public function testHasConfirmHtmlTraitTrait()
    {
        $response = $this->getNewResponse();

        static::assertTrue(method_exists($response, 'getViewFile'));
        static::assertTrue(method_exists($response, 'getView'));
    }

    abstract protected function getNewResponse();
}
