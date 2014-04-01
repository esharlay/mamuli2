<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<? if ($arResult["ITEMS"]): ?>
		<table width="100%">
			<tbody>
				<tr>
					<th>Дата</th>
					<th>Имя</th>
					<th>Телефон</th>
					<th>Объект</th>
					<th>Квартира</th>
					<th>Комментарий</th>
					<th>Статус</th>
				</tr>
				<? foreach ($arResult["ITEMS"] as $arItem): ?>
					<tr>
						<td><?=$arItem["DISPLAY_ACTIVE_FROM"];?></td>
						<td><?=$arItem["NAME"];?></td>
						<td><?=$arItem["PROPERTIES"]["PHONE"]["VALUE"];?></td>
						<td>ул.Столбовая </td>
						<td><?=$arItem["PROPERTIES"]["ROOMS"]["VALUE"];?></td>
						<td><?=$arItem["PREVIEW_TEXT"];?></td>
						<td>
							<div class="dropdown">
								<div class="btn-dropdown"><a class="caption" href=""><?=$arItem["PROPERTIES"]["STATUS"]["VALUE"]; ?><span class="caret"></span></a></div>
								<ul><? 
									$enum_props = CIBlockPropertyEnum::GetList(Array("NAME"=>"ASC"), Array("CODE"=>"STATUS"));
									while($arEnumProps = $enum_props->GetNext())
									{
									?><li value="<? echo $arEnumProps["ID"]?>">
									<a itemid="<?=$arItem["ID"];?>" class="process-button" href=""><?echo $arEnumProps["VALUE"]?></a>
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
		<? echo str_replace('ajax.php','', $arResult["NAV_STRING"]); ?>
	<?endif;?>
	</div>
<? endif; ?>
