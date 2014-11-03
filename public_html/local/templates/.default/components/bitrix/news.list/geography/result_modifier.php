<?
	foreach ($arResult['ITEMS'] as &$item):
		$item["PROPS"] = array();
		$props = &$item["PROPS"];
		foreach ($item["PROPERTIES"] as $key => $prop):
			if(strlen($prop["VALUE"])>0)
				$props[$prop["CODE"]] = $prop["VALUE"];
		endforeach;

	endforeach;
	
?>