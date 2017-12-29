<?
$bg_prefix="bg-block__";
$block_prefix="services-page__";
$block_panel="services-panel__";
$cat_list = get_terms(array(
	'taxonomy' => 'ourservice-categories',
	'hide_empty' => false,
	'parent' => 33,
	//'child_of' => 0,
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
		<div class="<?=$block_panel;?>block">
			<?	
			// навигация по разделам		
			$this->tpl(
				'services/navbar', 
				array(
					"block_prefix" => "navbar-category__",
					"block_mod" => "",
					"link_prefix" => "btn-link__"
				)
			);
			?>	
			<div class="<?=$block_panel;?>row row  is--gutter  is--wrap">

				<?
					foreach($cat_list as $cat) {
						$cat_id = $cat->term_id;
						$cat_title = $cat->name;
						$cat_link = get_term_link($cat_id, 'ourteam-categories');
						$item_class = '';
						$preview_get = get_field('serv_cat_preview', $cat);

						$preview = $this->Imgs->rawImg($preview_get, '385x330');
						if($preview == ""){
							$preview = "http://via.placeholder.com/385x330";
						}
				?>
				<div class="<?=$block_panel;?>cols cols  is--cols-6  is--cols-xs-l-6">
					<div class="services-card__item">
						<div class="services-card__row row  is--wrap">
							<div class="services-card__cols cols  is--preview">
								<div class="services-card__preview">
									<img src="<?=$preview;?>" alt="<?=$cat_title;?>">
								</div>
							</div>
							<div class="services-card__cols cols  is--note">
								<div class="services-card__note">
									<h3 class="services-card__heading"><?=$cat_title;?></h3>	
									<ul class="link-hover__list  services-card__list">
										<?
											$projects = new WP_Query(array(
												'post_type' => 'ourservice',
												'posts_per_page' => -1,
												'orderby' => array(
													'menu_order' => 'ASC',
													'date' => 'DESC',
													'ID' => 'DESC',
													//'title' => 'ASC',
												),
												//'category__in' => array(24),
												//'post__in' => array(26),
												'tax_query' => array(array(
													'taxonomy' => 'ourservice-categories',
													'field' => 'slug',
													'terms' => array($cat->slug),
												)),
											));
											//var_dump($projects);
											while($projects->have_posts()) {
												$projects->the_post();
												$id = get_the_ID();
												$link = l($id);
												$title = t($id);
												$preview = $this->Imgs->postImg($p->ID, '375x480');
												$position = get_field('team_post', $id);
												if($preview == ""){
													$preview = "http://via.placeholder.com/375x480";
												}
											?>
										<li class="link-hover__item  services-card__list-item">
											<a href="<?=$link;?>" class="link-hover__link  services-card__list-link  is--xl"><span><?=$title;?></span></a>
										</li>	
										<?
										}
										wp_reset_postdata();
										?>	
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>				
				<?}?>
			</div>
		</div>
	</div>
</div>