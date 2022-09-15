<?php

namespace Paytic\Payments\Tests\Fixtures\Records\PaymentMethods;

use Paytic\Payments\Models\Methods\Traits\RecordsTrait;
use Nip\Records\RecordManager;
use Nip\Utility\Traits\SingletonTrait;

/**
 * Class PaymentMethods
 * @package Paytic\Payments\Tests\Fixtures\Records\PaymentMethods
 */
class PaymentMethods extends RecordManager
{
    use SingletonTrait;
    use RecordsTrait;
}
