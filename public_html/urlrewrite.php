<?
$arUrlRewrite = array(
	array(
		"CONDITION" => "#^/press/([\w-_]+)/.*#",
		"RULE" => "&ELEMENT_CODE=\$1&\$2",
		"ID" => "",
		"PATH" => "/press/index.php",
	),
	array(
		"CONDITION" => "#^/career/([\w-_]+)/.*#",
		"RULE" => "&ELEMENT_CODE=\$1&\$2",
		"ID" => "",
		"PATH" => "/career/index.php",
	),
	array(
		"CONDITION" => "#^/industries/([\w-_]+)/.*#",
		"RULE" => "&ELEMENT_CODE=\$1&\$2",
		"ID" => "",
		"PATH" => "/industries/index.php",
	),
	array(
		"CONDITION" => "#^/catalog/([\w-_]+)/.*#",
		"RULE" => "&ELEMENT_CODE=\$1&\$2",
		"ID" => "",
		"PATH" => "/catalog/index.php",
	),
	array(
		"CONDITION" => "#^/ajax/geography/([\w-_]+)/.*#",
		"RULE" => "&ELEMENT_CODE=\$1&\$2",
		"ID" => "",
		"PATH" => "/ajax/geography/index.php",
	)
);

?>