<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if (!empty($arResult["ERROR_MESSAGE"])): 
?>
<div class="vote-note-box vote-note-error">
	<div class="vote-note-box-text"><?=ShowError($arResult["ERROR_MESSAGE"])?></div>
</div>
<?
endif;

if (!empty($arResult["OK_MESSAGE"])): 
?>
<h2>Благодарим Вас за уделенное время! <br>Ваше мнение очень важно для нас!</h2>
<script>
	$(function(){
		$.cookie('vote_success', 'Y', { expires: 30, path: '/' });
	});
</script>
<?
else:?>
<?
if (empty($arResult["VOTE"])):
	return false;
elseif (empty($arResult["QUESTIONS"])):
	return true;
endif;

?>
<h2>Уважаемый Клиент!</h2>
<p>
	 Промышленный холдинг ТКС уделяет большое внимание развитию партнерских отношений и постоянно совершенствует качество оказываемых услуг. Ваше мнение очень важно для нас и является определяющим фактором в совершенствовании сервиса и решений, предоставляемых компанией, и формировании комфортных условий для взаимовыгодного сотрудничества.
</p>
<p>
	 Пожалуйста, заполните предлагаемую ниже анкету:<br>
		<span style="opacity:.7">(1 - означает минимальную оценку удовлетворенности, 5 – максимальную оценку).</span>
</p>
<form action="<?=POST_FORM_ACTION_URI?>" method="post" class="vote" data-parsley-validate>
	<input type="hidden" name="vote" value="Y">
	<input type="hidden" name="PUBLIC_VOTE_ID" value="<?=$arResult["VOTE"]["ID"]?>">
	<input type="hidden" name="VOTE_ID" value="<?=$arResult["VOTE"]["ID"]?>">
	<?=bitrix_sessid_post()?>
	<div class="vote__title">
		<div class="row ">
			<div class="col-xs-6 col-xs-push-6 col-sm-8 col-sm-push-4 col-lg-9 col-lg-push-3">
				 Критерий
			</div>
			<div class="col-xs-6 col-xs-pull-6 col-sm-4 col-sm-pull-8 col-lg-3 col-lg-pull-9">
				Оценка
			</div>
		</div>
	</div>
	<?
	$iCount = 0;
	foreach ($arResult["QUESTIONS"] as $arQuestion):
		$iCount++;
		$first = array_values($arQuestion["ANSWERS"]);
		switch ($first[0]["FIELD_TYPE"]):
			case 0:
			?>
			<div class="vote__question">
				<div class="row ">
					<div class="col-xs-6 col-xs-push-6 col-sm-8 col-sm-push-4 col-lg-9 col-lg-push-3">
						<div class="vote__text">
							<?=$arQuestion["QUESTION"]?>
						</div>
					</div>
					<div class="col-xs-6 col-xs-pull-6 col-sm-4 col-sm-pull-8 col-lg-3 col-lg-pull-9">
						<div class="vote__input-frame">
							<? 
							$iCountAnswers = 0;
							foreach ($arQuestion["ANSWERS"] as $arAnswer): 
								$value=(isset($_REQUEST['vote_radio_'.$arAnswer["QUESTION_ID"]]) && $_REQUEST['vote_radio_'.$arAnswer["QUESTION_ID"]] == $arAnswer["ID"]) ? 'checked="checked"' : '';
								?>
								<input type="radio" <?=$value?> name="vote_radio_<?=$arAnswer["QUESTION_ID"]?>" <?
								?>id="vote_radio_<?=$arAnswer["QUESTION_ID"]?>_<?=$arAnswer["ID"]?>" <?
								?>value="<?=$arAnswer["ID"]?>" <?=$arAnswer["~FIELD_PARAM"]?> class="vote__input" <?=($iCountAnswers==0?"required":"")?> data-parsley-required-message="Вы не ответили на вопрос"/>
							<?
							$iCountAnswers++;
							endforeach;?>
							<? foreach ($arQuestion["ANSWERS"] as $arAnswer):?>
								<label class="vote__label" for="vote_radio_<?=$arAnswer["QUESTION_ID"]?>_<?=$arAnswer["ID"]?>"><?=$arAnswer["MESSAGE"]?></label>
							<?endforeach;?>
						</div>
					</div>
				</div>
			</div>
			<?
			break;
			case 5:
				$value = isset($_REQUEST['vote_field_'.$arAnswer["ID"]]) ? htmlspecialcharsbx($_REQUEST['vote_field_'.$arAnswer["ID"]]) : '';
				?>
				<div class="vote__text xl-margin-top">
					<?=$arQuestion["QUESTION"]?>
				</div>
		 		<textarea class="vote__textarea" rows="7" name="vote_memo_<?=$arAnswer["ID"]?>" id="vote_memo_<?=$arAnswer["ID"]?>" <?
								?><?=$arAnswer["~FIELD_PARAM"]?> cols="<?=$arAnswer["FIELD_WIDTH"]?>" <?
							?>><?=$value?></textarea>
				<?
			break;
		endswitch;
	endforeach;
?>

<div class="right s-margin-top xxl-margin-bottom">
 	<input type="submit" class="vote__submit" value="Отправить" name="vote">
</div>
</form>
<?endif;?>