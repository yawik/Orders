<?php

/**
 * YAWIK
 *
 * @filesource
 * @license MIT
 * @copyright  2013 - 2017 Cross Solution <http://cross-solution.de>
 */

namespace Orders\Behat;

use Behat\Behat\Context\Context;
use Yawik\Behat\CommonContextTrait;

/**
 * Class OrdersContext
 * @package Orders\Behat
 * @since 0.32
 */
class OrdersContext implements Context
{
    use CommonContextTrait;

    /**
     * @Given I go to orders setting page
     */
    public function iGoToOrdersSettingPage()
    {
        $url = $this->buildUrl('lang/settings', ['module' => 'Orders']);
        $this->visit($url);
    }
}
