<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<script type="text/javascript" src="/js/jquery.jcarousel.min.js"></script>
<script type="text/javascript" src="/js/jcarousel.basic.js"></script>
<div class="jcarousel-wrapper">
<div class="jcarousel">
<ul>
<?foreach($arResult["ITEMS"] as $arItem):?>
	<li>
		<a href="<?=$arItem['NAME']?>"><img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt=""></a>
	</li>
<?endforeach;?>
</ul>
</div>
<a href="#" class="jcarousel-control-prev"></a>
<a href="#" class="jcarousel-control-next"></a>
<p class="jcarousel-pagination">
</p>
</div>
