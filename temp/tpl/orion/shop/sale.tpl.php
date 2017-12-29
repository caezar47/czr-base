<?

if($param['profile_data']['profile_auto_discount'] == 1) {
	
	$diff = $param['discount_next__value'] - $param['profile_data']['all_orders__sum'];
	
	?>
	
	<div class="<?=$param["block_prefix"];?>block ">
		<div class="<?=$param["block_prefix"];?>icon">
			<svg class="icon-svg icon-icon-round-sale" role="img"><use xlink:href="<?=$this->path('img');?>/svg/sprite.svg#icon-round-sale"></use></svg>
		</div>
		<div class="<?=$param["block_prefix"];?>heading">
			Накопленная сумма покупок: <span class="<?=$param["block_prefix"];?>heading-sum"><?=$param['profile_data']['all_orders__sum'];?></span> <span class="<?=$param["block_prefix"];?>heading-ruble"><svg class="icon-svg icon-ruble" role="img"><use xlink:href="<?=$this->path('img');?>/svg/sprite.svg#ruble"></use></svg></span>
		</div>
		<?
		if($diff > 0) {
		?>
		<div class="<?=$param["block_prefix"];?>heading-small">
		Для скидки <?=$param['discount_next__percent'];?>% не хватает <?=number_format($diff, 0, '.', ' ');?> <span class="<?=$param["block_prefix"];?>heading-small-ruble"><svg class="icon-svg icon-ruble" role="img"><use xlink:href="<?=$this->path('img');?>/svg/sprite.svg#ruble"></use></svg></span>
		</div>
		<?
		}
		?>
	</div>
	
	<?
	
} else {
	?>
	
	<div class="<?=$param["block_prefix"];?>block ">
		
	</div>
	
	<?
}

?>