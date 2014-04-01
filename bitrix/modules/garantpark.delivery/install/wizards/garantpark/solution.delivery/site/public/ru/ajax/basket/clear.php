<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
CModule::IncludeModule('iblock');

$id = $_REQUEST["id"]; if ($id) if (!intval($id)) die();
$count = $_REQUEST["count"]; if (!intval($count)) $count = 1;

	//add
	unset($_SESSION['cart']);

	global $filter;
	global $APPLICATION;

	$filter = array();
	foreach ($_SESSION['cart']['items'] as $key => $value)
		$filter[] = $key;

	if (count($filter)){
		$filter = array('ID' => $filter);

		$APPLICATION->IncludeComponent("bitrix:news.list", "basket", array(
				"FILTER_NAME" => 'filter',
				"IBLOCK_ID" => "3",
				"NEWS_COUNT" => "30",
				"SORT_BY1" => "ID",
				"SORT_ORDER1" => "DESC",
				"FIELD_CODE" => array(0 => "DATE_CREATE", 1 => "", 2 => ''),
				"PROPERTY_CODE" => array(0 => "PRICE", 1 => "", 2=> ""),
				"SET_TITLE" => "N",
				"SET_STATUS_404" => "N",
				"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
				"ADD_SECTIONS_CHAIN" => "N",
				"PARENT_SECTION" => "",
				"PARENT_SECTION_CODE" => "",
				"DISPLAY_TOP_PAGER" => "N",
				"DISPLAY_BOTTOM_PAGER" => "N",
				"PAGER_SHOW_ALWAYS" => "N",
				"PAGER_TEMPLATE" => "main",
				'cart' => $_SESSION['cart']
			),
			false
		);
	}

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");
?>
