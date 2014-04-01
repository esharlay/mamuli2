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
	<?$APPLICATION->ShowPanel();?>
	<div class="container">
		<header class="row">
			<a href="/" class="logo"></a>
			<div class="phone">
				+7 499 <span>476-24-34</span>
			</div>
			<a href="/site_po/" class="btn_large">Обратная связь</a>
			<div class="bskt">
				<a href="" class="icon"></a>
				<p class="text">
					Товаров: 
					<a href="#">3</a>
				</p>
			</div>
		</header>
		<nav class="navigation_top">
			<ul class="top_menu">
				<li><a href="#">Главная</a></li>
				<li><a href="#">Меню</a></li>
				<li><a href="#">Организация праздников</a></li>
				<li><a href="#">Отзывы и предложения</a></li>
				<li><a href="#">Контакты</a></li>
			</ul>
		</nav>
		<aside>
			<?$APPLICATION->IncludeFile(
				SITE_DIR."include/left_menu.php",
				Array(),
				Array("MODE"=>"html")
			);?>
			<img src="/img/banner.png" alt="">
		</aside>
		<main>
			<div class="content_menu">
				<div class="navi">
					<dl>
					<?$APPLICATION->IncludeFile(
						SITE_DIR."include/additional_menu.php",
						Array(),
						Array("MODE"=>"html")
					);?>
					</dl>
				</div>
			</div>
			<div class="items_list"> 	<?$APPLICATION->IncludeComponent(
				"bitrix:news.list",
				"productsOnMain",
				Array(
					"IBLOCK_TYPE" => "objects",
					"IBLOCK_ID" => "3",
					"NEWS_COUNT" => "6",
					"SORT_BY1" => "ACTIVE_FROM",
					"SORT_ORDER1" => "DESC",
					"SORT_BY2" => "SORT",
					"SORT_ORDER2" => "ASC",
					"FILTER_NAME" => "",
					"FIELD_CODE" => array(0=>"",1=>"",),
					"PROPERTY_CODE" => array(0=>"PRICE",1=>"",),
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
					"SET_TITLE" => "N",
					"SET_STATUS_404" => "N",
					"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
					"ADD_SECTIONS_CHAIN" => "Y",
					"HIDE_LINK_WHEN_NO_DETAIL" => "N",
					"PARENT_SECTION" => "",
					"PARENT_SECTION_CODE" => "",
					"DISPLAY_TOP_PAGER" => "N",
					"DISPLAY_BOTTOM_PAGER" => "N",
					"PAGER_TITLE" => "Новости",
					"PAGER_SHOW_ALWAYS" => "Y",
					"PAGER_TEMPLATE" => "",
					"PAGER_DESC_NUMBERING" => "N",
					"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
					"PAGER_SHOW_ALL" => "Y",
					"AJAX_OPTION_ADDITIONAL" => "",
				"cart" => $_SESSION["cart"]
					)
				);?> 
			</div>
		</main>
		<div class="clear"></div>
	</div>		
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
		<div id="header">

			<div class="centered">
				<div class="logo">
					<?$APPLICATION->IncludeFile(
						SITE_DIR."include/logo.php",
						Array(),
						Array("MODE"=>"html")
					);?>
				</div>

				<div class="navi ">
					<?$APPLICATION->IncludeComponent("bitrix:menu", "simpleMenu", array("ROOT_MENU_TYPE" => "top", "MAX_LEVEL" => "1"), false, array("ACTIVE_COMPONENT" => "Y"));?>
				</div>
				<? if ($USER->IsAdmin()): ?>
				<div class="admin">
					<a class="togglePanel" href="#panel">Panel</a>
				</div>
				<? endif ?>
				<div class="basket">
					<?
					$cart = $_SESSION['cart'];
					$cost = 0;
					if ($cart)
						$cost = $cart['cost'];
					?>
					<a id='cart' href="#">

						<div class="cost tooltip" <? if (!$cost) echo 'style="display:none"'; ?>>
							<div class="wrapper">

								<p><span class="totalcost"><? echo $cost; ?></span><? echo GetMessage("GP_DEL_RUB"); ?></p>
								<span class="tic"></span>
							</div>
						</div>
					</a>
				</div>

				<div class="contact">
					<?$APPLICATION->IncludeFile(
						SITE_DIR."include/contacts_small.php",
						Array(),
						Array("MODE"=>"html")
					);?>
				</div>
			</div>

		</div>

		<div id="content">


			<div class="navigation <?if ($APPLICATION->GetCurPage() != '/') echo "inner"; ?>">
				<dl>
				<?$APPLICATION->IncludeFile(
						SITE_DIR."include/main_menu.php",
						Array(),
						Array("MODE"=>"html")
					);?>
				<?$APPLICATION->IncludeFile(
						SITE_DIR."include/additional_menu.php",
						Array(),
						Array("MODE"=>"html")
					);?>
				</dl>
			</div>



