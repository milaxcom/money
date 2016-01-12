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
	 * @return string
	 */
	public static function toString($number, Currency $currency)
	{
		
		$value = self::toNumber($number, $currency);
		
		switch ($currency->display) {
			case 'before':
				return $currency->short . $value;
			case 'after':
				return $value . $currency->short;
		}
	}
	
	/**
	 * Convert given number to currency number.
	 * 
	 * @access public
	 * @static
	 * @param mixed $number
	 * @param Currency $currency
	 * @return mixed
	 */
	public static function toNumber($number, Currency $currency)
	{
		return $number / $currency->basic;
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
