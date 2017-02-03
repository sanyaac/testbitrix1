<?

class PartnerInfo
{
	public static function onePartner($id)
	{
		if(CModule::IncludeModule('iblock')) {
			$arSortPartner= Array("NAME"=>"ASC");
			$arSelectPartner = Array("ID","NAME", "PROPERTY_OPERATOR");
			$arFilterPartner = Array("IBLOCK_ID" => 22, "PROPERTY_OPERATOR" => $id);
			
			$resPartner =  CIBlockElement::GetList($arSortPartner, $arFilterPartner, false, false, $arSelectPartner);
			$obPartner = $resPartner->GetNextElement();
			$arFieldsPartner = $obPartner->GetFields();
			$idPartner = $arFieldsPartner['ID'];
			
			return $idPartner;
		}
	}
	
	public static function countPartners($id)
	{
		
		if(CModule::IncludeModule('iblock')) {
			$arSortPartner= Array("NAME"=>"ASC");
			$arSelectPartner = Array("ID","NAME", "PROPERTY_OPERATOR");
			$arFilterPartner = Array("IBLOCK_ID" => 22, "PROPERTY_OPERATOR" => $id);
			
			$resPartner =  CIBlockElement::GetList($arSortPartner, $arFilterPartner, false, false, $arSelectPartner);
			$Count = intval($resPartner->SelectedRowsCount());
			return $Count;
		}
	}

}

?>
	
			
		

		
