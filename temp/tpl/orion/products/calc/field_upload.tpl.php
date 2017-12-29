<?

?>

<div class="calc-panel__calc-cols cols azbn__calc__field" data-uid="<?=$param['field']['uid'];?>" >
	<form class="azbn__calc__field-form" >
		<a href="#upload" for="<?=$param['field']['uid'];?>" class="btn-link__item  is--notline  is--icon azbn__calc__upload-btn">
			<!--<input type="file" name="<?=$param['field']['uid'];?>" id="<?=$param['field']['uid'];?>" class="btn-link__file">-->
			<div class="btn-link__icon is--notline  is--icon">
				<svg class="icon-svg icon-btn-icon-maket" role="img">
					<use xlink:href="<?=$this->path('img');?>/svg/sprite.svg#btn-icon-maket"></use>
				</svg>
			</div>
			<span class="azbn__calc__field_upload__value" ><?=$param['field']['label'];?></span>
			<small class="btn-link__note">Допустимые форматы .pdf, .ai, .cdr или архив в&nbsp;формате&nbsp;.zip</small>
		</a>
		<div class="calc-panel__calc-note">
			<p>Важно! Макет должен соответствовать нашим <a href="<?=l(32);?>">техническим требованиям</a>.</p>
		</div>
	</form>
</div>
