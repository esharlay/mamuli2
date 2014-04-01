<?php
if (!defined('B_PROLOG_INCLUDED') || (B_PROLOG_INCLUDED !== true)) {
    die();
}

$APPLICATION->SetTemplateCSS("style.css");

if (!$arResult["NavShowAlways"]) {
    if (
       (0 == $arResult["NavRecordCount"])
       ||
       ((1 == $arResult["NavPageCount"]) && (false == $arResult["NavShowAll"]))
    ) {
        return;
    }
}

$strNavQueryString = ($arResult["NavQueryString"] != "" ? $arResult["NavQueryString"]."&amp;" : "");
$strNavQueryStringFull = ($arResult["NavQueryString"] != "" ? "?".$arResult["NavQueryString"] : "");

?>
<div class="paginator">
    
	<div class="wrapper">

	<?if ($arResult["NavPageNomer"] < $arResult["NavPageCount"]):?>
		<?if($arResult["bSavePage"]):?>
			<a class="nav prev p1" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["NavPageCount"]?>"><span></span></a>			
		<?else:?>
			<a class="nav prev p1" href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>"><span></span></a>
			
		<?endif?>
	<?else:?>
		<a class="nav prev p1"><span></span></a>
	<?endif?>
	
	<?while($arResult["nStartPage"] <= $arResult["nEndPage"]):?>

		<?if ($arResult["nStartPage"] == $arResult["NavPageNomer"]):?>
			<a class="active nav"><?=$arResult["nStartPage"]?></a>
		<?elseif($arResult["nStartPage"] == 1 && $arResult["bSavePage"] == false):?>
			<a class="nav" href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>"><?=$arResult["nStartPage"]?></a>
		<?else:?>
			<a class="nav" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["nStartPage"]?>"><?=$arResult["nStartPage"]?></a>
		<?endif?>
		<?$arResult["nStartPage"]++?>
	<?endwhile?>


	<?if($arResult["NavPageNomer"] < $arResult["NavPageCount"]):?>
		
		<a class="nav next p1" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["NavPageCount"]?>"><span></span></a>
	<?else:?>
		<a class="nav next p1"><span></span></a>
	<?endif?>
	</div>
</div>
