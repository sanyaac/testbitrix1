<?
header("Content-Type: text/html; charset=windows-1251");
require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
CModule::IncludeModule("iblock");

if(isset($_POST["ID"]) AND is_numeric($_POST["ID"])) {
	$ID = $_POST["ID"];
	$result = "";

	$arSortProduct= Array("NAME"=>"ASC");
	$arSelectProduct = Array("ACTIVE", "PROPERTY_PARTNER");
	$arFilterProduct = Array("IBLOCK_ID" => 23, "ID" => $ID);
	
	$resProduct =  CIBlockElement::GetList($arSortProduct, $arFilterProduct, false, false, $arSelectProduct);
	$obProduct = $resProduct->GetNextElement();
	$arFieldsProduct = $obProduct->GetFields();
	$ACTIVE = $arFieldsProduct['ACTIVE'];
	
	$arSortPartner= Array("NAME"=>"ASC");
	$arSelectPartner = Array("PROPERTY_OPERATOR");
	$arFilterPartner = Array("IBLOCK_ID" => 22, "ID" => $arFieldsProduct['PROPERTY_PARTNER_VALUE']);

	$resPartner =  CIBlockElement::GetList($arSortPartner, $arFilterPartner, false, false, $arSelectPartner);
	$obPartner = $resPartner->GetNextElement();
	$arFieldsPartner = $obPartner->GetFields();
	$operator = $arFieldsPartner["PROPERTY_OPERATOR_VALUE"];
	
	// Проверка может ли данный пользователь активировать/деактивировать данный продукт
	if ($operator != $USER->GetID()) {
		echo "AccessDenied";
		return;
	}

	if ($ACTIVE == "Y") {
		$ACTIVE = "N";
		$result = "Активировать";
	} else {
		$ACTIVE = "Y";
		$result = "Деактивировать";
	}
	
	$obEl = new CIBlockElement();
	$boolResult = $obEl->Update($ID,array('ACTIVE' => $ACTIVE));
	
	echo $result;
} else {
	echo "AccessDenied";
}
?>