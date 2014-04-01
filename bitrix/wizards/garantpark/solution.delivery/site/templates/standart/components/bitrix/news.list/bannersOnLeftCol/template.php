<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<dl class="info">
<?foreach($arResult["ITEMS"] as $arItem):?>
	<dt>
		<img src="<?
			$photo = $arItem["PREVIEW_PICTURE"]["ID"];
			$photo =  CFile::ResizeImageGet($photo, array('width'=>220), BX_RESIZE_IMAGE_PROPORTIONAL, true);
			echo $photo["src"];
		?>">		
	</dt>
<?endforeach;?>
</dl>


