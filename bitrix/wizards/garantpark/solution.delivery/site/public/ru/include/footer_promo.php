<div class="row">
	<div class="fixed">
		<?$APPLICATION->IncludeComponent("bitrix:news.list", "promoblocks", array(
			"IBLOCK_TYPE" => "elements",
			"IBLOCK_ID" => "#PROMOBLOCKS_ID#",
			"NEWS_COUNT" => "2",
			"position" => "1",
			"FIELD_CODE" => array(
				0 => "PREVIEW_PICTURE",
			),
			"PROPERTY_CODE" => array(
				0 => "PROMOLINK",
			),
			"SET_TITLE" => "N",
			"DISPLAY_BOTTOM_PAGER" => "N",
			),
			false
		);?>
	</div>
	<div class="animation">
		<?$APPLICATION->IncludeComponent("bitrix:news.list", "promostocks", array(
			"IBLOCK_TYPE" => "elements",
			"IBLOCK_ID" => "#PROMODISCOUNTS_ID#",
			"NEWS_COUNT" => "2",
			"position" => "1",
			"FIELD_CODE" => array(
				0 => "PREVIEW_PICTURE",
				1 => "",
			),
			"PROPERTY_CODE" => array(
				0 => "PROMOLINK"
			),
			"SET_TITLE" => "N",
			"DISPLAY_BOTTOM_PAGER" => "N",
			),
			false
		);?>
	</div>
	<div class="animation">
		<?$APPLICATION->IncludeComponent("bitrix:news.list", "promostocks", array(
			"IBLOCK_TYPE" => "elements",
			"IBLOCK_ID" => "#PROMODISCOUNTS_ID#",
			"NEWS_COUNT" => "2",
			"position" => "2",
			"FIELD_CODE" => array(
				0 => "PREVIEW_PICTURE",
				1 => "",
			),
			"PROPERTY_CODE" => array(
				0 => "PROMOLINK"
			),
			"SET_TITLE" => "N",
			"DISPLAY_BOTTOM_PAGER" => "N",
			),
			false
		);?>
	</div>
</div>
