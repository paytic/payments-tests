<?php

namespace Paytic\Payments\Tests\Gateways\Traits;

use ByTIC\Payments\Gateways\Providers\Mobilpay\Gateway as MobilpayGateway;
use ByTIC\Payments\Gateways\Providers\Mobilpay\Message\CompletePurchaseRequest as MobilpayCompletePurchaseRequest;
use ByTIC\Payments\Gateways\Providers\Paylike\Gateway as PaylikeGateway;
use ByTIC\Omnipay\Paylike\Message\CompletePurchaseRequest as PaylikeCompletePurchaseRequest;
use Paytic\Payments\Tests\AbstractTest;

/**
 * Class OverwriteCompletePurchaseTraitTest
 * @package Paytic\Payments\Tests\Gateways\Traits
 */
class OverwriteCompletePurchaseTraitTest extends AbstractTest
{
    public function test_completePurchase_internal_check()
    {
        $mobilpay = new MobilpayGateway();
        $request = $mobilpay->completePurchase();
        self::assertInstanceOf(MobilpayCompletePurchaseRequest::class, $request);

        $paylike = new PaylikeGateway();
        $request = $paylike->completePurchase();
        self::assertInstanceOf(PaylikeCompletePurchaseRequest::class, $request);
    }
}
