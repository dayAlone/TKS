<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle("Опрос");
$APPLICATION->SetPageProperty('body_class', "contacts");?><div class="page__content">
<?$APPLICATION->IncludeComponent(
	"bitrix:voting.form", 
	"vote", 
	array(
		"VOTE_ID" => "1",
		"VOTE_RESULT_TEMPLATE" => "/vote/",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "3600"
	),
	false
);?>
</div>
<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>