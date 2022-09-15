<?php

namespace Paytic\Payments\Tests\Gateways\Traits;

use Paytic\Payments\Gateways\Manager;
use Paytic\Payments\Tests\AbstractTest;
use Paytic\Payments\Tests\Fixtures\Records\Purchases\PurchasableRecord;
use Paytic\Payments\Tests\Fixtures\Records\Purchases\PurchasableRecordManager;

/**
 * Class DetectFromHttpRequestTraitTest
 * @package Paytic\Payments\Tests\Gateways\Traits
 */
class DetectFromHttpRequestTraitTest extends AbstractTest
{

    /**
     * @dataProvider dataGetRequestFromHttpRequest
     * @param $path
     * @param $requestClass
     * @throws \Exception
     */
    public function testGetRequestFromHttpRequest($path, $requestClass)
    {
        $httpRequest = $this->generateRequestFromFixtures(
            is_file($path) ? $path : TEST_FIXTURE_PATH . '/requests/' . $path
        );

        $model = \Mockery::mock(PurchasableRecord::class)->makePartial();
        $model->shouldReceive('getPaymentGateway')->andReturn(null);

        $modelManager = \Mockery::mock(PurchasableRecordManager::class)->makePartial();
        $modelManager->shouldReceive('findOne')->andReturn($model);

        $request = Manager::getRequestFromHttpRequest($modelManager, null, $httpRequest);
        self::assertInstanceOf($requestClass, $request);
    }

    /**
     * @return array
     */
    public function dataGetRequestFromHttpRequest()
    {
        return [
            [
                PROJECT_BASE_PATH.'/vendor/paytic/omnipay-librapay/tests/fixtures/requests/completePurchaseParams.php',
                \Paytic\Payments\Librapay\Message\CompletePurchaseRequest::class,
                \Paytic\Payments\Gateways\Providers\Librapay\Message\CompletePurchaseRequest::class,
            ],
            [
                PROJECT_BASE_PATH.'/vendor/paytic/omnipay-librapay/tests/fixtures/requests/completePurchaseParams2.php',
                \Paytic\Payments\Librapay\Message\CompletePurchaseRequest::class,
            ],
            [
                '/mobilpay/completePurchase/basicParams.php',
                \Paytic\Payments\Gateways\Providers\Mobilpay\Message\CompletePurchaseRequest::class,
            ],
            [
                '/romcard/completePurchaseParams.php',
                \Paytic\Payments\Gateways\Providers\Romcard\Message\CompletePurchaseRequest::class,
            ],
            [
                '/paylike/completePurchase/basicParams.php',
                \Paytic\Payments\Gateways\Providers\Paylike\Message\CompletePurchaseRequest::class,
            ],
        ];
    }
}
