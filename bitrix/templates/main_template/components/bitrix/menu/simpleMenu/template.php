<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?
$secondLevel = false;
$selected = false;

if (!empty($arResult)):?>
	<?foreach($arResult as $arItem):?>
		<? if ($arItem["DEPTH_LEVEL"] > 1): continue; endif ?>	
			<?if ($arItem["SELECTED"]):?>
				<li><a class="active" href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
			<?else:?>
				<li><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
			<?endif?>		
	<?endforeach?>		
<?endif?>