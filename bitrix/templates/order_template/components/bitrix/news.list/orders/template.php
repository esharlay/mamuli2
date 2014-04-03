<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

//$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . '/js/orders.js');?>

<?

	$items = array();
	$ids = array();
	foreach($arResult["ITEMS"] as $arItem){
		foreach(explode('|',$arItem["PROPERTIES"]["ITEMS"]["VALUE"]) as $item){
			$item = explode('/',$item);
			if (! in_array($item[0],$ids)){
				$ids[] = $item[0];
				$items[$item[0]]['count'] = $item[1];
			}
		}
	}

	$objects_id = $arParams["OBJECTS_ID"];

	CModule::IncludeModule("iblock");
	$objects = array();
	$arSelect = Array("ID", "NAME", "PROPRETY_PRICE");
	$arFilter = Array("IBLOCK_ID"=>$objects_id, "ID" => $ids);
	$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>500), false);
	while($ob = $res->GetNextElement())
	{
		$arFields = $ob->GetFields();
		$arProps  = $ob->GetProperties();

		$objects[$arFields["ID"]]['name'] = $arFields["NAME"];
		$objects[$arFields["ID"]]['cost'] = $arProps["PRICE"]["VALUE"];
		$objects[$arFields["ID"]]['count'] = $items[$arFields["ID"]]['count'];
	}


?>

<? if ($arResult["ITEMS"]): ?>
	<p class="info">&nbsp;</p>
	<div class="admin-panel">

		<div class="data">
		<table width="100%">
			<tbody>
				<tr>
					<th><?=GetMessage("GP_DEL_TIME");?></th>
					<th><?=GetMessage("GP_DEL_PHONE");?></th>
					<th><?=GetMessage("GP_DEL_ADRESS");?></th>
					<th><?=GetMessage("GP_DEL_ORDER");?></th>
					<th><?=GetMessage("GP_DEL_PERSONS");?></th>
					<th><?=GetMessage("GP_DEL_COMMENT");?></th>
					<th><?=GetMessage("GP_DEL_PRICE");?></th>
					<th><?=GetMessage("GP_DEL_STATUS");?></th>
				</tr>
				<? foreach ($arResult["ITEMS"] as $arItem): ?>
					<tr>
						<td><?=$arItem["DISPLAY_ACTIVE_FROM"];?></td>
						<td><?=$arItem["PROPERTIES"]["CLIENTPHONE"]["VALUE"];?></td>
						<td><? echo $arItem["PROPERTIES"]["CLIENTSTREET"]["VALUE"] . ' ' . $arItem["PROPERTIES"]["CLIENTHOUSE"]["VALUE"]?></td>
						<td>
						<?
							foreach(explode('|',$arItem["PROPERTIES"]["ITEMS"]["VALUE"]) as $item){
								$cur = explode('/',$item);
								echo '<span class="order-item">' . $objects[$cur[0]]['name'] . ' - ' . $objects[$cur[0]]['count'] . GetMessage("GP_DEL_S") . $objects[$cur[0]]['cost'] . GetMessage("GP_DEL_RUB") . '</span><br>';
							}
						?>
						</td>
						<td><?=$arItem["PROPERTIES"]["PERSONSCOUNT"]["VALUE"];?></td>
						<td><?=$arItem["PREVIEW_TEXT"];?></td>
						<td><?=$arItem["PROPERTIES"]["PRICE"]["VALUE"];?> <? echo GetMessage("GP_DEL_RUB"); ?></td>
						<td>
							<div class="dropdown">
								<div class="btn-dropdown"><a class="caption" href=""><span id="ordercaption-<?=$arItem["ID"];?>"><?=$arItem["PROPERTIES"]["STATUS"]["VALUE"]; ?></span><span class="caret"></span></a></div>
								<ul><?
									$enum_props = CIBlockPropertyEnum::GetList(Array("NAME"=>"ASC"), Array("CODE"=>"STATUS"));
									while($arEnumProps = $enum_props->GetNext())
									{

									?><li value="<? echo $arEnumProps["ID"]?>">
									<a itemid="<?=$arItem["ID"];?>" class="process-button" href><?echo $arEnumProps["VALUE"]?></a>
									</li><?
									}
									?>
								</ul>
							</div>
						</td>
					</tr>
				<? endforeach; ?>
			</tbody>
		</table>



	<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
		<?=$arResult["NAV_STRING"]?>
	<?endif;?>
	</div>
	</div>
<? endif; ?>
