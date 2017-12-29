<?
	$__prefix = $param["block_prefix"];
	$__mod = $param["block_mod"];	
	$__heading = $param["block_heading"];
	$__headingSmall = $param["block_heading_small"];

	$_id = $param["block_form_id"];
	$__color = $param["block_form_color"];
	$_btnMod = $param["block_btn_mod"];
	$_btnName = $param["block_btn_name"];
?>

<div class="<?=$__prefix;?>panel  <?=$__mod;?>">
	<div class="<?=$__prefix;?>panel-inner  <?=$__mod;?>">
		<div class="page-header__block  is--form-panel  is--center  <?=$__color?>">
			<h3 class="page-header__heading  is--form-panel  is--center  <?=$__color?>"><span><?=$__heading;?></span></h3>
			<?if ($__headingSmall != ''){?>	
			<div class="page-header__heading-small  is--form-panel  is--center  <?=$__color?>"><span><?=$__headingSmall;?></span></div>	
			<?}?>
		</div>
		<?
		$this->tpl(
			'_/form/'.$param["block_tpl"], 
			array(
				"block_form_heading" => $param["block_form_heading"],
				"block_form_product" => $param["block_form_product"],
				"block_form_prefix" => $param["block_form_prefix"],
				"block_form_mod" => $param["block_form_mod"],
				"block_form_color" => $param["block_form_color"],
				"block_form_id" => $param["block_form_id"],
				"block_btn_name" => $param["block_btn_name"],
				"block_btn_mod" => $param["block_btn_mod"],
			)
		);
		?>
	</div> 
</div> 