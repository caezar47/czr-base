<?
$id = $this->post["id"];
$bg_prefix="bg-block__";
$block_prefix="blog-page__";
$posts = $this->getItems(array(
	'post_type' => 'post',
	'posts_per_page' => 10,
	'orderby' => array(
		'menu_order' => 'ASC',
		'date' => 'DESC',
		'ID' => 'DESC',
		'name' => 'ASC',
	),

	'tax_query' => array(array(
		'taxonomy' => 'category',
		'field' => 'slug',
		'terms' => array('blog'),
	)),

));
$about_cert = get_field('about_cert', $id);
$about_text_left = get_field('about_text_left', $id);
$about_text_right = get_field('about_text_right', $id);
$about_preview_right = get_field('about_preview_right', $id);
$about_preview_left = get_field('about_preview_left', $id);
$about_adv_heading = get_field('about_adv_heading', $id);
$about_adv_note = get_field('about_adv_note', $id);
$about_reviews_heading = get_field('about_reviews_heading', $id);

$preview_right = $this->Imgs->rawImg($about_preview_right, '520x330');
$preview_right_fancy = $this->Imgs->rawImg($about_preview_right, 'fancybox_full');
$preview_right_xl = $this->Imgs->rawImg($about_preview_right, '1070x480');
$preview_left = $this->Imgs->rawImg($about_preview_left, '520x330');
$preview_left_fancy = $this->Imgs->rawImg($about_preview_left, 'fancybox_full');

?>
<div class="content-block <?=$block_prefix;?>content-block  <?=$bg_prefix;?>block" role="main">	
	<div class="container content-block__container <?=$block_prefix;?>container <?=$bg_prefix;?>container">
		<?
		// хлебные крошки первого уровня
		$this->tpl(
			'_/bread', 
			array(
				"block_prefix" => "breadcrumb__",
				"block_mod" => "is--heading  is--center"
			)
		);
		// заголовок страницы		
		$this->tpl(
			'_/heading', 
			array(
				"block_prefix" => "page-header__",
				"block_mod" => "is--heading  is--center"
			)
		);
		?>
		<div class="about-panel__block">
			<div class="about-panel__block">
				<div class="about-panel__note">
					<div class="about-panel__row row  is--gutter  is--wrap  is--aic">
						<?if ($about_text_left != ""){?>
						<div class="about-panel__cols cols  is--cols-screen-4  is--cols-sm-12">
							<div class="about-panel__text-block  text__block  is--left">
								<?=$about_text_left;?>								
							</div>
						</div>
						<?}?>
						<?if ($preview_right != ""){?>
						<div class="about-panel__cols cols  is--cols-screen-8  is--cols-sm-6  is--cols-xs-l-6">
							<picture class="about-panel__preview-picture"> 
								<source media="(min-width: 1025px)" 
										srcset="<?=$preview_right_xl;?>">
								<img src="<?=$preview_right;?>" alt="">
							</picture>
							<?/*
							== шаблон для вывода через fancybox ==
							<a href="<?=$preview_right_fancy;?>" data-fancybox="about-preview">
								<picture class="about-panel__preview-picture"> 
									<source media="(min-width: 1025px)" 
											srcset="<?=$preview_right_xl;?>">
									<img src="<?=$preview_right;?>" alt="">
								</picture>
							</a>
							*/?>
						</div>
						<?}?>
						<?if ($preview_left != ""){?>
						<div class="about-panel__cols cols  is--cols-screen-4  is--cols-sm-6  is--cols-xs-l-6">
							<picture class="about-panel__preview-picture"> 
								<img src="<?=$preview_left;?>" alt="">
							</picture>
							<?/*
							== шаблон для вывода через fancybox ==
							<a href="<?=$preview_left_fancy;?>" data-fancybox="about-preview">	
								<picture class="about-panel__preview-picture"> 
									<img src="<?=$preview_left;?>" alt="">
								</picture>
							</a>
							*/?>
						</div>
						<?}?>
						<?if ($about_text_right != ""){?>
						<div class="about-panel__cols cols  is--cols-screen-8  is--cols-sm-12">
							<div class="about-panel__text-block  text__block  is--right">
								<?=$about_text_right;?>
							</div>
						</div>
						<?}?>
					</div>
				</div>

				<?
					if(is_array($about_cert) && count($about_cert)) {
				?>
				<div class="about-panel__lisence">				
					<div class="page-header__block  is--center">
						<h2 class="page-header__heading  is--center"><span>Нормативные документы</span></h2>		
					</div>	
					<div class="about-panel__row row  is--gutter  is--wrap  is--aic">
						<?				
							foreach($about_cert as $id) {
								$preview = $this->Imgs->rawImg($id, '375x530');
								$preview_full = $this->Imgs->rawImg($id, 'fancybox_full');
						?>	
						<div class="about-panel__cols cols  is--cols-4  is--card">				
							<div class="about-card__item">
								<a href="<?=$preview_full;?>" data-fancybox="about_cert_gallery" class="about-card__preview block-hover__block">
									<img src="<?=$preview;?>" alt=""  class="block-hover__img  img-responsive"> 
									<div class="block-hover__item">
										<div class="block-hover__icon"> 
											<div class="block-hover__icon-inner">
												<svg class="icon-svg icon-plus" role="img">
													<use xlink:href="<?=$this->path('img');?>/svg/sprite.svg#plus"></use>
												</svg>
											</div>
										</div>
									</div>
								</a>
							</div>
						</div>
						<? } ?>
					</div>
				</div>
				<?}?>
			</div>
		</div>
	</div>
</div>
<?if ($about_adv_note != ""){?>
<div class="about-advantages__block">
	<div class="container about-advantages__container">
		<div class="about-advantages__row row  is--gutter  is--wrap  is--aic">
			<?if ($about_adv_heading != ""){?>
			<div class="about-advantages__cols cols  is--heading">
				<h3 class="about-advantages__heading"><?=$about_adv_heading;?></h3>
			</div>
			<?}?>
			<?=$about_adv_note;?>
		</div>
	</div>
</div>
<?}?>
<?
$this->tpl(
	'team/panel', 
	array(
		"block_prefix"=>"team-panel-about__",
		"about_id" => $id,
	)
);
$this->tpl(
	'reviews/panel', 
	array(
		"block_prefix"=>"reviews-panel__",
		"block_mod"=>"is--index",
		"block_heading_mod"=>"is--heading  is--center  is--reviews-panel-index",
		"block_heading" => $about_reviews_heading,
	)
);
?>