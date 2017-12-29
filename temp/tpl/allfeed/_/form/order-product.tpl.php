<?
	$_prefix = $param["block_form_prefix"];
	$_heading = $param["block_form_heading"];
	$_product = $param["block_form_product"];
	$_mod = $param["block_form_mod"];
	$_id = $param["block_form_id"];
	$_color = $param["block_form_color"];
	$_btnMod = $param["block_btn_mod"];
	$_btnName = $param["block_btn_name"];
?>
<form action="#" class="<?=$_prefix;?>block  <?=$_mod;?>  azbn7__api__form" >
	<input type="hidden" name="key" value="londonisthecapitalofgreatbritain">
	<input type="hidden" name="f[Форма]" value="<?=$_heading;?>">
	<input type="hidden" name="f[Товар]" value="<?=$_product;?>">
	<div class="<?=$_prefix;?>inner  <?=$_mod;?>"  >
		<div class="row <?=$_prefix;?>row  is--wrap">
			<div class="cols <?=$_prefix;?>cols  <?=$_mod;?>  is--name">
				<div class="<?=$_prefix;?>item">
					<input type="text" class="<?=$_prefix;?>control form-control validate[required, custom[onlyLetterSp]]  <?=$_mod;?>  <?=$_color;?>" id="<?=$_id;?>[name]" name="f[Имя клиента]" placeholder="Ваше имя">
				</div>	
			</div>
			<div class="cols <?=$_prefix;?>cols  <?=$_mod;?>  is--tel">
				<div class="<?=$_prefix;?>item">
					<input type="tel" class="<?=$_prefix;?>control form-control validate[required,custom[phone]]  <?=$_mod;?>  <?=$_color;?>" id="<?=$_id;?>[tel]" name="f[Телефон]" placeholder="Ваш телефон">
				</div>	
			</div>
			<div class="cols <?=$_prefix;?>cols  <?=$_mod;?>  is--email">
				<div class="<?=$_prefix;?>item">
					<input type="email" class="<?=$_prefix;?>control form-control validate[required, custom[email]]  <?=$_mod;?>  <?=$_color;?>" id="<?=$_id;?>[email]" name="f[E-mail]" placeholder="Ваш E-mail">
				</div>	
			</div>
			<div class="cols <?=$_prefix;?>cols  <?=$_mod;?>  is--cols-12  is--agreement">
				<div class="<?=$_prefix;?>item  <?=$_mod;?>  is--switch">
					<div class="<?=$_prefix;?>switch">
		                <input class="<?=$_prefix;?>switch-input validate[required]  <?=$_color;?>" id="<?=$_id;?>[processing]" name="f[Согласие на обработку персональных данных]" type="checkbox" checked />
		                <label for="<?=$_id;?>[processing]" class="<?=$_prefix;?>switch-label  <?=$_color;?>"></label> 
						<label for="<?=$_id;?>[processing]" class="<?=$_prefix;?>switch-text  <?=$_color;?>"> 
							Я согласен на обработку <a href="<?=l(9);?>">персональных данных</a>
						</label>
		            </div>	
	            </div>	
			</div>
			<div class="cols <?=$_prefix;?>cols  <?=$_mod;?>  is--btn">
				<button type="submit" class="btn__item  <?=$_btnMod;?>"><span><?=$_btnName;?></span></button>
			</div>
		</div>	
	</div> 
</form> 