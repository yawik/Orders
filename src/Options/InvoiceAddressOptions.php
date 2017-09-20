<?php
/**
 * YAWIK
 *
 * @filesource
 * @license MIT
 * @copyright  2013 - 2017 Cross Solution <http://cross-solution.de>
 */

namespace Orders\Options;


use Core\Options\FieldsetCustomizationOptions;

class InvoiceAddressOptions extends FieldsetCustomizationOptions
{
	protected $fields = [
		'company' => [
			'enabled' => true,
		],
		'street' => [
			'enabled' => true,
		],
		'zipCode' => [
			'enabled' => true,
		],
		'city' => [
			'enabled' => true,
		],
		'region' => [
			'enabled' => true,
		],
		'country' => [
			'enabled' => true,
		],
		'vatId' => [
			'enabled' => true,
		],
		'gender' => [
			'enabled' => true,
		],
		'name' => [
			'enabled' => true,
		],
		'email' => [
			'enabled' => true,
		]
	];
}