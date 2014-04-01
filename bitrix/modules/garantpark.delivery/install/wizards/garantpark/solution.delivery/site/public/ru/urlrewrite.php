<?
$arUrlRewrite = array(
	array(
		"CONDITION"	=>	"#^/menu/([0-9]+)/([0-9]+)/*#",
		"RULE"	=>	"SECTION_ID=$1&SUBSECTION_ID=$2",
		"PATH"	=>	SITE_DIR . "menu/index.php",
	),
	array(
		"CONDITION"	=>	"#^/orders/([0-9]+)/*#",
		"RULE"	=>	"ID=$1",
		"PATH"	=>	SITE_DIR . "orders/detail.php",
	),
	array(
		"CONDITION"	=>	"#^/objects/([0-9]+)/*#",
		"RULE"	=>	"ID=$1",
		"PATH"	=>	SITE_DIR . "menu/detail.php",
	),
	array(
		"CONDITION"	=>	"#^/menu/recommends/*#",
		"PATH"	=>	SITE_DIR . "menu/recommends.php",
	),
	array(
		"CONDITION"	=>	"#^/menu/([0-9]+)/*#",
		"RULE"	=>	"SECTION_ID=$1",
		"PATH"	=>	SITE_DIR . "menu/index.php",
	),
	array(
		"CONDITION"	=>	"#^/menu/hits/*#",
		"PATH"	=>	SITE_DIR . "menu/hits.php",
	),
	array(
		"CONDITION"	=>	"#^/menu/new/*#",
		"PATH"	=>	SITE_DIR . "menu/new.php",
	),
);

?>
