<?php

declare(strict_types=1);

namespace Paytic\Payments\Tests\Codeception\Support\Page\Acceptance\Frontend\Purchases;

trait ConfirmPageTrait
{
    // include url of current page
    public static ?string $url = '/confirm';

    public function checkPendingElements()
    {
        $this->getTester()->seeElement('#form-confirm button.btn');
    }

    public function checkConfirmedElements()
    {
        $this->getTester()->see('Redirecting');
        $this->getTester()->seeElement('#form-confirm button.btn');
    }

    /**
     * @param $url
     */
    public function checkConfirmBtnLink($url)
    {
        $formAction = $this->getTester()->grabAttributeFrom('#form-confirm', 'action');
        $this->getTester()->assertSame($url, $formAction);
    }
}
