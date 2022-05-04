<?php

namespace Paytic\Payments\Tests\Codeception\Acceptance\Frontend\Gateways;

use ByTIC\Payments\Utility\PaymentsModels;
use Codeception\Actor;
use Paytic\Payments\Tests\Fixtures\Records\Purchases\PurchasableRecord;

trait AbstractCestTrait
{
    /**
     * @var PurchasableRecord
     */
    protected $purchasableRecord;

    /**
     * @param Actor $actor
     */
    public function _before(Actor $actor)
    {
        $this->preparePurchasableRecord($actor);
    }

    /**
     * @param Actor $I
     */
    protected function preparePurchasableRecord($I)
    {
        $this->setPurchasableStatus('pending', $I);
    }

    /**
     * @param string $status
     * @param Actor $actor
     */
    protected function setPurchasableStatus($status, $actor)
    {
        $idDonation = $this->getPurchasableId();
        $table = $this->getPurchasableTable();
        $actor->runSqlQuery('UPDATE `' . $table . '` SET `status` = "' . $status . '" WHERE `id` = ' . $idDonation);
    }

    /**
     * @param Actor $actor
     * @param null $status
     */
    protected function seeModelStatusUpdate($actor, $status = null)
    {
        $idDonation = $this->getPurchasableId();
        $table = $this->getPurchasableTable();
        $query = 'SELECT `status` FROM `' . $table . '` WHERE `id` = ' . $idDonation;

        $row = $actor->fetchOneFromQuery($query);
        $actor->assertSame($status, $row['status'], "Status not set to [$status], actual status [{$row['status']}]");
    }

    protected function getPurchasableTable(): string
    {
        return PaymentsModels::purchases()->getTable();
    }

    /**
     * @return int
     */
    abstract protected function getPurchasableId();
}