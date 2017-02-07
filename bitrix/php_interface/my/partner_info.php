<?

class PartnerInfo
{
	public static function onePartner($id, $blockId)
	{
		if(CModule::IncludeModule('iblock')) {
			$arSortPartner= Array("NAME"=>"ASC");
			$arSelectPartner = Array("ID");
			$arFilterPartner = Array("IBLOCK_ID" => $blockId, "PROPERTY_OPERATOR" => $id);
			
			$resPartner =  CIBlockElement::GetList($arSortPartner, $arFilterPartner, false, false, $arSelectPartner);
			$obPartner = $resPartner->GetNextElement();
			$arFieldsPartner = $obPartner->GetFields();
			$idPartner = $arFieldsPartner['ID'];
			
			return $idPartner;
		}
	}
	
	public static function countPartners($id, $blockId)
	{
		
		if(CModule::IncludeModule('iblock')) {
			$arSortPartner= Array("NAME"=>"ASC");
			$arSelectPartner = Array("ID");
			$arFilterPartner = Array("IBLOCK_ID" => $blockId, "PROPERTY_OPERATOR" => $id);
			
			$resPartner =  CIBlockElement::GetList($arSortPartner, $arFilterPartner, false, false, $arSelectPartner);
			$Count = intval($resPartner->SelectedRowsCount());
			return $Count;
		}
	}

}

?>
	
			
		

		
