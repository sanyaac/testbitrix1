<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$this->setFrameMode(true);

foreach($arResult["ITEMS1"] as $arItem):
   echo "<br><font size=5'><a href='".$arParams["DETAIL_PAGE_URL"]."?".$arParams["PARAM_GET"]."=".$arItem["ID"]."'><b>".$arItem["NAME"]."</b></a><br>";
endforeach;

echo "<br>Партнеры:<br>";
echo $arResult["RES"]->NavPrint();

?>
