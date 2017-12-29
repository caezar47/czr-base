<?

/*
$block_prefix = "products-page__";
$heading_small = "Отправляйте заказы нам через сайт";
$heading_color = "is--calc";
$heading = t($this->post['id']);
*/

foreach($param['order_preset']['fields'] as $field) {
	
	$this->tpl('products/calc/field_' . $field['type'], array(
		'field' => $field,
		'not_bound' => $param['order_preset']['not_bound'][$field['uid']],
	));
	
}

/*
<div class="calc-panel__calc-cols cols  is--cols-12">
	<div class="range-block__block">
		<label class="range-block__row row  is--wrap">
			<div class="cols range-block__cols  is--heading">
				<div class="range-block__heading">Количество:</div>
			</div>
			<div class="cols range-block__cols  is--range">
				<input type="text" id="inputRange" name="" value="" >
			</div>
			<div class="cols range-block__cols  is--range-input">
				<input type="number" step="50" min="50" max="15000" name="" value="500"  class="range-block__input" id="inputRangeinput">
			</div>
		</label>	
	</div> 
</div>
<div class="calc-panel__calc-cols cols">
	<label for="maket" class="btn-link__item  is--icon">
		<input type="file" name="maket" id="maket" class="btn-link__file">
		<div class="btn-link__icon  is--icon">
			<svg class="icon-svg icon-btn-icon-maket" role="img">
				<use xlink:href="<?=$this->path('img');?>/svg/sprite.svg#btn-icon-maket"></use>
			</svg>
		</div>
		<span>Загрузить макет</span>
	</label> 
</div>
*/

?>
