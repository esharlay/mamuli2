<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

	 <div class="footer-promo">
		<?
		if ($APPLICATION->GetCurPage() != '/')
		$APPLICATION->IncludeFile(
		SITE_DIR."include/footer_promo.php",
		Array(),
		Array("MODE"=>"html")
		);?>
	 </div>
	 <div class="clear"></div>

	</div>
		<div id="footer">
			<div class="centered">
				<div class="logo"><a href="/"><img src="/img/logo.png" alt=""></a></div>
				<div class="navi">
					<?$APPLICATION->IncludeComponent("bitrix:menu", "simpleMenu", array("ROOT_MENU_TYPE" => "bottom", "MAX_LEVEL" => "1"), false, array("ACTIVE_COMPONENT" => "Y"));?>
				</div>
				<div class="gp"><a href="#"><img src="/img/9009p.png" alt=""></a></div>
			</div>
		</div>
	</div>
	<div class="bg-popup"></div>
</body>
</html>
