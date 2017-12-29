<?
	$bg_prefix="bg-block__";
	$block_prefix="services-page__";
	$breadcrumb_prefix = "breadcrumb__";
	$breadcrumb_mod="is--heading  is--center";
	$heading_prefix="page-header__";
	$heading_mod="is--heading  is--center";
	$id = $this->post['id'];
	$heading = t($id);

	$block_panel = "services-panel-card__";

	$note = get_field('serv_note', $id);
	$note_left = get_field('serv_note_left', $id);
	$note_right = get_field('serv_note_right', $id);

	$preview = $this->Imgs->postImg($p_id, '935x465');
	if($preview == ""){
		$preview = "http://via.placeholder.com/935x465";
	};
	$cols_left = "is--cols-screen-7";
	$cols_right = "is--cols-screen-5";
	if($note_left == ""){
		$cols_right = "is--cols-screen-7";
	}
	if($note_right == ""){}

	$gallery = get_field("serv_gallery", $id);
	$team = get_field("serv_team", $id);
	$price = get_field("serv_price", $id);
?>
<div class="content-block <?=$block_prefix;?>content-block  <?=$bg_prefix;?>block" role="main">	
	<div class="container content-block__container <?=$block_prefix;?>container <?=$bg_prefix;?>container">
		<div class="<?=$breadcrumb_prefix;?>block  <?=$breadcrumb_mod;?>">
			<ul class="<?=$breadcrumb_prefix;?>list  <?=$breadcrumb_mod;?>">
				<li class="<?=$breadcrumb_prefix;?>list-item">
					<a href="<?=l(1);?>" class="<?=$breadcrumb_prefix;?>list-link">Главная</a>
				</li>
				<li class="<?=$breadcrumb_prefix;?>list-item">
					<a href="<?=l(7);?>" class="<?=$breadcrumb_prefix;?>list-link"><?=t(7);?></a>
				</li>
				<?
				/*$categories = get_the_category($id);				
				if(count($categories)) {
					foreach($categories as $cat) {
						$link = get_category_link($cat->term_id);
				?>					
					<li class="<?=$breadcrumb_prefix;?>list-item"><a href="<?=$link;?>" class="<?=$breadcrumb_prefix;?>list-link"><?=$cat->name;?></a></li>
				<?
					}
				}*/
				?>
				<li class="<?=$breadcrumb_prefix;?>list-item is--active"><?=$heading?></li>
			</ul>
		</div>
		<div class="<?=$heading_prefix;?>block  <?=$heading_mod;?>">
			<h1 class="<?=$heading_prefix;?>heading  <?=$heading_mod;?>"><span><?=$heading?></span></h1>
		</div>
		<div class="<?=$block_panel;?>block">
			<div class="<?=$block_panel;?>decs">
				<div class="<?=$block_panel;?>row row  is--gutter  is--wrap  is--aic">
					<div class="<?=$block_panel;?>cols cols  is--cols-screen-7  is--cols-sm-6  is--cols-xs-l-6">						
						<picture class="<?=$block_panel;?>preview-picture"> 
							<img src="<?=$preview;?>" alt="<?=$heading?>">
						</picture>
					</div>
					<div class="<?=$block_panel;?>cols cols  is--cols-screen-5  is--cols-sm-12">
						<div class="<?=$block_panel;?>text-block">
							<div class="<?=$block_panel;?>text text__block">
								<?=$note;?>
							</div>
							<div class="<?=$block_panel;?>btn-row row  is--wrap  is--gutter">
								<div class="<?=$block_panel;?>btn-cols cols">
									<button type="button" class="btn__item is--sm" data-toggle="modal" data-target="#modal-reserv"><span>Записаться на прием</span></button>
								</div>
								<div class="<?=$block_panel;?>btn-cols cols">
									<button type="button" class="btn__item   " data-toggle="modal" data-target="#modal-сonsultation"><span>Консультация</span></button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="<?=$block_panel;?>note">
				<div class="<?=$block_panel;?>row row  is--gutter  is--wrap">
					<? if($note_left != ""){?>
					<div class="<?=$block_panel;?>cols cols  is--cols-sm-12  <?=$cols_left?>">	
						<div class="text__block">
							<?=$note_left;?>
						</div>
					</div>
					<?}?>
					<? if($note_right != ""){?>
					<div class="<?=$block_panel;?>cols cols  is--cols-screen-5  is--cols-sm-12  <?=$cols_right?>">	
						<div class="text__block">							
							<?=$note_right;?>
						</div>
					</div>
					<?}?>
				</div>
			</div>
			<?if($team != "") {?>
			<div class="<?=$block_panel;?>team">
				<?
				$this->tpl(
					'team/panel-services', 
					array(
						"block_prefix"=>"team-panel__",
						"block_id" => $team,
					)
				);
				?>
			</div>			
			<?}?>
			<?if($gallery != "") {?>
			<div class="<?=$block_panel;?>gallery">
				<div class="page-header__block  is--center">
					<h2 class="page-header__heading  is--center"><span>Спецпредложения</span></h2>		
				</div>
				<div class="<?=$block_panel;?>row row  is--gutter  is--wrap  is--jcc">
					<?				
						foreach($gallery as $id) {
							$preview = $this->Imgs->postImg($id, '510x320');
							$preview_full = $this->Imgs->rawImg($id, 'fancybox_full');
							$link = l($id);
					?>	
					<div class="<?=$block_panel;?>cols cols  is--cols-4 is--cols-xs-l-6">
						<a href="<?=$link;?>"><img src="<?=$preview;?>" alt="" class="img-responsive"></a>
					</div>
					<? } ?>
				</div>
			</div>
			<?}?>
		</div>

	</div>	
</div>
<?if($price != "") {
	$this->tpl(
		'price/panel', 
		array(
			"block_prefix"=>"price-list-services__",
			"bg_prefix" => "bg-block__",
			"block_id" => $price,
		)
	);
}
?>