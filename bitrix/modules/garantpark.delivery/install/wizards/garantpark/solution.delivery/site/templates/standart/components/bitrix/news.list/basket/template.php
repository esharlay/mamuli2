
<div class="hidden-basket">
	<div class="wrapper">
		<div class="cols">
			<div class="left-col">
				<h1><?=GetMessage("GP_ORDER");?></h1>
				<table class="order">
					<tbody>
						<? if ($arResult['ITEMS']): ?>

							<?
							$totalCost = 0;
							foreach ($arResult['ITEMS'] as $item):
							$count = $arParams['cart']['items'][$item['ID']]['count'];
							$key = $item['ID'];
							?>
							<tr class="item" id="item-<? echo $key; ?>"  pid="<? echo $key; ?>">
							<td class="delete"><a class="item-remove" pid="<? echo $key; ?>" href="#remove<?=$key?>"></a></td>
							<td class="name"><b><?=$item['NAME']?></b></td>
							<td class="qnty">
								<div class="wrapper">
									<a class="minus"  href="#"></a>
									<input pattern="[0-9]{,3}" id="itemcount-<? echo $key; ?>" pid="<?=$key?>" type="text" value="<? echo $count; ?>">
									<a class="plus" href="#"></a>
								</div>
							</td>
							<td class="cost"><span id="itemcost-<? echo $key; ?>"><? echo $item['PROPERTIES']['PRICE']['VALUE'] * $count?></span></td>
							</tr>
							<? $totalCost += $item['PROPERTIES']['PRICE']['VALUE'] * $count?>
							<?endforeach?>


						<tr class="sum">
							<td></td>
							<td></td>
							<td></td>
							<td colspan="2" ><?=GetMessage("GP_TOTAL");?>: <span class="tableresult"><? echo $totalCost; ?></span></td>
						</tr>
						<div style="width:100%; text-align:right"><a href class="order-clear"></a><div class="clear"></div></div>

					<? endif; ?>
					</tbody>
				</table>
			</div>
			<div class="right-col">
				<h1><?=GetMessage("GP_FORM");?></h1>
				<table class="form">
					<form>
						<tbody>
							<tr>
								<td class="title"><?=GetMessage("GP_NAME");?></td>
								<td><input class="text" type="text" id="order-name"></td>
							</tr>
							<tr>
								<td class="title"><?=GetMessage("GP_PHONE");?></td>
								<td><input class="text" type="text" id="order-phone"></td>
							</tr>
							<tr>
								<td class="title"><?=GetMessage("GP_STREET");?></td>
								<td><input class="text" type="text" id="order-street"></td>
							</tr>
							<tr>
								<td class="title"><?=GetMessage("GP_HOUSE");?></td>
								<td><input class="text" type="text" id="order-house"></td>
							</tr>
							<tr>
								<td class="title area"><?=GetMessage("GP_COMMENT");?></td>
								<td><textarea name="" id="order-comment" cols="30" rows="10"></textarea></td>
							</tr>
							<tr>
								<td class="title"><?=GetMessage("GP_PERSONS");?></td>
								<td><input class="person" type="text" name="" id="order-persons" value="1">
								<a class="btn-add add-person" root="<? echo SITE_DIR; ?>" href=""><?=GetMessage("GP_ADD");?></a></td>
							</tr>
							<tr>
								<td class="title"></td>
								<td class="pokemon">
									<img class="person-icon" src="<? echo SITE_DIR; ?>img/person1.jpg" alt="">
								</td>
							</tr>
							<tr>
								<td></td>
								<td class="btn-order"><input class="send-order" type="submit" value="<?=GetMessage("GP_OORDER");?>"></td>
							</tr>
						</tbody>
					</form>
				</table>
			</div>
		</div>
		<div class="close-basket"><a href="<? echo SITE_DIR; ?>" class="close-basket"></a></div>
	</div>
</div>
