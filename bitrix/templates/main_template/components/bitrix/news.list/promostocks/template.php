<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?

$positon = 1;
foreach($arResult["ITEMS"] as $arItem):?>
	<? if ($positon++ == $arParams["position"]) continue; ?>
	<a href="<? echo $arItem["PROPERTIES"]["PROMOLINK"]["VALUE"] ?>">
	<div class="img">

		<img src="<?
			$photo = $arItem["PREVIEW_PICTURE"]["ID"];
			$photo =  CFile::ResizeImageGet($photo, array('width'=>220, 'height'=>220), BX_RESIZE_IMAGE_EXACT, true);
			echo $photo["src"];
		?>" />

	</div>

	<div class="hidden">
          <h2><? echo $arItem["NAME"]; ?></h2>

		<div class="text">
			<p><? echo $arItem["PREVIEW_TEXT"]; ?></p>
		</div>
	</div>
	</a>
<?endforeach;?>

