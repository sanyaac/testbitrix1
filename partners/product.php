<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Продукты");

// ID текущего пользователя
$UserID = $USER->GetID();


if(!isset($UserID)) { ?>
	<font size='20'><b>Доступ запрещен</b></font >
<?}

//Проверем, что ID товара передан, ID - целое число и что пользователь залогинился
if (isset($_GET["idpro"]) AND is_numeric($_GET["idpro"])  AND isset($UserID)) {
	
	$APPLICATION->IncludeComponent("my:detailsproduct","",
		Array(
			"DISPLAY_BOTTOM_PAGER" => "Y",
			"DISPLAY_DATE" => "Y",
			"DISPLAY_NAME" => "Y",
			"DISPLAY_PICTURE" => "Y",
			"DISPLAY_PREVIEW_TEXT" => "Y",
			"DISPLAY_TOP_PAGER" => "N",
			"IBLOCK_ID" => "23",
			"IBLOCK_TYPE" => "products",
			"MESSAGE_404" => "",
			"PAGER_BASE_LINK_ENABLE" => "N",
			"PAGER_DESC_NUMBERING" => "N",
			"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
			"PAGER_SHOW_ALL" => "N",
			"PAGER_SHOW_ALWAYS" => "N",
			"PAGER_TEMPLATE" => ".default",
			"PAGER_TITLE" => "",
			"PAR_IBLOCK_ID" => "22",
			"PAR_IBLOCK_TYPE" => "partners",
			"PRODUCT_ID" => $_GET["idpro"],
			"SET_STATUS_404" => "N",
			"SHOW_404" => "N",
			"USER_ID" => $UserID
	));
}
//Проверем, что ID партнера передан, ID - целое число и что пользователь залогинился
if (isset($_GET["idpar"]) AND is_numeric($_GET["idpar"]) AND isset($UserID)) {
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
			"PARTNER_ID" => $_GET["idpar"],
			"PAR_IBLOCK_ID" => "22",
			"PAR_IBLOCK_TYPE" => "partners",
			"SET_STATUS_404" => "N",
			"SHOW_404" => "N"
		));
}

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>