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
	 	<link href='/css/bootstrap.css' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
		<?$APPLICATION->ShowHead();?>
		<title><?$APPLICATION->ShowTitle()?></title>
	</head>
<body>
	<?$APPLICATION->ShowPanel();?>
	<div id="container" class="container">
		<header class="row">
			<div class="col-md-6">
				<a href="/" class="logo"></a>
			</div>
			<div class="col-md-6">
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
			</div>
		</header>
		<!--nav class="row">
			<div class="col-md-12">
				<ul class="top_menu">
					<li><a href="">test</a></li>
					<li><a href="">test</a></li>
					<li><a href="">test</a></li>
					<li><a href="">test</a></li>
					<li><a href="">test</a></li>
				</ul>
			</div>
		</nav-->


		<!--input type="hidden" value="<?=SITE_DIR?>" id="siteRoot">
		<div class="basket-container">
			<?$APPLICATION->IncludeFile(
				SITE_DIR."include/cart.php",
				Array(),
				Array("MODE"=>"html")
				);
			?>
		</div-->
		<!--div id="header">
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

		</div-->

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




