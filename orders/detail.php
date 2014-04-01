<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");


$id = $_REQUEST["ID"];

	$skip = false;
	if(! $GLOBALS['USER']->IsAuthorized())
		//неавторизованные
		$skip = true;
	else
		$UserID = intval($GLOBALS['USER']->GetID());

	if (! in_array(1, CUser::GetUserGroup(intval($UserID))))
		//не администраторы
		if (! in_array(5, CUser::GetUserGroup(intval($UserID))))
			//не редакторы
			$skip = true;

	if ($skip){
		LocalRedirect(SITE_DIR);
		die();
	}


?> <?$APPLICATION->IncludeComponent("bitrix:news.detail", "orderDetail", array(
	"IBLOCK_TYPE" => "",
	"IBLOCK_ID" => "4",
	"ELEMENT_ID" => $id,
	"ELEMENT_CODE" => "",
	"CHECK_DATES" => "Y",
	"FIELD_CODE" => array(
		0 => "",
		1 => "",
	),
	"PROPERTY_CODE" => array(
		0 => "CLIENTHOUSE",
		1 => "CLIENTNAME",
		2 => "PERSONSCOUNT",
		3 => "STATUS",
		4 => "PRICE",
		5 => "CLIENTPHONE",
		6 => "ITEMS",
		7 => "CLIENTSTREET",
		8 => "",
	),
	"IBLOCK_URL" => "",
	"AJAX_MODE" => "N",
	"AJAX_OPTION_JUMP" => "N",
	"AJAX_OPTION_STYLE" => "Y",
	"AJAX_OPTION_HISTORY" => "N",
	"CACHE_TYPE" => "A",
	"CACHE_TIME" => "36000000",
	"CACHE_GROUPS" => "Y",
	"META_KEYWORDS" => "-",
	"META_DESCRIPTION" => "-",
	"BROWSER_TITLE" => "-",
	"SET_TITLE" => "Y",
	"SET_STATUS_404" => "Y",
	"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
	"ADD_SECTIONS_CHAIN" => "Y",
	"ACTIVE_DATE_FORMAT" => "d.m.Y H:i",
	"USE_PERMISSIONS" => "N",
	"DISPLAY_TOP_PAGER" => "N",
	"DISPLAY_BOTTOM_PAGER" => "N",
	"PAGER_TITLE" => "Страница",
	"PAGER_TEMPLATE" => "",
	"PAGER_SHOW_ALL" => "Y",
	"AJAX_OPTION_ADDITIONAL" => "",
	"OBJECTS_ID" => "3"
	),
	false
);
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>
