<?
	$__prefix="content-block__";
	$__mod="is--full";
	$content_mod="is--partners";
	$heading_prefix="page-header__";
	$heading_mod="is--page-heading  is--center";
	$bread_prefix="breadcrumb__";
	$bread_mod="is--center";

	$heading = t($this->post['id']);
	$content = c($this->post['id']);
	$index_page = l(1);

	$partners = $this->getItems(array(
		'post_type' => 'post',
		'posts_per_page' => -1,
		'orderby' => array(
			'menu_order' => 'ASC',
			'date' => 'DESC',
			'ID' => 'DESC',
			'name' => 'ASC',
		),
		'tax_query' => array(array(
			'taxonomy' => 'category',
			'field' => 'slug',
			'terms' => array('partners'),
		)),
	));

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
						<li class="<?=$bread_prefix;?>list-item is--active">
							<span class="<?=$bread_prefix;?>list-link"><?=$heading;?></span>
						</li>
					</ul>
				</div>		
				<div class="<?=$heading_prefix;?>block  <?=$heading_mod;?>">
					<h1 class="<?=$heading_prefix;?>heading  <?=$heading_mod;?>"><?=$heading;?></h1>		
				</div>
			</div>

			<?
				$this->tpl(
				'partners/panel', 
					array(
						"block_prefix" => $__prefix,
						"block_mod" => $content_mod,
					)
				);
			?>
			<div class="<?=$__prefix;?>row row  is--gutter  is--wrap  <?=$content_mod;?>">
				<?
				if(count($partners)) {
					foreach($partners as $p) {
						$id = $p->ID;
						$title = $p->post_title;
						$preview = $this->mdl('Imgs')->postImg($id, '232x96');
						$link = $this->Azbn->getMeta($id, 'website');
						if ($preview == ""){
							$preview = "http://via.placeholder.com/232x96";
						}						
				?>
				<div class="<?=$__prefix;?>cols cols  is--cols-screen-2  <?=$content_mod;?>">		
					<a href="<?=$link?>" class="<?=$__prefix;?>card  <?=$content_mod;?>" rel="nofollow" target="_blank">
						<img src="<?=$preview?>" alt="<?=$title;?>">
					</a> 
				</div>	
				<?
					}
				}
				?>
			</div>
		</div>
	</div>
</main>