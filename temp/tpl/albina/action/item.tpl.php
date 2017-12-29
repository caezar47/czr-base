<?
$bg_prefix="bg-block__";
$block_prefix="action-card-panel__";
$breadcrumb_prefix = "breadcrumb__";
$breadcrumb_mod="is--heading  is--center";
$heading_prefix="page-header__";
$heading_mod="is--heading  is--center";
$preview = $this->Imgs->postImg($this->post['id'], '690x430');
$title = t($this->post['id']);
$content = c($this->post['id']);
?>
<div class="content-block <?=$block_prefix;?>content-block  <?=$bg_prefix;?>block" role="main">	
	<div class="container content-block__container <?=$block_prefix;?>container <?=$bg_prefix;?>container">
		<div class="<?=$breadcrumb_prefix;?>block  <?=$breadcrumb_mod;?>">
			<ul class="<?=$breadcrumb_prefix;?>list  <?=$breadcrumb_mod;?>">
				<li class="<?=$breadcrumb_prefix;?>list-item">
					<a href="<?=l(1);?>" class="<?=$breadcrumb_prefix;?>list-link">Главная</a>
				</li>
				<li class="<?=$breadcrumb_prefix;?>list-item">
					<a href="<?=l(9);?>" class="<?=$breadcrumb_prefix;?>list-link"><?=t(9);?></a>
				</li>
				<li class="<?=$breadcrumb_prefix;?>list-item is--active"><?=$title;?></li>
			</ul>
		</div>
		<div class="<?=$heading_prefix;?>block  <?=$heading_mod;?>">
			<h1 class="<?=$heading_prefix;?>heading  <?=$heading_mod;?>"><span><?=$title;?></span></h1>
		</div>
		<?
			if($preview != ""){
		?>		
		<div class="<?=$block_prefix;?>row row  is--wrap  is--gutter">
			<div class="<?=$block_prefix;?>cols cols  is--cols-6 is--cols-xs-l-6  is--preview">
				<div class="<?=$block_prefix;?>preview">
					<img src="<?=$preview;?>" alt="<?=$title;?>"  class="block-hover__img  img-responsive"> 
				</div>
			</div>
			<div class="<?=$block_prefix;?>cols cols  is--cols-6  is--note">
				<div class="<?=$block_prefix;?>text-block text__block">
					<?=$content;?>
				</div>
			</div>
		</div>
		<?}else{?>
			<div class="text__container">
				<div class="text__block">
					<?=$content;?>
				</div>
			</div>
		<?}?>
	</div>
	<?
		//фоновые картинки
		$this->tpl(
			'_/bg', 
			array(
				"block_prefix" => "bg-block__",
				"block_mod" => "is--candle-leaf  is--action-item",
				"block_bg" => "bg-candle-leaf.png",
			)
		);
	?>
</div>