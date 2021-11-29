<?php

namespace Paytic\Payments\Tests\Fixtures\Records\Purchases;

use Nip\Records\AbstractModels\RecordManager;

/**
 * Class PurchasableRecordManager
 * @package Paytic\Payments\Tests\Fixtures\Records\Purchases
 */
class PurchasableRecordManager extends RecordManager
{
    protected $primaryKey = 'id';

    public function getPaymentsUrlPK()
    {
        return 'id';
    }

    protected function generateTableStructure()
    {
        return [
            'fields' => []
        ];
    }
}
