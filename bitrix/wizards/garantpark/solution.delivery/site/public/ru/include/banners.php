<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
	global $arrFilter;
	$arrFilter = array ("PROPERTY_SHOWONABOUT_VALUE" => "Y");?>
	<?
	$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"bannersOnLeftCol",
	Array(

		"IBLOCK_TYPE" => "elements",
		"IBLOCK_ID" => "#BANNERS_ON_ABOUT_ID#",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_ORDER1" => "ASC",
		"SORT_BY2" => "SORT",
		"SORT_ORDER2" => "ASC",
		"FILTER_NAME" => "arrFilter",
		"FIELD_CODE" => array(),
		"PROPERTY_CODE" => array("SHOWONABOUT"),
		"SET_TITLE" => "N",
		"SET_STATUS_404" => "N",
		"DISPLAY_BOTTOM_PAGER" => "N",

	)
);?>
