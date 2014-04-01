
<div class="main">
  <div class="l-col">
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
	</div>

    <div class="row">

      <div class="fixed inner">
        <?$APPLICATION->IncludeComponent("bitrix:news.list", "promoblocks", array(
			"IBLOCK_TYPE" => "elements",
			"IBLOCK_ID" => "#PROMOBLOCKS_ID#",
			"NEWS_COUNT" => "2",
			"position" => "2",
			"FIELD_CODE" => array(
				0 => "PREVIEW_PICTURE",
				1 => "",
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

      <div class="animation inner">
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
				0 => "PROMOLINK",
			),
			"SET_TITLE" => "N",
			"DISPLAY_BOTTOM_PAGER" => "N",
			),
			false
		);?>
     		</div>
   	</div>

</div>
  <div class="r-col">
    <div class="step"> 			<dl> 				<dt>
          <p class="number">1</p>

          <p class="text">Бесплатная доставка при заказе от 600 рублей</p>
         				</dt>								 				<dt>
          <p class="number">2</p>

          <p class="text">Прием заказов с 10:00 до 19:00</p>
         				</dt>								 				<dt class="last">
          <p class="number">3</p>

          <p class="text">Скидка 10% на следующие заказы</p>
         				</dt> 			</dl> 		</div>
   	</div>

  <div class="clear"></div>
 </div>
