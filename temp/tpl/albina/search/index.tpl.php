<?
$bg_prefix="bg-block__";
$block_prefix="search-page__";
$block_panel="search-panel__";
$breadcrumb_prefix = "breadcrumb__";
$breadcrumb_mod="is--heading  is--center";
$heading_prefix="page-header__";
$heading_mod="is--heading  is--center";
$heading = "Поиск по услугам";
?>
<div class="content-block <?=$block_prefix;?>content-block  <?=$bg_prefix;?>block" role="main">	
	<div class="container content-block__container <?=$block_prefix;?>container <?=$bg_prefix;?>container">
		<div class="<?=$breadcrumb_prefix;?>block  <?=$breadcrumb_mod;?>">
			<ul class="<?=$breadcrumb_prefix;?>list  <?=$breadcrumb_mod;?>">
				<li class="<?=$breadcrumb_prefix;?>list-item">
					<a href="<?=l(1);?>" class="<?=$breadcrumb_prefix;?>list-link">Главная</a>
				</li>
				<li class="<?=$breadcrumb_prefix;?>list-item is--active"><?=$heading;?></li>
			</ul>
		</div>
		<div class="<?=$heading_prefix;?>block  <?=$heading_mod;?>">
			<h1 class="<?=$heading_prefix;?>heading  <?=$heading_mod;?>"><span><?=$heading;?></span></h1>
		</div>
		<div class="<?=$block_panel;?>block">
			<form class="<?=$block_panel;?>form" action="#" role="search" action="/" method="GET">
				<div class="<?=$block_panel;?>form-row row">
					<div class="<?=$block_panel;?>form-cols cols  is--input">
						<input type="text" value="<?= get_search_query(); ?>" name="s" class="form__control" placeholder="Поиск по услугам">
					</div>
					<div class="<?=$block_panel;?>form-cols cols  is--btn">
						<button type="submit" class="btn__item is--search"><span>Найти</span></button>
					</div>
				</div>
			</form>
			<div class="<?=$block_panel;?>result">
				<h3 class="<?=$block_panel;?>result-heading">Вы искали: <?=get_search_query();?></h3>
				<div class="<?=$block_panel;?>text-block text__block">
					<ol class="<?=$block_panel;?>list">
						<?
							if(count($param['posts'])) {				
								$i = 0;				
								foreach($param['posts'] as $p) {
									//var_dump($p);					
									$i++;					
									$link = l($p->ID);
									$title = $p->post_title;
									//$cost = $this->getMeta($p->ID, 'cost');					
								?>
									<li class="<?=$block_panel;?>item">
										<h4 class="<?=$block_panel;?>link">
											<a href="<?=$link;?>"><?=$title;?></a>
										</h4>
									</li>				
							<?
								}
								
							} else {
								
							}
							?>
					</ol>
				</div>
			</div>
		</div>
	</div>
	<?
		//фоновые картинки
		$this->tpl(
			'_/bg', 
			array(
				"block_prefix" => "bg-block__",
				"block_mod" => "is--cream-leaf  is--search",
				"block_bg" => "bg-cream-leaf.png",
			)
		);
		$this->tpl(
			'_/bg', 
			array(
				"block_prefix" => "bg-block__",
				"block_mod" => "is--sea-salt  is--search",
				"block_bg" => "bg-sea-salt.png",
			)
		);?>
</div>