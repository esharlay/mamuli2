<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>


<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="icon" type="image/ico" href="<?=SITE_TEMPLATE_PATH?>/favicon.ico">
		<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/jquery-1.7.1.min.js"></script>
	 	<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/jquery.bxSlider.min.js"></script>
	 	<script type="text/javascript" src="<?=SITE_DIR?>js/site.js"></script>
	 	<meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />
		<link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
		<?$APPLICATION->ShowHead();?>
		<title><?$APPLICATION->ShowTitle()?></title>
	</head>

<body>
	<div id="container">
		<input type="hidden" value="<?=SITE_DIR?>" id="siteRoot">
		<div class="basket-container">
			<?$APPLICATION->IncludeFile(
				SITE_DIR."include/cart.php",
				Array(),
				Array("MODE"=>"html")
				);
			?>
		</div>
	</div>	
	<?$APPLICATION->ShowPanel();?>
	<div class="container">
		<header class="row">
			<a href="/" class="logo"></a>
			<div class="phone">
				+7 498 <span>305-53-23</span>
			</div>
			<? if ($USER->IsAdmin()): ?>
				<a href="/orders/" class="btn_large">Заказы</a>
			<? else: ?>
				<a href="/contacts/" class="btn_large">Обратная связь</a>
			<? endif ?>
			
			<div class="bskt">
				<?
				$cart = $_SESSION['cart'];
				$cost = 0;
				$count = 0;
				if ($cart)
					$cost = $cart['cost'];
					$count = $cart['count'];
				?>
				<a id='cart' href="#">
					<div class="cost tooltip" <? if (!$cost) echo 'style="display:none"'; ?>>
						Цена :
						<span class="totalcost"><? echo $cost; ?></span><? echo GetMessage("GP_DEL_RUB"); ?>
						<br>
						Товаров: <span class="counter"><? echo $count; ?></span>
					</div>
				</a>
			</div>
		</header>
		<nav class="navigation_top">
			<ul class="top_menu">
				<?$APPLICATION->IncludeComponent("bitrix:menu", "simpleMenu", array("ROOT_MENU_TYPE" => "top", "MAX_LEVEL" => "1"), false, array("ACTIVE_COMPONENT" => "Y"));?>
			</ul>
		</nav>
		<aside>
			<?$APPLICATION->IncludeFile(
				SITE_DIR."include/left_menu.php",
				Array(),
				Array("MODE"=>"html")
			);?>
			<?$APPLICATION->IncludeComponent("bitrix:news.list", "banner_left", array(
				"IBLOCK_TYPE" => "elements",
				"IBLOCK_ID" => "1",
				"NEWS_COUNT" => "20",
				"SORT_BY1" => "ACTIVE_FROM",
				"SORT_ORDER1" => "DESC",
				"SORT_BY2" => "SORT",
				"SORT_ORDER2" => "ASC",
				"FILTER_NAME" => "arrFilter",
				"FIELD_CODE" => array(
					0 => "",
					1 => "",
				),
				"PROPERTY_CODE" => array(
					0 => "",
					1 => "",
				),
				"CHECK_DATES" => "Y",
				"DETAIL_URL" => "",
				"AJAX_MODE" => "N",
				"AJAX_OPTION_JUMP" => "N",
				"AJAX_OPTION_STYLE" => "Y",
				"AJAX_OPTION_HISTORY" => "N",
				"CACHE_TYPE" => "A",
				"CACHE_TIME" => "36000000",
				"CACHE_FILTER" => "N",
				"CACHE_GROUPS" => "Y",
				"PREVIEW_TRUNCATE_LEN" => "",
				"ACTIVE_DATE_FORMAT" => "d.m.Y",
				"SET_TITLE" => "Y",
				"SET_STATUS_404" => "N",
				"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
				"ADD_SECTIONS_CHAIN" => "N",
				"HIDE_LINK_WHEN_NO_DETAIL" => "N",
				"PARENT_SECTION" => "",
				"PARENT_SECTION_CODE" => "",
				"INCLUDE_SUBSECTIONS" => "Y",
				"PAGER_TEMPLATE" => ".default",
				"DISPLAY_TOP_PAGER" => "N",
				"DISPLAY_BOTTOM_PAGER" => "Y",
				"PAGER_TITLE" => "Товары",
				"PAGER_SHOW_ALWAYS" => "Y",
				"PAGER_DESC_NUMBERING" => "N",
				"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
				"PAGER_SHOW_ALL" => "Y",
				"AJAX_OPTION_ADDITIONAL" => ""
				),
				false
			);?>
		</aside>
		<main>