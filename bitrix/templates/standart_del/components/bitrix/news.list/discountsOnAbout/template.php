<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<dl class="info">
<?foreach($arResult["ITEMS"] as $arItem):?>
	<dt>
		<div class="text">
			<img src="<?
			$photo = $arItem["PREVIEW_PICTURE"]["ID"];
			$photo =  CFile::ResizeImageGet($photo, array('width'=>220, 'height'=>160), BX_RESIZE_IMAGE_EXACT, true);
			echo $photo["src"];
		?>" alt="<? echo $arItem["NAME"]; ?>">
		</div>
		<div class="teaser">
			<p><? echo $arItem["PREVIEW_TEXT"]; ?></p>
		</div>
				
	</dt>
<?endforeach;?>
</dl>

