<?
	CModule::IncludeModule("iblock");
	$ar_result = CIBlockSection::GetList(Array("SORT"=>"­­ASC"), Array("IBLOCK_ID"=>"#OBJECTS_ID#", "DEPTH_LEVEL" => "1"),false, Array("ID","NAME","DEPTH_LEVEL"));
	while ($res=$ar_result->GetNext()){
		?>
		<? if (SITE_DIR == "/"): ?>
		<dt><a <? if ($_REQUEST["SECTION_ID"] == $res["ID"]) echo ' class="active"'; ?> href="<? echo SITE_DIR; ?>menu/<? echo $res["ID"]?>/" ><? echo $res["NAME"] ?></a></dt>
		<? else: ?>
		<dt><a <? if ($_REQUEST["SECTION_ID"] == $res["ID"]) echo ' class="active"'; ?> href="<? echo SITE_DIR; ?>menu/index.php?SECTION_ID=<? echo $res["ID"]?>/" ><? echo $res["NAME"] ?></a></dt>
		<? endif ?>
		<?
	}
?>
