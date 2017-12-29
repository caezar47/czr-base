<?
	$bg_prefix="bg-block__";
	$block_prefix = "before-after-page__";
	$posts = new WP_Query(array(
		'post_type' => 'page',
		'posts_per_page' => -1,
		'post_parent' => 10,
		'orderby' => array(
			'menu_order' => 'ASC',
			'date' => 'DESC',
			'ID' => 'DESC',
			'name' => 'ASC',
		),
	));
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
		<div class="before-after-panel__block">
			<div class="before-after-panel__row row  is--wrap  is--gutter">
				<?
				while($posts->have_posts()) {
					$posts->the_post();
					$id = get_the_ID();
					$link = l($id);
					$title = t($id);
					$preview = $this->Imgs->postImg($id, '385x330');
					if ($preview == ""){
						$preview = "http://via.placeholder.com/385x330";
					}	
				?>
				<div class="before-after-panel__cols cols  is--cols-screen-3  is--cols-sm-6  is--cols-sm-l-4  is--cols-xs-l-6">
					<div class="before-after-card__item">
						<a href="<?=$link;?>" class="before-after-card__preview block-hover__block  is--before-after">
							<img src="<?=$preview;?>" alt="<?=$title;?>"  class="block-hover__img  img-responsive">
							<div class="block-hover__item  is--before-after">
								<div class="block-hover__icon  is--before-after"> 
									<div class="block-hover__icon-inner  is--before-after">
										<svg class="icon-svg icon-plus" role="img"><use xlink:href="<?=$this->path('img');?>/svg/sprite.svg#plus"></use></svg>
									</div>
								</div>
							</div>
							<h4 class="block-hover__heading  is--before-after"><?=$title;?></h4>
						</a> 	
					</div>
				</div>				
				<?
				}
				wp_reset_postdata();
				?>
			</div>
		</div>
	</div>	
</div>