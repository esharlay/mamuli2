<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Доставка");
?>

<?$APPLICATION->IncludeFile(
	SITE_DIR."include/bannerOnMain.php",
	Array(),
	Array("MODE"=>"html")
);?>

<div class="menu">
	<div class="navi">
		<dl>
		<?$APPLICATION->IncludeFile(
			SITE_DIR."include/additional_menu.php",
			Array(),
			Array("MODE"=>"html")
		);?>
		</dl>
	</div>

<div class="list-menu">
	<div class="wrapper">
    <a class="dropdown" >Все меню</a>
		<div class="hidden">
		<dl>
		<?
			CModule::IncludeModule("iblock");
			$ar_result = CIBlockSection::GetList(Array("SORT"=>"­­ASC"), Array("IBLOCK_ID"=>"3"),false, Array("ID","NAME","DEPTH_LEVEL"));
			while ($res=$ar_result->GetNext()){
				if ($res["DEPTH_LEVEL"] != 1) continue;
				?>

				<dt><a href="<? echo SITE_DIR; ?>menu/<? echo $res["ID"]?>/" ><? echo $res["NAME"] ?></a></dt>
				<?
			}
		?>
			<?$APPLICATION->IncludeFile(
			SITE_DIR."include/additional_menu.php",
			Array(),
			Array("MODE"=>"html")
		);?>
		<i class="dropdown-tic"></i>
		</dl>
		</div>
    </div>
</div>

  <div class="items"> 	<?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"productsOnMain",
	Array(
		"IBLOCK_TYPE" => "objects",
		"IBLOCK_ID" => "3",
		"NEWS_COUNT" => "8",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_ORDER1" => "DESC",
		"SORT_BY2" => "SORT",
		"SORT_ORDER2" => "ASC",
		"FILTER_NAME" => "",
		"FIELD_CODE" => array(0=>"",1=>"",),
		"PROPERTY_CODE" => array(0=>"PRICE",1=>"",),
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
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"SET_TITLE" => "N",
		"SET_STATUS_404" => "N",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
		"ADD_SECTIONS_CHAIN" => "Y",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"PAGER_TITLE" => "Новости",
		"PAGER_SHOW_ALWAYS" => "Y",
		"PAGER_TEMPLATE" => "",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "Y",
		"AJAX_OPTION_ADDITIONAL" => "",
"cart" => $_SESSION["cart"]
	)
);?> </div>
 </div>



 <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
