<?
$category = get_queried_object();
$heading = $category->name;
$category_id = $category->term_id;
//var_dump($category_id);

$bg_prefix="bg-block__";
$block_prefix="blog-page__";
$breadcrumb_prefix = "breadcrumb__";
$breadcrumb_mod="is--heading  is--center";
$heading_prefix="page-header__";
$heading_mod="is--heading  is--center";

$bg_prefix="bg-block__";
$block_prefix="pricelist-page__";

$projects = new WP_Query(array(
	'post_type' => 'ourprice',
	'posts_per_page' => -1,
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
		<div class="pricelist-panel__block">
			<?	
			// навигация по разделам		
			$this->tpl(
				'price/navbar', 
				array(
					"block_prefix" => "navbar-category__",
					"block_mod" => "",
					"link_prefix" => "btn-link__"
				)
			);
			?>			
			<div class="pricelist-panel__block-row row  is--gutter  is--wrap">
				<div class="pricelist-panel__block-cols cols  is--cols-12">
					<div class="pricelist-panel__list">
						<div class="pricelist-panel__row row  is--gutter  is--wrap">
							<?
							while($projects->have_posts()) {
								$projects->the_post();
								$id = get_the_ID();
								$link = l($id);
								$title = t($id);
								$content = c($id);
							?>
							<div class="pricelist-panel__cols cols  is--cols-12">
								<div class="text__block  pricelist-panel__text-block">
									<?=$content;?>
								</div>
							</div>
							<?} wp_reset_postdata();?>
						</div>
					</div>
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
				"block_mod" => "is--branch",
				"block_bg" => "bg-branch.png",
			)
		);
		$this->tpl(
			'_/bg', 
			array(
				"block_prefix" => "bg-block__",
				"block_mod" => "is--candle  is--pricelist",
				"block_bg" => "bg-candle.png",
			)
		);
		$this->tpl(
			'_/bg', 
			array(
				"block_prefix" => "bg-block__",
				"block_mod" => "is--leaf  is--pricelist",
				"block_bg" => "bg-leaf.png",
			)
		);
		$this->tpl(
			'_/bg', 
			array(
				"block_prefix" => "bg-block__",
				"block_mod" => "is--filler  is--pricelist",
				"block_bg" => "bg-filler.png",
			)
		);
	?>	
</div>