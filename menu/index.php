<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Ìåíş");

if ($_REQUEST["SECTION_ID"])
	$section_id = $_REQUEST["SECTION_ID"];
if ($_REQUEST["SUBSECTION_ID"])
	$subsection_id = $_REQUEST["SUBSECTION_ID"];
?>

<?


	if ($section_id){

		$ar_result = CIBlockSection::GetList(Array("SORT"=>"­­ASC"), Array("IBLOCK_ID"=>"3","ID"=>$section_id, "DEPTH_LEVEL" => "1"),
			false, Array("ID","NAME"));
		if ($ar_result){
			while ($res=$ar_result->GetNext())
				$name = $res["NAME"];
		}

		CModule::IncludeModule("iblock");
		$ar_result = CIBlockSection::GetList(Array("SORT"=>"­­ASC"), Array("IBLOCK_ID"=>"3","SECTION_ID"=>$section_id, "DEPTH_LEVEL" => "2"),
		false, Array("ID","NAME","IBLOCK_SECTION_ID"));
		if ($ar_result){
			?><div class="navigation-inner"><dl><?
			while ($res=$ar_result->GetNext()){
				?>
				<dt><a <? if ($subsection_id == $res["ID"]) { echo ' class="active"'; $name = $res["NAME"];} ?> href="<? echo SITE_DIR; ?>menu/<? echo $res["IBLOCK_SECTION_ID"];?>/<? echo $res["ID"];?>/" ><? echo $res["NAME"] ?></a></dt>
				<?
			}
			?></dl></div><?
		}
	}
	if ($subsection_id)
		$section_id = $subsection_id;

?>

<div class="items">
	<h1><? echo $name; ?></h1>
	<?$APPLICATION->IncludeComponent("bitrix:news.list", "productsOnMain", array(
		"IBLOCK_TYPE" => "objects",
		"IBLOCK_ID" => "3",
		"NEWS_COUNT" => "16",
		"FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"PROPERTY_CODE" => array(
			0 => "PRICE",
			1 => "",
		),
		"SET_TITLE" => "N",
		"PARENT_SECTION" => $section_id,
		"INCLUDE_SUBSECTIONS" => "Y",
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
