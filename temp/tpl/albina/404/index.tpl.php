<?
	$bg_prefix="bg-block__";
	$block_prefix="error-page__";
	$heading_prefix="page-header__";
	$heading_mod="is--heading  is--pink  is--404";
	$heading="Страница не найдена";
?>
<div class="content-block <?=$block_prefix;?>content-block  <?=$bg_prefix;?>block" role="main">	
	<?
		//фоновые картинки
		$this->tpl(
			'_/bg', 
			array(
				"block_prefix" => "bg-block__",
				"block_mod" => "is--tube-leaf  is--404",
				"block_bg" => "bg-tube-leaf.png",
			)
		);
		$this->tpl(
			'_/bg', 
			array(
				"block_prefix" => "bg-block__",
				"block_mod" => "is--cream-leaf  is--404",
				"block_bg" => "bg-cream-leaf.png",
			)
		);
		$this->tpl(
			'_/bg', 
			array(
				"block_prefix" => "bg-block__",
				"block_mod" => "is--cream-box  is--404",
				"block_bg" => "bg-cream-box.png",
			)
		);
		$this->tpl(
			'_/bg', 
			array(
				"block_prefix" => "bg-block__",
				"block_mod" => "is--flover-rose  is--404",
				"block_bg" => "bg-flover-rose.png",
			)
		);
		$this->tpl(
			'_/bg', 
			array(
				"block_prefix" => "bg-block__",
				"block_mod" => "is--syringes-one  is--404",
				"block_bg" => "bg-syringes-one.png",
			)
		);
		$this->tpl(
			'_/bg', 
			array(
				"block_prefix" => "bg-block__",
				"block_mod" => "is--404-preview",
				"block_bg" => "bg-404.png",
			)
		);
	?>
	<div class="<?=$block_prefix;?>note">		
		<div class="<?=$heading_prefix;?>block  <?=$heading_mod;?>">
			<h1 class="<?=$heading_prefix;?>heading  <?=$heading_mod;?>"><span><?=$heading;?></span></h1>
		</div>
		<a href="<?=l(1);?>" class="btn__item"><span>Ha главную</span></a>
	</div>

	<div class="container content-block__container <?=$block_prefix;?>container is--noheader"></div>
</div>