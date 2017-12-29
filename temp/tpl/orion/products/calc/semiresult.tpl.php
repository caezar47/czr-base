<?

/*
$block_prefix = "products-page__";
$heading_small = "Отправляйте заказы нам через сайт";
$heading_color = "is--calc";
$heading = t($this->post['id']);
*/

?>

<h4 class="calc-result__heading">Параметры заказа</h4>
<div class="calc-result__type"><?=t($this->post['id']);?></div>
<div class="calc-result__text-block text__block">
	<ul class="azbn__calc__semiresult" >
		
		<?
		foreach($param['order_preset']['fields'] as $field) {
		
		?>
		<li class="azbn__calc__semiresult__item azbn__calc__display-none" data-uid="<?=$field['uid'];?>" >
			<b class="__title" ><?=$field['title'];?>:</b> <span class="__visible-value" ></span>
			<button class="btn__item  is--del azbn__calc__semiresult__item__reset-btn" type="button" title="Сбросить параметр"><svg class="icon-svg icon-modal-close" role="img">
				<use xlink:href="<?=$this->path('img');?>/svg/sprite.svg#modal-close"></use>
			</svg></button>
		</li>
		<?
		
		}
		/*
		<li><b>Размер:</b> <span>90*50</span></li>
		<li><b>Тип печати:</b> <span>1-сторонняя</span></li>
		<li><b>Количество:</b> <span>500</span></li>
		<li><b>Отделка:</b> <span>Лакирование</span></li>
		<li><b>Макет:</b> <span>Нет</span></li>
		*/
		?>
		
	</ul>
</div>

<div class="calc-result__cost azbn__calc__cost">
	Цена: 
	<span class="calc-result__cost-num azbn__calc__sum_final_triad">0</span>
	<span class="calc-result__cost-ruble">
		<svg class="icon-svg icon-ruble" role="img">
			<use xlink:href="<?=$this->path('img');?>/svg/sprite.svg#ruble"></use>
		</svg>
	</span>
</div>

<div class="calc-result__basket">
	<form class="azbn__calc__result" >
		
		<input type="hidden" class="azbn__calc__result__item" name="o[product_id]" value="<?=$this->post['id'];?>" />
		<input type="hidden" class="azbn__calc__result__item" name="o[product_title]" value="<?=t($this->post['id']);?>" />
		<input type="hidden" class="azbn__calc__result__item" name="o[sum]" value="0" />
		<input type="hidden" class="azbn__calc__result__item" name="o[markup]" value="<?=$param['order_preset']['markup'];?>" />
		<input type="hidden" class="azbn__calc__result__item" name="o[discount]" value="<?=intval(get_user_meta($this->Cart->user->data->ID, 'profile_discount', true));?>" />
		<input type="hidden" class="azbn__calc__result__item" name="o[preset_id]" value="<?=get_field('crm__preset_id', $this->post['id']);?>" />
		
		<?
		foreach($param['order_preset']['fields'] as $field) {
		
		?>
		<input type="hidden" class="azbn__calc__result__item" name="o[field][<?=$field['uid'];?>]" value="<?=$field['value'];?>" />
		<?
		
		}
		/*
		<li><b>Размер:</b> <span>90*50</span></li>
		<li><b>Тип печати:</b> <span>1-сторонняя</span></li>
		<li><b>Количество:</b> <span>500</span></li>
		<li><b>Отделка:</b> <span>Лакирование</span></li>
		<li><b>Макет:</b> <span>Нет</span></li>
		*/
		?>
	</form>
	<button type="button" class="btn__item is--bg  is--calc-result azbn__calc__create-order-btn" ><span>Добавить в корзину</span></button><!--data-toggle="modal" data-target="#modal-basket"-->
</div>
<div class="calc-result__buy">
	<button type="button" class="btn__item is--calc-result" data-toggle="modal" data-target="#modal-buy"><span>Купить в 1 клик</span></button>
</div>