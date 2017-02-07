<?
/*
You can place here your functions and event handlers

AddEventHandler("module", "EventName", "FunctionName");
function FunctionName(params)
{
	//code
}
*/

CModule::AddAutoloadClasses(
    '', // не указываем имя модуля
    array(
        // ключ - имя класса, значение - путь относительно корня сайта к файлу
        'PartnerInfo'         => '/bitrix/php_interface/my/partner_info.php'
    )
);

?>