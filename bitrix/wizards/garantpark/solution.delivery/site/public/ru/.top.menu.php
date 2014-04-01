<?
$aMenuLinks = Array(
	Array(
		"О компании",
		SITE_DIR . "about/",
		Array(),
		Array(),
		""
	),
	Array(
		"Доставка и оплата",
		SITE_DIR . "delivery/",
		Array(),
		Array(),
		""
	),
	Array(
		"Акции",
		SITE_DIR . "stocks/",
		Array(),
		Array(),
		""
	),
	Array(
		"Заказы",
		SITE_DIR . "orders/",
		Array(),
		Array(),
		"\$GLOBALS['USER']->IsAuthorized()"
	)
);
?>
