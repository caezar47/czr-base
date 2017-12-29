<?
	$_prefix = $param["block_prefix"];
	$_mod = $param["block_mod"];	
	$_heading = $param["block_heading"];
	$_headingSmall = $param["block_heading_small"];

	$_id = $param["block_form_id"];
	$_color = $param["block_form_color"];
	$_btnMod = $param["block_btn_mod"];
	$_btnName = $param["block_btn_name"];
?>
<div class="<?=$_prefix;?>panel  <?=$_mod;?>" style="background-image: url(<?=$this->path('img');?>/bg/bg-form-panel.jpg);">
	<?
		//фоновые картинки
		$this->tpl(
			'_/bg', 
			array(
				"block_prefix" => "bg-block__",
				"block_mod" => "is--tube-rs  is--form-left",
				"block_bg" => "bg-tube-rs.png",
			)
		);
		$this->tpl(
			'_/bg', 
			array(
				"block_prefix" => "bg-block__",
				"block_mod" => "is--tube-rs  is--form-right",
				"block_bg" => "bg-tube-rs.png",
			)
		);
	?>
	<div class="container <?=$_prefix;?>container  <?=$_mod;?>">
		<div class="<?=$_prefix;?>panel-inner  <?=$_mod;?>">
			<div class="page-header__block  is--form-panel  is--center  <?=$_color?>">
				<h3 class="page-header__heading  is--form-panel  is--center  <?=$_color?>"><span><?=$_heading;?></span></h3>
				<?if ($_headingSmall != ''){?>	
				<div class="page-header__heading-small  is--form-panel  is--center  <?=$_color?>"><span><?=$_headingSmall;?></span></div>	
				<?}?>
			</div>
			<?
			$this->tpl(
				'_/form/'.$param["block_tpl"], 
				array(
					"block_form_heading" => $param["block_form_heading"],
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
</div> 