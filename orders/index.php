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

?>

	<?$APPLICATION->IncludeComponent("bitrix:news.list", "orders", array(
	"IBLOCK_TYPE" => "",
	"IBLOCK_ID" => "4",
	"NEWS_COUNT" => "16",
	"SORT_BY1" => "ACTIVE_FROM",
	"SORT_ORDER1" => "DESC",
	"SORT_BY2" => "SORT",
	"SORT_ORDER2" => "ASC",
	"FILTER_NAME" => "",
	"FIELD_CODE" => array(
		0 => "",
		1 => "",
	),
	"PROPERTY_CODE" => array(
		0 => "CLIENTHOUSE",
		1 => "CLIENTNAME",
		2 => "PERSONSCOUNT",
		3 => "PRICE",
		4 => "CLIENTPHONE",
		5 => "CLIENTSTREET",
		6 => "",
	),
	"CHECK_DATES" => "Y",
	"DETAIL_URL" => "",
	"AJAX_MODE" => "N",
	"AJAX_OPTION_JUMP" => "N",
	"AJAX_OPTION_STYLE" => "Y",
	"AJAX_OPTION_HISTORY" => "N",
	"CACHE_TYPE" => "A",
	"CACHE_TIME" => "36000000",
	"CACHE_FILTER" => "N",
	"CACHE_GROUPS" => "Y",
	"PREVIEW_TRUNCATE_LEN" => "",
	"ACTIVE_DATE_FORMAT" => "d.m.Y H:i",
	"SET_TITLE" => "Y",
	"SET_STATUS_404" => "N",
	"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
	"ADD_SECTIONS_CHAIN" => "Y",
	"HIDE_LINK_WHEN_NO_DETAIL" => "N",
	"PARENT_SECTION" => "",
	"PARENT_SECTION_CODE" => "",
	"DISPLAY_TOP_PAGER" => "N",
	"DISPLAY_BOTTOM_PAGER" => "Y",
	"PAGER_TITLE" => "Новости",
	"PAGER_SHOW_ALWAYS" => "Y",
	"PAGER_TEMPLATE" => "main",
	"PAGER_DESC_NUMBERING" => "N",
	"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
	"PAGER_SHOW_ALL" => "Y",
	"DISPLAY_DATE" => "Y",
	"DISPLAY_NAME" => "Y",
	"DISPLAY_PICTURE" => "Y",
	"DISPLAY_PREVIEW_TEXT" => "Y",
	"AJAX_OPTION_ADDITIONAL" => "",
	"OBJECTS_ID" => "3"
	),
	false
);
	?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
