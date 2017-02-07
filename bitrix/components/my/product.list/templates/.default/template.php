<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

CUtil::InitJSCore(array('jquery', 'window', 'popup', 'ajax', 'date'));
$APPLICATION->AddHeadScript($this->GetFolder().'/js/func.js');

$this->setFrameMode(true);
$UserID = $USER->GetID();

if($UserID == $arResult["OPERATOR"]) { ?>
	<table width='700' border='0' align='left' cellpadding='0' cellspacing='0'>
<?	foreach($arResult["ITEMS1"] as $arItem):
		if ($arItem["ACTIVE"] == 'Y'){
			$nameButtonActive = "Деактивировать";
		} else {
			$nameButtonActive = "Активировать";
		}
?>		<tr><td><font size=6'><a href='<?=$arParams["DETAIL_PAGE_URL"]?><?=$arItem["ID"]?>'><b><?=$arItem["NAME"]?></b></a></font>
				<td><input type='button' id='a_button<?=$arItem["ID"]?>' style = 'width: 120' value='<?=$nameButtonActive?>' onclick='sendCntAjax(<?=$arItem["ID"]?>);'/>
<?	endforeach; ?>

	</table><br><br>
	<br>Товары:<br>
<?	echo $arResult["RES"]->NavPrint();
} else { ?>
	<font size='20'><b>Доступ запрещен</b></font>
<?}

?>

