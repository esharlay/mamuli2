<h2 class="navigation_left_header">
	Наше меню
</h2>
<nav class="navigation_left">
	<ul class="left_menu">
	<?
		CModule::IncludeModule("iblock");
		$ar_result = CIBlockSection::GetList(Array("SORT"=>"ASC"), Array("IBLOCK_ID"=>"3", "DEPTH_LEVEL" => "1"),false, Array("ID","NAME","DEPTH_LEVEL"));
		while ($res=$ar_result->GetNext()){
			?>
			<? if (SITE_DIR == "/"): ?>
			<li><a <? if ($_REQUEST["SECTION_ID"] == $res["ID"]) echo ' class="active"'; ?> href="<? echo SITE_DIR; ?>menu/<? echo $res["ID"]?>/" ><? echo $res["NAME"] ?></a></li>
			<? else: ?>
			<li><a <? if ($_REQUEST["SECTION_ID"] == $res["ID"]) echo ' class="active"'; ?> href="<? echo SITE_DIR; ?>menu/index.php?SECTION_ID=<? echo $res["ID"]?>/" ><? echo $res["NAME"] ?></a></li>
			<? endif ?>
			<?
		}
	?>
	</ul>
</nav>