<?
$category = get_queried_object();

$heading = $category->name;
//$category_parent = $category->parent == 0 ? $category : get_term_by('term_taxonomy_id', $category->parent, 'ourservice-categories');

$category_parent = get_term_by('term_taxonomy_id', 33, 'ourservice-categories');

//var_dump($category);

$breadcrumb_prefix = "breadcrumb__";
$breadcrumb_mod="is--heading  is--center";
$heading_prefix="page-header__";
$heading_mod="is--heading  is--center";

$bg_prefix="bg-block__";
$block_prefix="services-page__";
$block_panel="services-panel__";
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
				<li class="<?=$breadcrumb_prefix;?>list-item is--active"><?=$heading;?></li>
			</ul>
		</div>
		<div class="<?=$heading_prefix;?>block  <?=$heading_mod;?>">
			<h1 class="<?=$heading_prefix;?>heading  <?=$heading_mod;?>"><span><?=$heading;?></span></h1>
		</div>
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
			<div class="<?=$block_panel;?>block-row row  is--gutter  is--wrap">
				<?	
				/*
				$categories = get_categories(array(
					'taxonomy'				=> 'ourservice-categories',
					'child_of'				=> $category_parent->term_id,
				));
				*/
				
				$cat_list = get_terms(array(
					'taxonomy' => 'ourservice-categories',
					'hide_empty' => false,
					'parent' => $category_parent->term_id,
					//'child_of' => 0,
				));
				
				?>
				<?
					foreach($cat_list as $cat) {
						$cat_id = $cat->term_id;
						$cat_title = $cat->name;
						$cat_link = get_term_link($cat_id, 'ourteam-categories');
						$item_class = '';
						//var_dump($id);
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
													//'relation' => 'AND',
													'taxonomy' => 'ourservice-categories',
													'field' => 'slug',
													'terms' => array($cat->slug, $category->slug),
													'operator' => 'AND',
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