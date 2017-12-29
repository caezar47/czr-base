<form action="<?=l(313);?>" method="POST" class="<?=$param["block_prefix"];?>block  <?=$param["block_mod"];?>  is--enter"  > 
	<input type="hidden" name="key" value="londonisthecapitalofgreatbritain">
	<input type="hidden" name="action" value="is_reg">
	<div class="<?=$param["block_prefix"];?>inner  <?=$param["block_mod"];?>"  >
		<div class="row <?=$param["block_prefix"];?>row  is--wrap">
			<div class="cols <?=$param["block_prefix"];?>cols  <?=$param["block_mod"];?>  is--name">
				<div class="<?=$param["block_prefix"];?>item">
					<input type="text" class="<?=$param["block_prefix"];?>control form-control validate[required]  <?=$param["block_mod"];?>  {{form_color}}" id="<?=$param["block_id"];?>[fio]" name="profile_fio" placeholder="Ваше имя">
				</div>	
			</div>
			<div class="cols <?=$param["block_prefix"];?>cols  <?=$param["block_mod"];?>  is--email">
				<div class="<?=$param["block_prefix"];?>item">
					<input type="email" class="<?=$param["block_prefix"];?>control form-control validate[required,custom[email]] azbn__profile__email-exists <?=$param["block_mod"];?>  {{form_color}}" id="<?=$param["block_id"];?>[email]" name="user_email" placeholder="E-mail">
				</div>	
			</div>
			<div class="cols <?=$param["block_prefix"];?>cols  <?=$param["block_mod"];?>  is--tel">
				<div class="<?=$param["block_prefix"];?>item">
					<input type="tel" class="<?=$param["block_prefix"];?>control form-control validate[required,custom[phone]]  <?=$param["block_mod"];?>" id="<?=$param["block_id"];?>[tel]" name="profile_phone" placeholder="Телефон">
				</div>	
			</div>
			<div class="cols <?=$param["block_prefix"];?>cols  <?=$param["block_mod"];?>  is--pass">
				<div class="<?=$param["block_prefix"];?>item">
					<input type="password" class="<?=$param["block_prefix"];?>control form-control validate[required]  <?=$param["block_mod"];?>" id="<?=$param["block_id"];?>[pass]" name="user_password" placeholder="Пароль">
				</div>	
			</div>
			<div class="cols <?=$param["block_prefix"];?>cols  <?=$param["block_mod"];?>  is--agreement azbn__profile__can-reg azbn__calc__display-none">
				<div class="rect-switch <?=$param["block_prefix"];?>item  <?=$param["block_mod"];?>">
					<input class="rect-switch__input validate[required]" id="<?=$param["block_id"];?>[processing]" name="<?=$param["block_id"];?>[processing]" type="checkbox" checked />
					<label for="<?=$param["block_id"];?>[processing]" class="rect-switch__label"></label> 
					<label for="<?=$param["block_id"];?>[processing]" class="rect-switch__text"> 
						Я согласен на обработку <a href="<?=l(98);?>">персональных данных</a>
					</label>
				</div>	
			</div>
			<div class="cols <?=$param["block_prefix"];?>cols  <?=$param["block_mod"];?>  is--btn azbn__profile__can-reg azbn__calc__display-none">
				<button type="submit" class="btn__item  is--form"><span><?=$param["block_btn"];?></span></button>
			</div>
		</div>	
	</div> 
</form>