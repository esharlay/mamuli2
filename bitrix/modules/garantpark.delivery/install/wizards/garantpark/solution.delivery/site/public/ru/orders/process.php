<?
//require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

	$skip = false;
	if(! $GLOBALS['USER']->IsAuthorized())
		//неавторизованные
		$skip = true;
	else
		$UserID = intval($GLOBALS['USER']->GetID());

	if (! in_array(1, CUser::GetUserGroup(intval($UserID))))
		//не администраторы
		if (! in_array(5, CUser::GetUserGroup(intval($UserID))))
			//не редакторы
			$skip = true;

	if ($skip){
		echo 'error';
		die();
	}

	CModule::IncludeModule("iblock");

	$el = new CIBlockElement;

	$id = $_REQUEST["id"];
	$action = $_REQUEST["action"];

	$properties = array();
	$properties["STATUS"] = $action;

	$dbEl = CIBlockElement::GetList(Array(), Array("IBLOCK_ID"=>#ORDERS_ID#, "ID"=>$id));
	   if($obEl = $dbEl->GetNextElement())
	   {
			$props = $obEl->GetProperties();
			$properties["CLIENTNAME"] = $props["CLIENTNAME"]["VALUE"];
			$properties["CLIENTPHONE"] = $props["CLIENTPHONE"]["VALUE"];
			$properties["CLIENTSTREET"] = $props["CLIENTSTREET"]["VALUE"];
			$properties["CLIENTHOUSE"] = $props["CLIENTHOUSE"]["VALUE"];
			$properties["PERSONSCOUNT"] = $props["PERSONSCOUNT"]["VALUE"];
			$properties["PRICE"] = $props["PRICE"]["VALUE"];
			$properties["ITEMS"] =$props["ITEMS"]["VALUE"];
	   }

	$res = $el->Update($id, array("PROPERTY_VALUES" => $properties, "ACTIVE"=>"Y"));

	if ($res)
		echo 'ok';
	else
		echo 'error';

//require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");
?>
