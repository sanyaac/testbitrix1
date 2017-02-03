<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$this->setFrameMode(true);

// Проверка на то, что пользователь является оператором партнера этого товара
if ($arParams["USER_ID"] == $arResult["ITEMS1"][0]["OPERATOR"]) {
		
	//Вывод таблицы с информацией о товаре
	echo "<table width='700' border='0' align='left' cellpadding='0' cellspacing='0'>
			<tr><td><font size=4'>Наименование товара:</font>
			<td width='480'><font size=4'>".$arResult["ITEMS1"][0]["NAME"]."</font>
			<tr><td><font size=4'>Партнер:</font>
			<td><font size=4'>".$arResult["ITEMS1"][0]["NAMEPARTNER"]."</font>
			<tr><td><font size=4'>Описание:</font>
			<td><font size=4'>".$arResult["ITEMS1"][0]["CONTENT"]."</font>
			<tr><td><font size=4'>Условия доставки:</font>
			<td><font size=4'>".$arResult["ITEMS1"][0]["DELIVERY"]."</font>
			</table><br>";
} else {
	echo "<font size='20'><b>Доступ запрещен</b></font >";
}
?>
