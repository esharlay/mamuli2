<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="teasers">
	<?foreach($arResult["ITEMS"] as $arItem):?>
		<a href="<?=$arItem['NAME']?>" style="background: url(<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>) center center no-repeat;"></a>
	<?endforeach;?>
</div>
