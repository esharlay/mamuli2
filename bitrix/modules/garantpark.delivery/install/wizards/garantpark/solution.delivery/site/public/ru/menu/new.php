<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("����");

if ($_REQUEST["SECTION_ID"])
	$section_id = $_REQUEST["SECTION_ID"];
?>


<div class="items">
	<h1>����� �����������:</h1>
	<?$APPLICATION->IncludeComponent("bitrix:news.list", "productsOnMain", array(
		"IBLOCK_TYPE" => "objects",
		"IBLOCK_ID" => "#OBJECTS_ID#",
		"NEWS_COUNT" => "16",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_ORDER1" => "DESC",
		"FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"PROPERTY_CODE" => array(
			0 => "PRICE",
			1 => "",
		),
		"SET_TITLE" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "main",
		"cart" => $_SESSION["cart"],
		),
		false
	);
	?>
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
