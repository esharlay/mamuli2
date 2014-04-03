<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<div class="feedback">
	<dl>
		<?foreach($arResult["ITEMS"] as $arItem):?>
			<dd><?=$arItem["PREVIEW_TEXT"]?></dd>
			<dt><b><?=$arItem['NAME']?></b></dt>
			<?/* echo "<pre>"; print_r($arItem); echo "</pre>"; */?>
		<?endforeach;?>
	</dl>
</div>
