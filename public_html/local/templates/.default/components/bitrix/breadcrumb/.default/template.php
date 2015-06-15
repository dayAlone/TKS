<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

//delayed function must return a string
if(empty($arResult))
	return "";
$elements = array();
$num_items = count($arResult);
for($index = 0, $itemSize = $num_items; $index < $itemSize; $index++)
{
	$title = htmlspecialcharsex($arResult[$index]["TITLE"]);
	if(!in_array($title, $elements)):
		if($arResult[$index]["LINK"] <> "" && $index != $itemSize-1)
			$strReturn .= '<a href="'.$arResult[$index]["LINK"].'" title="'.$title.'">'.$title.'</a><span>></span>';
		else
			$strReturn .= '<span>'.$title.'</span></li>';

		$elements[] = $title;
	endif;
}

return $strReturn;
?>