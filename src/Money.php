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
	 * @param bool $float (default: false)
	 * @return string
	 */
	public static function toString($number, Currency $currency, $float = false)
	{
		$value = self::toNumber($number, $currency, $float);
		
		if ((substr($number, strlen($number) - $currency->decimals, strlen($number)) == 00))
			$value = number_format($value);
		else
			$value = number_format($value, $currency->decimals);
		
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
	 * @param bool $float (default: false)
	 * @return mixed
	 */
	public static function toNumber($number, Currency $currency, $float = false)
	{
		$decimals = "1";
		for ($i = 0; $i != $currency->decimals; $i++) {
			$decimals .= "0";
		}
		
		$result = (float) $number / (integer) $decimals;
		
		if ($float) {
			return $result;
		} else {
			if ((substr($number, strlen($number) - $currency->decimals, strlen($number)) == 00))
				return $result;
			else
				return (integer) $result;
		}
	} 
	
	/**
	 * Format integer to K format for games..
	 * 
	 * @access public
	 * @static
	 * @param int $amount
	 * @param int $round (default: 1000)
	 * @param string $suffix (default: 'K')
	 * @return string
	 */
	public static function goldFormat($amount, $round = 1000, $suffix = 'k')
	{
		$i = 0;
		while ($amount >= 1000) {
			$amount = $amount / 1000;
			$i++;
		}
		
		return $amount . str_repeat($suffix, $i);

	}
}
