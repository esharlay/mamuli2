<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>



<?
$positon = 1;
foreach($arResult["ITEMS"] as $arItem):?>
	<? if ($positon++ == $arParams["position"]) continue; ?>

	<div class="img">
	<a href="<? echo $arItem["PROPERTIES"]["PROMOLINK"]["VALUE"] ?>">
		<img src="<?
			$photo = $arItem["PREVIEW_PICTURE"]["ID"];
			$photo =  CFile::ResizeImageGet($photo, array('width'=>460, 'height'=>220), BX_RESIZE_IMAGE_EXACT, true);
			echo $photo["src"];
		?>"  />
	</a>
	</div>

	<div class="text">
	  <p><? echo $arItem["NAME"]; ?></p>
	 </div>

<?endforeach;?>

