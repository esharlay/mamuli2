<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

	$caption = date("d.m.Y h:i:s");

	$charset = SITE_CHARSET;
	if ($charset == "windows-1251" || $charset == "Windows-1251"){
		$client = iconv("UTF-8", "cp1251", $_REQUEST["clientname"]);
		$street = iconv("UTF-8", "cp1251", $_REQUEST["street"]);
		$house  = iconv("UTF-8", "cp1251", $_REQUEST["house"]);
		$desc	= iconv("UTF-8", "cp1251", $_REQUEST["description"]);
	}
	else{
		$client = $_REQUEST["clientname"];
		$street = $_REQUEST["street"];
		$house  = $_REQUEST["house"];
		$desc	= $_REQUEST["description"];
	}



	$count  = $_REQUEST["count"];
	$phone	= $_REQUEST["phone"];
	$items	= $_REQUEST["items"];
	$desc	= iconv("UTF-8", "cp1251", $_REQUEST["description"]);
	$action = $_REQUEST["action"];

	$price = 0;
	$counts = array();
	foreach (explode('|', $items) as $item){
		$item = explode('/',$item);
		$ids[] = $item[0];
		$counts[$item[0]] = $item[1];
	}



	//$objects [id] => cost
	CModule::IncludeModule("iblock");
	$products = array();
	$arSelect = Array("ID", "NAME", "PROPRETY_PRICE");
	$arFilter = Array("IBLOCK_ID"=>"#OBJECTS_ID#", "ID" => $ids);
	$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>500), false);
	while($ob = $res->GetNextElement())
	{
		$arFields = $ob->GetFields();
		$arProps  = $ob->GetProperties();

		$objects[$arFields["ID"]] = $arProps["PRICE"]["VALUE"];
		$price += $arProps["PRICE"]["VALUE"] * $counts[$arFields['ID']];

		CIBlockElement::SetPropertyValues($arFields["ID"], "3", $arProps["POPULARITY"]["VALUE"] + 1, "POPULARITY");
	}



	$el = new CIBlockElement;

	$properties = array();
	$properties["CLIENTNAME"] = $client;
	$properties["CLIENTPHONE"] = $phone;
	$properties["CLIENTSTREET"] = $street;
	$properties["CLIENTHOUSE"] = $house;
	$properties["PERSONSCOUNT"] = $count;
	$properties["PRICE"] = $price;
	$properties["ITEMS"] = $items;
	$properties["STATUS"] = 6;

		$objectFields = array(
			"DATE_ACTIVE_FROM"=> date("d.m.Y h:i:s"),
			"IBLOCK_SECTION_ID" => false,
			"IBLOCK_ID"      => "#ORDERS_ID#",
			"PROPERTY_VALUES"=> $properties,
			"NAME"           => $caption,
			"ACTIVE"         => "Y",
			"PREVIEW_TEXT"   => $desc,
		);
		if($id = $el->Add($objectFields)){
			unset($_SESSION['cart']);
			echo "$id";
		}
		else
			echo "Error: ".$el->LAST_ERROR;



require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");?>
