<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
CModule::IncludeModule("iblock");

$arParams["IBLOCK_TYPE"] = trim($arParams["IBLOCK_TYPE"]);
if(strlen($arParams["IBLOCK_TYPE"])<=0)
	$arParams["IBLOCK_TYPE"] = "products";
$arParams["IBLOCK_ID"] = trim($arParams["IBLOCK_ID"]);
$arParams["PARTNER_ID"] = trim($arParams["PARTNER_ID"]);
$arParams["PARAM_GET"] = trim($arParams["PARAM_GET"]);
$arParams["DETAIL_PAGE_URL"] = trim($arParams["DETAIL_PAGE_URL"]);

$arParams["NEWS_COUNT"] = intval($arParams["NEWS_COUNT"]);
if($arParams["NEWS_COUNT"]<=0)
	$arParams["NEWS_COUNT"] = 20;

$i = 0;		
		
$arSortProduct= Array("ID"=>"DESC");
$arSelectProduct = Array("ID","NAME", "PROPERTY_PARTNER","ACTIVE");
$arFilterProduct = Array("IBLOCK_ID" => $arParams["IBLOCK_ID"], "PROPERTY_PARTNER" => $arParams["PARTNER_ID"]);

$resProduct =  CIBlockElement::GetList($arSortProduct, $arFilterProduct, false, Array("nPageSize"=>$arParams["NEWS_COUNT"]), $arSelectProduct);

$resProduct->NavStart(0);
while($obProduct = $resProduct->GetNextElement()) {
	$arFieldsProduct = $obProduct->GetFields();
	$arResult["ITEMS1"][$i]["ID"] = $arFieldsProduct['ID'];
	$arResult["ITEMS1"][$i]["NAME"] = $arFieldsProduct['NAME'];
	$arResult["ITEMS1"][$i]["ACTIVE"] = $arFieldsProduct['ACTIVE'];
	$i++;
}

$arResult["RES"] = $resProduct;

$arSortPartner= Array("NAME"=>"ASC");
$arSelectPartner = Array("PROPERTY_OPERATOR");
$arFilterPartner = Array("IBLOCK_ID" => $arParams["PAR_IBLOCK_ID"], "ID" => $arParams["PARTNER_ID"]);

$resPartner =  CIBlockElement::GetList($arSortPartner, $arFilterPartner, false, false, $arSelectPartner);
$obPartner = $resPartner->GetNextElement();
$arFieldsPartner = $obPartner->GetFields();
$arResult["OPERATOR"] = $arFieldsPartner["PROPERTY_OPERATOR_VALUE"];

			
$this->includeComponentTemplate();
		



?>