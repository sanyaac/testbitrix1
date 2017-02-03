<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
CModule::IncludeModule("iblock");

$arParams["IBLOCK_TYPE"] = trim($arParams["IBLOCK_TYPE"]);
if(strlen($arParams["IBLOCK_TYPE"])<=0)
	$arParams["IBLOCK_TYPE"] = "products";
$arParams["IBLOCK_ID"] = trim($arParams["IBLOCK_ID"]);
$arParams["USER_ID"] = trim($arParams["USER_ID"]);
$arParams["PARAM_GET"] = trim($arParams["PARAM_GET"]);
$arParams["DETAIL_PAGE_URL"] = trim($arParams["DETAIL_PAGE_URL"]);

$arParams["NEWS_COUNT"] = intval($arParams["NEWS_COUNT"]);
if($arParams["NEWS_COUNT"]<=0)
	$arParams["NEWS_COUNT"] = 20;

$i = 0;		
		
$arSortPartner= Array("ID"=>"DESC");
$arSelectPartner = Array("ID","NAME", "PROPERTY_OPERATOR");
$arFilterPartner = Array("IBLOCK_ID" => $arParams["IBLOCK_ID"], "PROPERTY_OPERATOR" => $arParams["USER_ID"]);

$resPartner =  CIBlockElement::GetList($arSortPartner, $arFilterPartner, false, Array("nPageSize"=>$arParams["NEWS_COUNT"]), $arSelectPartner);

$resPartner->NavStart(0);
while($obPartner = $resPartner->GetNextElement()) {
	$arFieldsPartner = $obPartner->GetFields();
	$arResult["ITEMS1"][$i]["ID"] = $arFieldsPartner['ID'];
	$arResult["ITEMS1"][$i]["NAME"] = $arFieldsPartner['NAME'];
	$i++;
}

$arResult["RES"] = $resPartner;
			
$this->includeComponentTemplate();
		



?>