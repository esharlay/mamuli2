<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?

?>

<div class="object">
	<h3><?=$arResult["NAME"]?></h3>
	<div class="l-col">
		<div class="img">
			<img src="<? echo $arResult["PREVIEW_PICTURE"]["SRC"]; ?>">
		</div>
		<h5><? echo GetMessage("GP_DEL_DESCRIPTION"); ?></h5>
		<p><?echo $arResult["PREVIEW_TEXT"];?></p>
		<h5><? echo GetMessage("GP_DEL_PRICE"); ?></h5>
		<p><? echo $arResult["DISPLAY_PROPERTIES"]["PRICE"]["VALUE"]; ?> ð.</p>

	</div>

	<div class="r-col">




	</div>
</div>
<div class="clear"></div>
