<div id="vacancyDetail" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content modal-content--white">
    	<a data-dismiss="modal" href="#" class="close"><?=svg('close')?></a>
    	<div class="vacancy-popup">
		    <div class="success">
		      <h3 class="center">Your application has been submitted successfully.</h3>
		      <p class="center">A representative of our company will contact you shortly. Thank you for applying.</p>
		    </div>
		    <form data-parsley-validate="" enctype="multipart/form-data" class="form visible">
		      <div class="vacancy-popup__sub">Response to the vacancy</div>
		      <h1 class="vacancy-popup__title"><?=$item['NAME']?></h1>	
		      <input type="hidden" name="group_id" value="6">
		      <input type="hidden" name="vacancy" value="">
		    	
		      <input name="name" type="text" required="">
		      <div class="row">
		        <div class="col-sm-6">
		          <label>Your contact phone number <span>*</span></label>
		          <input name="phone" required="" type="text" data-parsley-pattern="/^((8|+7)[- ]?)?((?d{3})?[- ]?)?[d- ]{7,10}/" data-parsley-trigger="change">
		        </div>
		        <div class="col-sm-6">
		          <label>Your email address:</label>
		          <input name="email" type="email">
		        </div>
		      </div>
		      <div class="row">
		        <div class="col-sm-6">
		          <label>Tell us a few words about yourself, please:</label>
		          <textarea name="message"></textarea>
		        </div>
		        <div class="col-sm-6">
		          <div class="row file">
		            <div class="col-xs-6">
		              <label for="file">Please attach your résumé <span>*</span></label>
		            </div>
		            <div class="col-xs-6">
		              <input type="file" name="resume" required="" accept="application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document" class="hidden"><a href="#" class="file-trigger">Upload file</a>
		            </div>
		          </div>
		          <div class="file-name"></div>
		          <div class="file-description">Please note that we accept electronic files in PDF, DOC and DOCX format with the file size not exceeding 5 MB.</div>
		        </div>
		      </div>
		      <div class="form__footer">
		        <div class="row">
		          <div class="col-sm-3 hidden-xs"><span class="required">
		          All fields<br> marked with an asterisk (<span>*</span>) are required.
		          </span></div>
		          <div class="col-xs-12 col-sm-3">
				      <label class="left">Enter this code</label>
				      <?
				        include_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/classes/general/captcha.php");
				        $cpt = new CCaptcha();
				        $cpt->SetCodeLength(4);
				        $cpt->SetCode();
				        $cpt->SetImageSize(110,35);
				        $code=$cpt->GetSID();
				      ?>
				      <div class="captcha" style="background-image:url(/include/captcha.php?captcha_sid=<?=$code?>)"></div>

				      <input type="hidden" name="captcha_code" value="<?=$code?>">
				      <a href="#" class="captcha_refresh">
				        <?=svg('refresh')?>
				      </a>
				  </div>
		          <div class="col-sm-3">
		            <label class="right">into this field</label>
		            <input name="captcha_word" type="text" required="">
		          </div>
		          <div class="col-sm-3">
		            <input type="submit" value="Submit">
		          </div>
		        </div>
		      </div>
		    </form>
		  </div>
    </div>
  </div>
</div>