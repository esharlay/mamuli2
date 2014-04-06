<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Контакты");
?>
<?/* echo "<pre>"; print_r($arResult); echo "</pre>"; */?>
<div class="contacts_map">
	<?$APPLICATION->IncludeComponent("bitrix:map.yandex.view", ".default", array(
		"INIT_MAP_TYPE" => "MAP",
		"MAP_DATA" => "a:4:{s:10:\"yandex_lat\";d:55.9096496500513;s:10:\"yandex_lon\";d:37.39646161376952;s:12:\"yandex_scale\";i:12;s:10:\"PLACEMARKS\";a:1:{i:0;a:3:{s:3:\"LON\";d:37.394745;s:3:\"LAT\";d:55.906756946613;s:4:\"TEXT\";s:15:\"Кафе \"У мамули\"\";}}}",
		"MAP_WIDTH" => "350",
		"MAP_HEIGHT" => "600",
		"CONTROLS" => array(
			0 => "ZOOM",
			1 => "TYPECONTROL",
			2 => "SCALELINE",
		),
		"OPTIONS" => array(
			0 => "ENABLE_SCROLL_ZOOM",
			1 => "ENABLE_DBLCLICK_ZOOM",
			2 => "ENABLE_DRAGGING",
		),
		"MAP_ID" => ""
		),
		false
	);?> 
</div>
<h1>Контакты</h1>
<p>Московская обл., г. Химки, пр-кт Мельникова, дом 31</p>
 
<p> 	Часы работы с 9-00 до 22-00 	 
  <br />
 	8 (498 )305-53-23 
</p>
<h2>Форма обратной связи</h2>
 <?$APPLICATION->IncludeFile(
	SITE_DIR."include/mailer.php",
	Array(),
	Array("MODE"=>"html")
);?> <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>