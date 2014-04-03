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
				+7 499 <span>476-24-34</span>
			</div>
			<? if ($USER->IsAdmin()): ?>
				<a href="/orders/" class="btn_large">Заказы</a>
			<? else: ?>
				<a href="/feedback/" class="btn_large">Обратная связь</a>
			<? endif ?>
			
			<div class="bskt">
				<?
				$cart = $_SESSION['cart'];
				$cost = 0;
				if ($cart)
					$cost = $cart['cost'];
				?>
				<a id='cart' href="#">
					<div class="cost tooltip" <? if (!$cost) echo 'style="display:none"'; ?>>
						Цена:
						<span class="totalcost"> <? echo $cost; ?></span><? echo GetMessage("GP_DEL_RUB"); ?>
					</div>
				</a>
				<!--a href="" class="icon"></a>
				<p class="text">
					Товаров: 
					<a href="#">3</a>
				</p-->
			</div>
		</header>
		<nav class="navigation_top">
			<ul class="top_menu">
				<?$APPLICATION->IncludeComponent("bitrix:menu", "simpleMenu", array("ROOT_MENU_TYPE" => "top", "MAX_LEVEL" => "1"), false, array("ACTIVE_COMPONENT" => "Y"));?>
			</ul>
		</nav>
		<main>


