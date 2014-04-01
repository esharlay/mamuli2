<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$cart = $arParams['cart'];
?>

<dl>
<?foreach($arResult["ITEMS"] as $arItem):?>
	<dt id="listitem-<? echo $arItem['ID']; ?>">
		<div class="popup popup-<?=$arItem['ID']?>">
			<div class="wrapper">
				<div class="btn-close"><a href="#"></a></div>
				<? $img = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"]["ID"], array('width'=>360, 'height'=>360), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, true); ?>
				<div class="img"><a href="#"><img src="<?=$img['src']?>" alt="<?=$arItem['NAME']?>"></a></div>
				<div class="text">
					<h2><?=$arItem['NAME']?></h2>
					<p><?=$arItem['PREVIEW_TEXT']?></p>
					<div class="mb20 oh">
						<p class="cost fl-l"><?=$arItem["DISPLAY_PROPERTIES"]["PRICE"]["VALUE"]?> P</p>
<!--
						<p class="in fl-l">200/30</p>
-->
					</div>
					<div class="buy oh mb20">
						<div class="qnty fl-l">
							<a href="#" class="minus fl-l"></a>
							<input type="text" value="1" class="fl-l" id="count-<?=$arItem['ID']?>">
							<a href="#" class="plus fl-l"></a>
						</div>
						<div class="btn-buy fl-l"><input pid="<?=$arItem['ID']?>" cost="<?=$arItem["DISPLAY_PROPERTIES"]["PRICE"]["VALUE"]?>" type="submit" value="<? echo GetMessage("GP_BUY"); ?>"></div>
					</div>
					<div class="description">
						<? if ($arItem['DETAIL_TEXT']): ?>
							<p class="title"><? echo GetMessage("GP_ADDITIONAL"); ?>:</p>
							<p><?=$arItem['DETAIL_TEXT']?></p>
						<? else: ?>
							<?$APPLICATION->IncludeFile(
								SITE_DIR."include/detail.php",
								Array(),
								Array("MODE"=>"html")
								);
							?>
						<? endif ?>
					</div>
				</div>
			</div>
		</div>
		<div class="img">
			<? $img = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"]["ID"], array('width'=>220, 'height'=>220), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, true); ?>

			<a href="#" class="item-link" rel=".popup-<?=$arItem['ID']?>">
			<img src="<?=$img['src']?>" alt="<?echo $arItem["NAME"]?>">
			<div class="hidden">
				<div class="wrapper">
					<h2 id="listitemtitle-<?echo $arItem["ID"]?>"><?echo $arItem["NAME"]?></h2>
					<div class="teaser">
						<p class="description"><?echo $arItem["PREVIEW_TEXT"]?></p>
						<p class="weight"></p>
					</div>
				</div>
			</div>
			</a>
		</div>
		<div class="text">
			<div class="bottom">
				<h3><?echo $arItem["NAME"]?></h3>

				<div class="cost"><span id="listitemcost-<? echo $arItem['ID'];?>"><?echo $arItem["DISPLAY_PROPERTIES"]["PRICE"]["VALUE"]?></span> P</div>
				<div class="basket">
					<?
						$item = $cart['items'][$arItem['ID']];
					?>
					<a id="additemlink-<? echo $arItem['ID'];?>" class="add-item<? if ($item) echo " active" ?>" itemid="<?echo $arItem["ID"]; ?>" itemcost="<?echo $arItem["DISPLAY_PROPERTIES"]["PRICE"]["VALUE"]?>" href>
						<div <? if(! $item) echo 'style="display:none"' ?> class="tooltip">
							<div class="wrapper">
								<p id = "listitemcount-<? echo $arItem['ID'];?>" class="items-count"><? echo $item['count']; ?></p>
								<span class="tic"></span>
							</div>
						</div>
					</a>
				</div>
			</div>
		</div>

	</dt>
<?endforeach;?>
</dl>

<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>

