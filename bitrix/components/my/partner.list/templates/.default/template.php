<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$this->setFrameMode(true);

foreach($arResult["ITEMS1"] as $arItem): ?>
   <br><font size=5'><a href='<?=$arParams["DETAIL_PAGE_URL"]?><?=$arItem["ID"]?>'><b><?=$arItem["NAME"]?></b></a><br>

<?endforeach; ?>

<br>Партнеры:<br>

<?echo $arResult["RES"]->NavPrint();

?>

