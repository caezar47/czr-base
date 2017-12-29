<?
	$block_prefix = "products-page__";

	$obj = $this->entity;
	$slug = $this->entity->slug;
	$heading = $this->entity->name;
	$id = $this->entity->term_id;


	$projects = new WP_Query(array(
		'post_type' => 'ourproduct',
		'posts_per_page' => -1,
		'orderby' => array(
			'ID' => 'ASC',
			'date' => 'DESC',
			'menu_order' => 'ASC',
			'name' => 'ASC',
		),
		'tax_query' => array(array(
			'taxonomy' => 'ourproducts-categories',
			'field' => 'slug',
			'terms' => array($slug),
		)),
	));

	$__prefix="content-block__";
	$__mod="is--full";
	$heading_prefix="page-header__";
	$heading_mod="is--page-heading  is--center";
	$bread_prefix="breadcrumb__";
	$bread_mod="is--center";

	$index_page = l(1);
	$parent_page_title = t(5);
	$parent_page_link = l(5);

	$content_prefix = "products-panel__";
	$content_mod ="is--card-list";
?>
<main class="<?=$__prefix;?>panel  <?=$__mod;?>"  role="main">
	<div class="<?=$__prefix;?>container container  <?=$__mod;?>">
		<div class="<?=$__prefix;?>elem">
			<div class="<?=$heading_prefix;?>panel  <?=$heading_mod;?>">
				<div class="<?=$bread_prefix;?>block  <?=$bread_mod;?>">
					<ul class="<?=$bread_prefix;?>list  <?=$bread_mod;?>">
						<li class="<?=$bread_prefix;?>list-item">
							<a href="<?=$index_page;?>" class="<?=$bread_prefix;?>list-link">Главная</a>
						</li>
						<li class="<?=$bread_prefix;?>list-item">
							<a href="<?=$parent_page_link;?>" class="<?=$bread_prefix;?>list-link"><?=$parent_page_title;?></a>
						</li>
						<li class="<?=$bread_prefix;?>list-item is--active">
							<span class="<?=$bread_prefix;?>list-link"><?=$heading;?></span>
						</li>
					</ul>
				</div>		
				<div class="<?=$heading_prefix;?>block  <?=$heading_mod;?>">
					<h1 class="<?=$heading_prefix;?>heading  <?=$heading_mod;?>"><?=$heading;?></h1>		
				</div> 
			</div>
			<div class="<?=$content_prefix;?>block">
				<div class="<?=$content_prefix;?>row row  is--gutter  is--wrap">
					<?	
						while($projects->have_posts()) {
							$projects->the_post();
							$id = get_the_ID();
							$link = l($id);
							$title = t($id);
							//$short_text =  get_field('short_text', $id);
							$short_text = $this->Azbn->getMeta($id, 'short_text');
							$preview = $this->mdl('Imgs')->postImg($id, '493x340');
							if($preview == ""){
								$preview = "http://via.placeholder.com/493x340";
							}
					?>
					<div class="<?=$content_prefix;?>cols cols  is--cols-4">
						<div class="card-item__card  is--products">
							<a href="<?=$link;?>" class="card-item__preview  is--products">
								<img src="<?=$preview;?>" alt="<?=$title;?>">
							</a>
							<h3 class="card-item__heading  is--products"><a href="<?=$link;?>"><?=$title;?></a></h3>
							<div class="card-item__heading-small  is--products"><?=$short_text;?></div>
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
</main>
