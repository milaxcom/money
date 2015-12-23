# Usage

```
$currency = new StdClass([
	'decimals' => 2,
	'name' => ' руб.',
	'display' => 'after'
]);

Milax\Currency::toString(12000, $currency);

// 120,00 руб.

```