# Usage

[![Latest Stable Version](https://poser.pugx.org/milax/money/v/stable)](https://packagist.org/packages/milax/money) [![Total Downloads](https://poser.pugx.org/milax/money/downloads)](https://packagist.org/packages/milax/money) [![Latest Unstable Version](https://poser.pugx.org/milax/money/v/unstable)](https://packagist.org/packages/milax/money) [![License](https://poser.pugx.org/milax/money/license)](https://packagist.org/packages/milax/money)

```
$currency = new StdClass([
	'decimals' => 2,
	'name' => ' руб.',
	'display' => 'after'
]);

Milax\Currency::toString(12000, $currency);

// 120,00 руб.

```