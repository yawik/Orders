<?php
/**
 * YAWIK
 *
 * @filesource
 * @license MIT
 * @copyright  2013 - 2017 Cross Solution <http://cross-solution.de>
 */

namespace Orders\Factory\Form;

use Core\Factory\Form\AbstractCustomizableFieldsetFactory;
use Orders\Form\InvoiceAddressFieldset;

/**
 * Class InvoiceAddressFieldsetFactory
 *
 * @author Anthonius Munthi <me@itstoni.com>
 * @package Orders\Factory\Form
 */
class InvoiceAddressFieldsetFactory extends AbstractCustomizableFieldsetFactory
{
	const OPTIONS_NAME = 'Orders/InvoiceAddressOptions';
	const CLASS_NAME = InvoiceAddressFieldset::class;
}