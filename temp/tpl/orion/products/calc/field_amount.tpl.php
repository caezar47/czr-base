<?

?>

<div class="calc-panel__calc-cols cols  is--cols-12 azbn__calc__field" data-uid="<?=$param['field']['uid'];?>" >
	<form class="azbn__calc__field-form" >
		<div class="range-block__block">
			<label class="range-block__row row  is--wrap">
				<div class="cols range-block__cols  is--heading">
					<div class="range-block__heading"><?=$param['field']['label'];?>:</div>
				</div>
				<div class="cols range-block__cols  is--range">
					<input type="text" id="inputRange" name="<?=$param['field']['uid'];?>" value="<?=$param['field']['value'];?>" >
				</div>
				<div class="cols range-block__cols  is--range-input">
					<input type="number" step="<?=$param['field']['values']['step'];?>" min="<?=$param['field']['values']['min'];?>" max="<?=$param['field']['values']['max'];?>" name="<?=$param['field']['uid'];?>" value="<?=$param['field']['value'];?>"  class="range-block__input" id="inputRangeinput">
				</div>
			</label>	
		</div>
	</form>
</div>