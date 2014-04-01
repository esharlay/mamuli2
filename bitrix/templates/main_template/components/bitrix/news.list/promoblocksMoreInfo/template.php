<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>



<?
foreach($arResult["ITEMS"] as $arItem):?>

	  <h3><? echo $arItem["NAME"]; ?></h3>

	<div class="img">
	<a href="<? echo $arItem["PROPERTIES"]["PROMOLINK"]["VALUE"] ?>">
		<img src="<?
			$photo = $arItem["PREVIEW_PICTURE"]["ID"];
			$photo =  CFile::ResizeImageGet($photo, array('width'=>460, 'height'=>220), BX_RESIZE_IMAGE_EXACT, true);
			echo $photo["src"];
		?>"  />
	</a>
	<div class="text">
		<p><? echo $arItem["DETAIL_TEXT"]; ?></p>
	</div>
	</div>



<?endforeach;?>

