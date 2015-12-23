<?php

namespace Milax;

use App\Currency;

class Money
{
	
	/**
	 * Convert given number to currency string.
	 * 
	 * @access public
	 * @static
	 * @param mixed $number
	 * @param Currency $currency
	 * @return void
	 */
	public static function toString($number, Currency $currency, $float = false)
	{
		if ($float)
			$value = self::toNumber($number, $currency);
		else
			$value = number_format(self::toNumber($number, $currency), $currency->decimals); 
		
		switch ($currency->display) {
			case 'before':
				return $currency->name . $value;
			case 'after':
				return $value . $currency->name;
		}
	}
	
	/**
	 * Convert given number to currency number.
	 * 
	 * @access public
	 * @static
	 * @param mixed $number
	 * @param Currency $currency
	 * @return void
	 */
	public static function toNumber($number, Currency $currency)
	{
		$decimals = "1";
		for ($i = 0; $i != $currency->decimals; $i++) {
			$decimals .= "0";
		}
		
		return (float) $number / (integer) $decimals;
	} 
}
