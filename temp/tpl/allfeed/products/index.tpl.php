<?
	$cat_list = get_terms(array(
		'taxonomy' => 'ourproducts-categories',
		'hide_empty' => false,
		//'parent' => 33,
		//'child_of' => 0,
		'orderby' => array(
			'menu_order' => 'ASC',
			'date' => 'DESC',
			'ID' => 'DESC',
			'name' => 'ASC',
		),
	));

	$id = $this->post['id'];
	$__prefix="content-block__";
	$__mod="is--full";
	$heading_prefix="page-header__";
	$heading_mod="is--page-heading  is--center";

	$content = c($id);

	$content_prefix = "products-panel__";
	$content_mod =" is--category";
?>
<main class="<?=$__prefix;?>panel  <?=$__mod;?>"  role="main">
	<div class="<?=$__prefix;?>container container  <?=$__mod;?>">
		<div class="<?=$__prefix;?>elem">
			<div class="<?=$heading_prefix;?>panel  <?=$heading_mod;?>">
				<?
				// хлебные крошки первого уровня
				$this->tpl(
					'_/bread', 
					array(
						"block_prefix" => "breadcrumb__",
						"block_mod" => "is--center"
					)
				);
				// заголовок страницы		
				$this->tpl(
					'_/heading', 
					array(
						"block_prefix" => "page-header__",
						"block_mod" => "is--page-heading  is--center"
					)
				);
				?>
			</div>
			<div class="<?=$content_prefix;?>block">
				<div class="<?=$content_prefix;?>row row  is--gutter  is--wrap">
					<div class="<?=$content_prefix;?>cols cols  is--cols-3  is--cat-preview">
						<div class="products-card__item  block-hover__block  is--category  is--nobg">
							<div class="products-card__preview">
								<img src="<?=$this->path('img');?>/temp/products-category-item1-363x340.jpg"" alt=""  class="block-hover__img  img-responsive">
							</div> 			
						</div>
					</div>
					<?
						foreach($cat_list as $cat) {
							$id = $cat->term_id;
							$link = get_term_link($id, 'ourproducts-categories');
							$title = $cat->name;
							$preview_get = get_field('preview_cat', $cat);
							$preview = $this->mdl('Imgs')->rawImg($preview_get, '363x340');
							if($preview == ""){ 
								$preview = "http://via.placeholder.com/363x340";
							}
					?>
					<div class="<?=$content_prefix;?>cols cols  is--cols-3">
						
						<a href="<?=$link;?>" class="products-card__item  block-hover__block  is--category">
							<div class="products-card__preview">
								<img src="<?=$preview;?>" alt="<?=$title;?>"  class="block-hover__img  img-responsive">
							</div> 			
							<h3 class="products-card__heading  is--category"><?=$title;?>	</h3>
						</a>

					</div>
					<?	
						}
					?>
					<div class="<?=$content_prefix;?>cols cols  is--cols-3  is--cat-preview">
						<div class="products-card__item  block-hover__block  is--category  is--nobg">
							<div class="products-card__preview">
								<img src="<?=$this->path('img');?>/temp/products-category-item12-363x340.jpg"" alt=""  class="block-hover__img  img-responsive">
							</div> 			
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
	
		