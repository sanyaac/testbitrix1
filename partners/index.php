<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
//require($_SERVER["DOCUMENT_ROOT"]."/local/modules/partner_info.php");

//подключим пролог
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
$APPLICATION->SetTitle("Партнерский кабинет");

$UserID = $USER->GetID();

if(!isset($UserID)) { ?>
	<font size='20'><b>Доступ запрещен</b></font > <?
} else {
	if (PartnerInfo::countPartners($UserID, 22) == 0) { // Если  пользователь не является оператором ни у одного партнера
?> 		<font size='20'><b>Доступ запрещен</b></font ><?
	} elseif (PartnerInfo::countPartners($UserID, 22) == 1) { // Если  пользователь является оператором у одного партнера
		$partnerID = PartnerInfo::onePartner($UserID);
	
		$APPLICATION->IncludeComponent("my:product.list","",
		Array(
			"DETAIL_PAGE_URL" => "/partners/product/",
			"DISPLAY_BOTTOM_PAGER" => "Y",
			"DISPLAY_DATE" => "Y",
			"DISPLAY_NAME" => "Y",
			"DISPLAY_PICTURE" => "Y",
			"DISPLAY_PREVIEW_TEXT" => "Y",
			"DISPLAY_TOP_PAGER" => "N",
			"IBLOCK_ID" => "23",
			"IBLOCK_TYPE" => "products",
			"MESSAGE_404" => "",
			"NEWS_COUNT" => "3",
			"PAGER_BASE_LINK_ENABLE" => "N",
			"PAGER_DESC_NUMBERING" => "N",
			"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
			"PAGER_SHOW_ALL" => "N",
			"PAGER_SHOW_ALWAYS" => "N",
			"PAGER_TEMPLATE" => ".default",
			"PAGER_TITLE" => "",
			"PARAM_GET" => "",
			"PARTNER_ID" => $partnerID,
			"PAR_IBLOCK_ID" => "22",
			"PAR_IBLOCK_TYPE" => "partners",
			"SET_STATUS_404" => "N",
			"SHOW_404" => "N"
		));
	} else { // Если  пользователь является оператором у нескольких партнеров
		$APPLICATION->IncludeComponent("my:partner.list","",
		Array(
			"DETAIL_PAGE_URL" => "/partners/products/",
			"DISPLAY_BOTTOM_PAGER" => "Y",
			"DISPLAY_DATE" => "Y",
			"DISPLAY_NAME" => "Y",
			"DISPLAY_PICTURE" => "Y",
			"DISPLAY_PREVIEW_TEXT" => "Y",
			"DISPLAY_TOP_PAGER" => "N",
			"IBLOCK_ID" => "22",
			"IBLOCK_TYPE" => "partners",
			"MESSAGE_404" => "",
			"NEWS_COUNT" => "5",
			"PAGER_BASE_LINK_ENABLE" => "N",
			"PAGER_DESC_NUMBERING" => "N",
			"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
			"PAGER_SHOW_ALL" => "N",
			"PAGER_SHOW_ALWAYS" => "N",
			"PAGER_TEMPLATE" => ".default",
			"PAGER_TITLE" => "",
			"PARAM_GET" => "",
			"SET_STATUS_404" => "N",
			"SHOW_404" => "N",
			"USER_ID" => $UserID
		));
	}	
}

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>