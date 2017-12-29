<?

$user = wp_get_current_user();
//__theme_ed($user);
$profile_data = array(
	'profile_fio' => get_field('profile_fio', $user),
	'profile_image' => $this->Imgs->rawImg(get_field('profile_image', $user), '90x90'),
	'profile_phone' => get_field('profile_phone', $user),
	'profile_email' => get_field('profile_email', $user),
);

?>

<form action="formsave" class="<?=$param["block_form_prefix"];?>block  <?=$param["block_form_mod"];?> azbn__profile__edit-profile-form"  >
	<input type="hidden" name="key" value="londonisthecapitalofgreatbritain">
	<div class="<?=$param["block_form_prefix"];?>inner  <?=$param["block_form_mod"];?>"  >
		<div class="row <?=$param["block_form_prefix"];?>row  is--wrap">
			<div class="cols <?=$param["block_form_prefix"];?>cols  <?=$param["block_form_mod"];?>  is--file">
				<div class="<?=$param["block_form_prefix"];?>item">
					<label for="<?=$param["block_form_id"];?>[file]" class="btn-link__item  is--icon  is--xs">
						<input type="file" id="<?=$param["block_form_id"];?>[file]" class="btn-link__file">
						<div class="btn-link__icon  is--icon  is--xs">
							<svg class="icon-svg icon-btn-icon-maket" role="img">
								<use xlink:href="<?=$this->path('img');?>/svg/sprite.svg#btn-icon-maket"></use>
							</svg>
						</div>
						<span>Загрузить аватар</span>
					</label>
				</div>
			</div>
			<div class="cols <?=$param["block_form_prefix"];?>cols  <?=$param["block_form_mod"];?>  is--name">
				<div class="<?=$param["block_form_prefix"];?>item">
					<input type="text" class="<?=$param["block_form_prefix"];?>control form-control validate[required, custom[onlyLetterSp]]  <?=$param["block_form_color"];?>" id="<?=$param["block_form_id"];?>[name]" name="profile_fio" placeholder="ФИО"  value="<?=$profile_data['profile_fio'];?>">
				</div>	
			</div>
			<div class="cols <?=$param["block_form_prefix"];?>cols  <?=$param["block_form_mod"];?>  is--email">
				<div class="<?=$param["block_form_prefix"];?>item">
					<input type="email" class="<?=$param["block_form_prefix"];?>control form-control validate[required,custom[email]]  <?=$param["block_form_color"];?>  <?=$param["block_form_color"];?>" id="<?=$param["block_form_id"];?>[email]" name="profile_email" placeholder="E-mail" value="<?=$profile_data['profile_email'];?>">
				</div>	
			</div>
			<div class="cols <?=$param["block_form_prefix"];?>cols  <?=$param["block_form_mod"];?>  is--tel">
				<div class="<?=$param["block_form_prefix"];?>item">
					<input type="tel" class="<?=$param["block_form_prefix"];?>control form-control validate[required,custom[phone]]  <?=$param["block_form_color"];?>  <?=$param["block_form_color"];?>" id="<?=$param["block_form_id"];?>[tel]" name="profile_phone" placeholder="Телефон" value="<?=$profile_data['profile_phone'];?>">
				</div>	
			</div>
			<div class="cols <?=$param["block_form_prefix"];?>cols  <?=$param["block_form_mod"];?>  is--pass">
				<div class="<?=$param["block_form_prefix"];?>item">
					<input type="password" class="<?=$param["block_form_prefix"];?>control form-control <?=$param["block_form_color"];?>  <?=$param["block_form_color"];?>" id="<?=$param["block_form_id"];?>[pass]" name="password" placeholder="Новый пароль">
				</div>	
			</div>
			<div class="cols <?=$param["block_form_prefix"];?>cols  <?=$param["block_form_mod"];?>  is--agreement">
				<div class="rect-switch <?=$param["block_form_prefix"];?>item  <?=$param["block_form_color"];?>">
	                <input class="rect-switch__input validate[required]    <?=$param["block_form_color"];?>" id="<?=$param["block_form_id"];?>[processing]" name="<?=$param["block_form_id"];?>[processing]" type="checkbox" checked />
	                <label for="<?=$param["block_form_id"];?>[processing]" class="rect-switch__label    <?=$param["block_form_color"];?>"></label> 
					<label for="<?=$param["block_form_id"];?>[processing]" class="rect-switch__text    <?=$param["block_form_color"];?>"> 
						Я согласен на обработку <a href="<?=l(98);?>">персональных данных</a>
					</label>
	            </div>	
			</div>
			<div class="cols <?=$param["block_form_prefix"];?>cols  <?=$param["block_form_mod"];?>  is--btn">
				<button type="submit" class="btn__item  <?=$param["block_btn_mod"];?>"><span><?=$param["block_btn_name"];?></span></button>
			</div>
		</div>	
	</div> 
</form> 