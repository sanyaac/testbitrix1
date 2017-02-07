<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
CModule::IncludeModule("iblock");

$arParams["IBLOCK_TYPE"] = trim($arParams["IBLOCK_TYPE"]);
$arParams["PAR_IBLOCK_TYPE"] = trim($arParams["PAR_IBLOCK_TYPE"]);
if(strlen($arParams["IBLOCK_TYPE"])<=0)
	$arParams["IBLOCK_TYPE"] = "products";
if(strlen($arParams["PAR_IBLOCK_TYPE"])<=0)
	$arParams["PAR_IBLOCK_TYPE"] = "products";
$arParams["IBLOCK_ID"] = trim($arParams["IBLOCK_ID"]);
$arParams["USER_ID"] = trim($arParams["USER_ID"]);
$arParams["PRODUCT_ID"] = trim($arParams["PRODUCT_ID"]);


$arSortProduct = Array("ID"=>"DESC");
$arSelectProduct = Array("NAME", "PROPERTY_PARTNER");
$arFilterProduct = Array("IBLOCK_ID" => $arParams["IBLOCK_ID"], "ID" => $arParams["PRODUCT_ID"]);

$resProduct =  CIBlockElement::GetList($arSortProduct, $arFilterProduct, false, false, $arSelectProduct);
$obProduct = $resProduct->GetNextElement();
$arFieldsProduct = $obProduct->GetFields();

$arResult["ITEMS1"][0]["IDPARTNER"] = $arFieldsProduct['PROPERTY_PARTNER_VALUE'];
$arResult["ITEMS1"][0]["NAME"] = $arFieldsProduct['NAME'];

$arSortPartner= Array("NAME"=>"ASC");
$arSelectPartner = Array("NAME", "PROPERTY_CONTENT", "PROPERTY_DELIVERY_CONDITION", "PROPERTY_OPERATOR");
$arFilterPartner = Array("IBLOCK_ID" => $arParams["PAR_IBLOCK_ID"], "ID" => $arResult["ITEMS1"][0]["IDPARTNER"]);

$resPartner =  CIBlockElement::GetList($arSortPartner, $arFilterPartner, false, false, $arSelectPartner);
$obPartner = $resPartner->GetNextElement();
$arFieldsPartner = $obPartner->GetFields();

$arResult["ITEMS1"][0]["NAMEPARTNER"] = $arFieldsPartner["NAME"];
$arResult["ITEMS1"][0]["CONTENT"] = $arFieldsPartner["PROPERTY_CONTENT_VALUE"];
$arResult["ITEMS1"][0]["DELIVERY"] = $arFieldsPartner["PROPERTY_DELIVERY_CONDITION_VALUE"];
$arResult["ITEMS1"][0]["OPERATOR"] = $arFieldsPartner["PROPERTY_OPERATOR_VALUE"];
		
$this->includeComponentTemplate();
		
?>