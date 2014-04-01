<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?
$secondLevel = false;
$selected = false;

if (!empty($arResult)):?>
	<dl>
		<?foreach($arResult as $arItem):?>
			<? if ($arItem["DEPTH_LEVEL"] > 1): continue; endif ?>	
				<?if ($arItem["SELECTED"]):?>
					<dt><a class="active" href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></dt>
				<?else:?>
					<dt><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></dt>
				<?endif?>		
		<?endforeach?>		
	</dl>
<?endif?>

