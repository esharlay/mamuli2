<?
$arUrlRewrite = array(
	array(
		"CONDITION" => "#^/menu/([0-9]+)/([0-9]+)/*#",
		"RULE" => "SECTION_ID=\$1&SUBSECTION_ID=\$2",
		"PATH" => "/menu/index.php",
	),
	array(
		"CONDITION" => "#^/objects/([0-9]+)/*#",
		"RULE" => "ID=\$1",
		"PATH" => "/menu/detail.php",
	),
	array(
		"CONDITION" => "#^/orders/([0-9]+)/*#",
		"RULE" => "ID=\$1",
		"PATH" => "/orders/detail.php",
	),
	array(
		"CONDITION" => "#^/menu/recommends/*#",
		"PATH" => "/menu/recommends.php",
	),
	array(
		"CONDITION" => "#^/menu/([0-9]+)/*#",
		"RULE" => "SECTION_ID=\$1",
		"PATH" => "/menu/index.php",
	),
	array(
		"CONDITION" => "#^/menu/hits/*#",
		"PATH" => "/menu/hits.php",
	),
	array(
		"CONDITION" => "#^/menu/new/*#",
		"PATH" => "/menu/new.php",
	),
);

?>