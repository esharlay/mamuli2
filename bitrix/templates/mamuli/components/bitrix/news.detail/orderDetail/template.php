<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?
	$objects_id = $arParams["OBJECTS_ID"];
	$items = array();
	$ids = array();
	foreach(explode('|',$arResult["DISPLAY_PROPERTIES"]["ITEMS"]["VALUE"]) as $item){
		$item = explode('/',$item);
		if (! in_array($item[0],$ids)){
			$ids[] = $item[0];
			$items[$item[0]]['count'] = $item[1];
		}
	}

	CModule::IncludeModule("iblock");
	$objects = array();
	$arSelect = Array("ID", "NAME");
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

<div class="order">
	<h3><?=$arResult["NAME"]?></h3>
	<div class="l-col">
		<table class="order-items">
			<tbody>
			<tr>
				<th><? echo GetMessage("GP_DEL_ITEM"); ?></th>
				<th><? echo GetMessage("GP_DEL_COUNT"); ?></th>
				<th><? echo GetMessage("GP_DEL_COST"); ?></th>
			</tr>

		<?
			$result = array();
			foreach (explode('|', $arResult["DISPLAY_PROPERTIES"]["ITEMS"]["VALUE"]) as $item){
				$item = explode('/',$item);
				$result[$item[0]]['count'] = $item[1];
			}
			foreach($ids as $key=>$item)
			{
				echo '<tr>';
				echo '<td><a href="/objects/'. $item .'">' . $objects[$item]['name'] . '</a></td>';
				echo '<td>' . $objects[$item]['count'] .'</td>';
				echo '<td>' . $objects[$item]['cost'] . '</td>';
				echo '</tr>';
			}
		?>
		<tr>
		<td></td>
		<td class="total"><b><? echo GetMessage("GP_DEL_TOTAL"); ?></b></td>
		<td><? echo $arResult["DISPLAY_PROPERTIES"]["PRICE"]["VALUE"]; ?><? echo GetMessage("GP_DEL_RUB"); ?></td>
		</tr>
		</tbody>
		</table>
	</div>
	<div class="r-col">
		<div class="info">
		<h5><? echo GetMessage("GP_DEL_NAME"); ?></h5>
		<p><? echo $arResult["DISPLAY_PROPERTIES"]["CLIENTNAME"]["VALUE"]; ?></p>

		<h5><? echo GetMessage("GP_DEL_PHONE"); ?></h5>
		<p><? echo $arResult["DISPLAY_PROPERTIES"]["CLIENTPHONE"]["VALUE"] ?></p>

		<h5><? echo GetMessage("GP_DEL_ADRESS"); ?></h5>
		<p><?
			echo $arResult["DISPLAY_PROPERTIES"]["CLIENTSTREET"]["VALUE"];
			echo " - ";
			echo $arResult["DISPLAY_PROPERTIES"]["CLIENTHOUSE"]["VALUE"];
		?></p>

		<h5><? echo GetMessage("GP_DEL_COMMENT"); ?></h5>
		<p><?echo $arResult["PREVIEW_TEXT"];?></p>

		<h5><? echo GetMessage("GP_DEL_STATUS"); ?></h5>
		<p><? echo $arResult["DISPLAY_PROPERTIES"]["STATUS"]["VALUE"]; ?></p>
		</div>
	</div>
</div>
<div class="clear"></div>
