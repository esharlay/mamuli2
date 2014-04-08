<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?foreach($arResult["ITEMS"] as $arItem):?>
		<a class="left_banner" href="<?=$arItem['PREVIEW_TEXT']?>" style="background: url(<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>) left top no-repeat;"></a>
<?endforeach;?>
